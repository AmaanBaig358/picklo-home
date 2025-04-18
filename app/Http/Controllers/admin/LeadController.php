<?php

namespace App\Http\Controllers\admin;

use App\Helpers\FakerURL;
use App\Models\Client;
use App\Models\Leads;
use App\Models\ClientTodo;
use App\Models\FollowUp;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LeadController extends Controller
{
    public function index()
    {
        $title = 'Leads';
        $leads = Leads::where('is_approved', 0)
            ->where('status', 'pending')
            ->orderByDesc('created_at')
            ->get();
        return view('admin.lead.index', compact('title', 'leads'));
    }

    public function create()
    {
        $title = 'Create Lead';
        $users = User::where('is_deleted', '0')->get();
        return view('admin.lead.create', compact('title','users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_name' => ['required', 'string', 'max:100'],
            'client_email' => ['required', 'email'],
            'client_phone' => ['required', 'string', 'max:100'],
            'project_type'=>['required'],
            'job_address' => ['required', 'string', 'max:255'],
            'status' => ['nullable', 'string'], // optional status field
        ]);

        $data = $request->all();
        $data['status'] = 'pending';
        $lead = Leads::create($data);

        if ($request->has('assign_id')) {
            $lead->assignedUsers()->attach($request->assign_id);
        }

        return redirect()->route('admin.manage.lead')
            ->with('success', 'User created successfully');
    }

    public function edit($leadId)
    {
        $title = 'Edit Lead';
        $users = User::where('is_deleted', '0')->get();
        $lead = Leads::findOrFail(FakerURL::id_d($leadId));
        return view('admin.lead.edit', compact('title', 'lead', 'users'));
    }

    public function update(Request $request, $leadId)
    {
        $request->validate([
            'client_name' => ['required', 'string', 'max:100'],
            'client_email' => ['required', 'email'],
            'client_phone' => ['required', 'string', 'max:100'],
            'job_address' => ['required', 'string', 'max:255'],
            'project_type'=>['required'],
            'status' => ['nullable', 'string'], // optional status field
        ]);

        $lead = Leads::findOrFail($leadId);
        $data = $request->all();



        if ($request->status === 'Approved') {
            $data['is_approved'] = 1;

             Client::create([
                'lead_id' => $lead->id,
            ]);

        }

        $lead->update($data);
        if ($request->has('assign_id')) {
            $lead->assignedUsers()->sync($request->assign_id);  // Sync users
        } else {
            $lead->assignedUsers()->sync([]);  // Remove all assigned users if none selected
        }

        return redirect()->route('admin.manage.lead')
            ->with('success', 'User created successfully');
    }

    public function show($leadId)
    {
        $title = 'Lead Detail';
        $users = User::where('is_deleted', '0')->get();
        $lead = Leads::findOrFail(FakerURL::id_d($leadId));
        return view('admin.lead.show', compact('title', 'users','lead'));
    }

    public function destroy($leadId)
    {
        try {
            $lead = Leads::findOrFail(($leadId));
            $lead->delete();
            return response()->json(['success' => true, 'message' => 'Lead deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'Lead not found'], 404);
        }
    }

    public function clientTodo($ClientId)
    {
        $id = FakerURL::id_d($ClientId);
        $title = 'Manage Client Todo';

        $client = Leads::where('id', $id)->with('cards')->first();

        return view('admin.lead.client-todo', compact('title', 'client'));
    }

    public function todoStore(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'title' => 'required|string|max:255',
            'priority' => 'required|string',
            'description' => 'nullable|string',
            'end_date' => 'required|date',
            'card_id' => 'required|string',
        ]);
        $data = $request->all();
        $maxOrderNumber = ClientTodo::where('card_id', $request->get('card_id'))->max('order_number');
        $newOrderNumber = $maxOrderNumber ? $maxOrderNumber + 1 : 1;
        $data['order_number'] = $newOrderNumber;
        $todoTask = ClientTodo::create($data);
        return response()->json([
            'success' => true,
            'task' => $todoTask
        ]);
    }

    public function updateOrder(Request $request)
    {
        $taskId = $request->task_id;
        $newCardId = $request->card_id;
        $newOrder = $request->order_number;

        $task = ClientTodo::find($taskId);

        if (!$task) {
            return response()->json([
                'success' => false,
                'message' => 'Task not found'
            ], 404);
        }

        $oldCardId = $task->card_id; // Task ka purana card

        DB::transaction(function () use ($task, $oldCardId, $newCardId, $newOrder) {
            // Agar task doosre card me move ho raha hai
            if ($oldCardId != $newCardId) {
                // Pehle purane card ka order adjust karein
                ClientTodo::where('card_id', $oldCardId)
                    ->where('order_number', '>', $task->order_number)
                    ->decrement('order_number');

                // Phir naye card me order set karein
                ClientTodo::where('card_id', $newCardId)
                    ->where('order_number', '>=', $newOrder)
                    ->increment('order_number');

                // Update the task with new card and order
                $task->update([
                    'card_id' => $newCardId,
                    'order_number' => $newOrder
                ]);
            } else {
                // Agar task sirf order change kar raha hai (card same hai)
                ClientTodo::where('card_id', $newCardId)
                    ->where('order_number', '>=', $newOrder)
                    ->increment('order_number');

                $task->update([
                    'order_number' => $newOrder
                ]);
            }
        });

        return response()->json([
            'success' => true,
            'message' => 'Task order updated successfully'
        ]);
    }



//    NEW WORK START

    public function followUpIndex($clientId)
    {
        $title = 'Client FollowUps';
        $upcomingFollowUps = FollowUp::where('reminder_date', '>', now())->where('status', 'pending')->get();
        $todayFollowUps = FollowUp::whereDate('reminder_date', now())->where('status', 'pending')->get();
        $overdueFollowUps = FollowUp::where('reminder_date', '<', now())->where('status', 'pending')->get();
        $completedFollowUps = FollowUp::where('status', 'completed')->get();

        return view('admin.lead.index-follow-up', compact('title', 'upcomingFollowUps', 'todayFollowUps', 'overdueFollowUps', 'completedFollowUps'));
    }
//    NEW WORK END


}
