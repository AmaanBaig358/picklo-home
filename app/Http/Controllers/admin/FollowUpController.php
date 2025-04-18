<?php


namespace App\Http\Controllers\admin;


use App\Helpers\FakerURL;
use App\Http\Controllers\Controller;
use App\Models\FollowUp;
use App\Models\Leads;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowUpController extends Controller
{

    public function clientFollowUpIndex($clientId)
    {
        $title = 'Client FollowUps';
        $lead = Leads::findOrFail(FakerURL::id_d($clientId));

        $userId = Auth::id(); // Get authenticated user ID
        $today = Carbon::today()->toDateString(); // ✅ Ensure date comparison without time
        $now = Carbon::now(); // ✅ Current date & time
        $upcomingFollowUps = FollowUp::whereDate('reminder_date', '>', $today)
            ->where(['user_id' => $userId, 'client_id' => $lead->id, 'status' => 'pending' ])->with('client')
            ->get();

        // ✅ Overdue Follow-Ups (Past Dates)
        $overdueFollowUps = FollowUp::whereDate('reminder_date', '<', $today) // ✅ Compare with `toDateString()`
        ->where(['user_id' => $userId, 'client_id' => $lead->id ])->with('client')
            ->get();

        // ✅ Completed Follow-Ups
        $completedFollowUps = FollowUp::where(['status' => 'completed', 'user_id' => $userId, 'client_id' => $lead->id ])
            ->get();

        return view('admin.lead.index-follow-up', compact(
            'title', 'upcomingFollowUps', 'lead', 'overdueFollowUps', 'completedFollowUps'
        ));
    }

    public function addClientFollowUp($clientId)
{
    $title = 'Client FollowUps';
    $lead = Leads::findOrFail(FakerURL::id_d($clientId));
    return view('admin.lead.create-followup', compact('title', 'lead'));
}

    public function storeClientFollowUp($clientId, Request $request)
    {

        $lead = Leads::findOrFail(FakerURL::id_d($clientId));

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'reminder_date' => 'required|date_format:Y-m-d\TH:i',
            'upload_files.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048'
        ]);

        $formattedDate = Carbon::createFromFormat('Y-m-d\TH:i', $request->reminder_date)->format('Y-m-d H:i:s');

        $uploadedFiles = [];
        if ($request->hasFile('upload_files')) {
            foreach ($request->file('upload_files') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName(); // Unique file name
                $file->move(public_path('uploads/followups'), $fileName);
                $uploadedFiles[] = 'uploads/followups/' . $fileName; // Relative path for storage
            }
        }

        FollowUp::create([
            'user_id' => auth()->id(),
            'client_id' => $lead->id,
            'follow_up_type' => 'client',
            'title' => $request->title,
            'description' => $request->description,
            'reminder_date' => $formattedDate,
            'status' => 'pending',
            'upload_files' => json_encode($uploadedFiles)
        ]);

        return redirect()->route('admin.client.followUp', $lead->faker_id)->with('success', 'Follow-Up Added Successfully');
    }

    public function completeFollowUp($followId)
    {
        $followUp = FollowUp::findOrFail(FakerURL::id_d($followId));
        $followUp->update([
            'status' => 'completed'
        ]);
        return redirect()->back()->with('success', 'FollowUp Completed SuccessFully');

    }

    public function editFollowUp($followId)
    {
        $title = 'Client FollowUps';
        $followUp = FollowUp::with('client', 'project')->findOrFail(FakerURL::id_d($followId));
        return view('admin.followup.edit', compact('title', 'followUp'));

    }

    public function updateFollowUp($followId, Request $request)
    {
        // ✅ FollowUp Record Fetch Karein
        $followUp = FollowUp::with('client', 'project')->findOrFail(FakerURL::id_d($followId));

        // ✅ Validation Rules
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'reminder_date' => 'required|date_format:Y-m-d\TH:i',
            'status' => 'required|in:pending,completed,canceled',
            'upload_files.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048'
        ]);

        // ✅ File Upload Handling (Agar naye files aayein)
        $uploadedFiles = json_decode($followUp->upload_files, true) ?? []; // Pehle se jo files hain wo maintain karein
        $formattedDate = Carbon::createFromFormat('Y-m-d\TH:i', $request->reminder_date)->format('Y-m-d H:i:s');

        if ($request->hasFile('upload_files')) {
            foreach ($request->file('upload_files') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/followups'), $fileName);
                $uploadedFiles[] = 'uploads/followups/' . $fileName; // File path store karein
            }
        }

        // ✅ Follow-Up Record Update Karein
        $followUp->update([
            'title' => $request->title,
            'description' => $request->description,
            'reminder_date' => $formattedDate,
            'status' => $request->status,
            'upload_files' => json_encode($uploadedFiles),
        ]);
        if ($followUp->lead){
        return redirect()->route('admin.client.followUp', $followUp->lead->faker_id)->with('success', 'Follow-Up Updated Successfully');
        }elseif ($followUp->project){
            return redirect()->route('admin.project.followup', $followUp->lead->faker_id)->with('success', 'Follow-Up Updated Successfully');

        }else{
            return redirect()->route('admin.user.followup')->with('success', 'Follow-Up Updated Successfully');
        }
    }

    public function indexUserFollowUp()
    {
        $title = 'User FollowUps';
        $userId = Auth::id();
        $today = Carbon::today()->toDateString();
        $now = Carbon::now();

        $upcomingFollowUps = FollowUp::whereDate('reminder_date', '>', $today)
            ->where(['user_id' => $userId])
            ->get();

        $todayFollowUps = FollowUp::whereDate('reminder_date', $today) // ✅ Fix applied here
        ->where(['user_id' => $userId])
            ->get();

        $overdueFollowUps = FollowUp::whereDate('reminder_date', '<', $today) // ✅ Compare with `toDateString()`
        ->where(['user_id' => $userId])
            ->get();

        $completedFollowUps = FollowUp::where(['status' => 'completed', 'user_id' => $userId])->get();

        return view('admin.followup.index', compact(
            'title', 'upcomingFollowUps', 'todayFollowUps', 'overdueFollowUps', 'completedFollowUps'
        ));
    }

    public function createUserFollowUp()
    {
        $title = 'Create FollowUp';
        $leads = Leads::whereHas('assignedUsers', function ($query) {
            $query->whereNotNull('user_id');
        })->get();

        $projects = Project::whereHas('members', function ($query) {
            $query->whereNotNull('user_id');
        })->get();
        return view('admin.followup.create', compact(
            'title',
            'leads', 'projects'
        ));
    }

    public function storeUserFollowUp(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'reminder_date' => 'required|date_format:Y-m-d\TH:i',
            'status' => 'required|in:pending,completed,canceled,in progress',
            'upload_files.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048'
        ]);

        $formattedDate = Carbon::createFromFormat('Y-m-d\TH:i', $request->reminder_date)->format('Y-m-d H:i:s');

        $uploadedFiles = [];
        if ($request->hasFile('upload_files')) {
            foreach ($request->file('upload_files') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName(); // Unique file name
                $file->move(public_path('uploads/followups'), $fileName);
                $uploadedFiles[] = 'uploads/followups/' . $fileName; // Relative path for storage
            }
        }

        $data = $request->all();
        $data['upload_files'] = json_encode($uploadedFiles);
        $data['user_id'] = auth()->id();
        $data['reminder_date'] = $formattedDate;

        FollowUp::create($data);

        return redirect()->route('admin.user.followup')->with('success', 'Follow-Up Added Successfully');
    }

    public function indexProjectFollowUp($projectId)
    {
        $title = 'Project FollowUps';
        $project = Project::findOrFail(FakerURL::id_d($projectId));
        $userId = Auth::id();


        $today = Carbon::today()->toDateString();
        $now = Carbon::now();

        $upcomingFollowUps = FollowUp::whereDate('reminder_date', '>', $today)
            ->where(['user_id' => $userId, 'project_id' => $project->id ])->with('project')
            ->get();

        $todayFollowUps = FollowUp::whereDate('reminder_date', $today)
        ->where(['user_id' => $userId, 'project_id' => $project->id ])->with('project')
            ->get();

        $overdueFollowUps = FollowUp::whereDate('reminder_date', '<', $today)
        ->where(['user_id' => $userId, 'project_id' => $project->id ])->with('project')
            ->get();

        $completedFollowUps = FollowUp::where('status', 'completed')->with('project')
            ->get();

        return view('admin.project.follow-index', compact(
            'title', 'upcomingFollowUps', 'project', 'todayFollowUps', 'overdueFollowUps', 'completedFollowUps'
        ));
    }

    public function createProjectFollowUp($projectId)
    {
        $title = 'Client FollowUps';
        $project = Project::findOrFail(FakerURL::id_d($projectId));
        return view('admin.project.follow-create', compact('title', 'project'));
    }

    public function storeProjectFollowUp($projectId, Request $request)
    {

        $project = Project::findOrFail(FakerURL::id_d($projectId));
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'reminder_date' => 'required|date_format:Y-m-d\TH:i',
            'status' => 'required|in:pending,completed,canceled',
            'upload_files.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048'
        ]);

        $formattedDate = Carbon::createFromFormat('Y-m-d\TH:i', $request->reminder_date)->format('Y-m-d H:i:s');
        $uploadedFiles = [];
        if ($request->hasFile('upload_files')) {
            foreach ($request->file('upload_files') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName(); // Unique file name
                $file->move(public_path('uploads/followups'), $fileName);
                $uploadedFiles[] = 'uploads/followups/' . $fileName; // Relative path for storage
            }
        }

        FollowUp::create([
            'user_id' => auth()->id(),
            'project_id' => $project->id,
            'follow_up_type' => 'project',
            'title' => $request->title,
            'description' => $request->description,
            'reminder_date' => $formattedDate,
            'status' => $request->status,
            'upload_files' => json_encode($uploadedFiles)
        ]);

        return redirect()->route('admin.project.followup', $project->faker_id)->with('success', 'Follow-Up Updated Successfully');
    }


    public function detailFollowUp($followId)
    {
        $followUp = FollowUp::findOrFail(FakerURL::id_d($followId));

        return view('admin.followup.show', compact('followUp'));


    }



}