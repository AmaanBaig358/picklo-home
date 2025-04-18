<?php

namespace App\Http\Controllers\admin;
use App\Helpers\FakerURL;
use App\Models\Client;
use App\Models\Clients;
use App\Models\Leads;
use App\Models\Project;
use App\Models\ProjectMedia;
use App\Models\ProjectMember;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ClientController extends Controller
{
    public function index()
    {
        $title = 'Clients';
        $clients = Client::with('lead')->get();
        return view('admin.client.index', compact('title', 'clients'));
    }

    public function create()
    {
        $title = 'Create Client';
        $clients = Leads::whereHas('assignedUsers', function ($query) {
            $query->whereNotNull('user_id');
        })->get();
        $users = User::where('is_active', '1')->get();
        return view('admin.client.create', compact('title', 'clients', 'users'));
    }

//    public function store(Request $request) {
//        $request->validate([
//            'client_id' => 'nullable|exists:clients,id',
//            'title' => 'required|string|max:255',
//            'description' => 'nullable|string',
//            'start_date' => 'nullable|date',
//            'end_date' => 'nullable|date',
//            'assign_id' => 'nullable|array',
//            'assign_id.*' => 'exists:users,id',
//            'upload_images.*' => 'nullable|file|mimes:jpg,jpeg,png|max:10240',
//            'upload_documents.*' => 'nullable|file|mimes:pdf,docx|max:20480'
//        ]);
//
//        // Create new project
//        $project = Project::create([
//            'lead_id' => $request->lead_id,
//            'name' => $request->title,
//            'description' => $request->description,
//            'start_date' => $request->start_date,
//            'end_date' => $request->end_date,
//        ]);
//
//        $data = [
//            'lead_id'     => $request->lead_id,
//            'engineer'    => $request->engineer,
//            'architect'   => $request->architect,
//            'landscaper'  => $request->landscaper,
//            'access_code' => $request->access_code,
//        ];
//
//// ✅ Handle Specification Sheet Upload
//        if ($request->hasFile('specification_sheet')) {
//            $file = $request->file('specification_sheet');
//            $filename = time() . '_' . $file->getClientOriginalName();
//            $path = 'uploads/specification-sheet/';
//            $file->move(public_path($path), $filename);
//
//            // Delete old file if it exists
//            if ($data->specification_sheet && file_exists(public_path($data->specification_sheet))) {
//                unlink(public_path($data->specification_sheet));
//            }
//
//            $data['specification_sheet'] = $path . $filename;
//        }
//
//// ✅ Handle Plan Files Upload
//        if ($request->hasFile('plan_files')) {
//            $file = $request->file('plan_files');
//            $filename = time() . '_' . $file->getClientOriginalName();
//            $path = 'uploads/plan-files/';
//            $file->move(public_path($path), $filename);
//
//            // Delete old file if it exists
//            if ($data->plan_files && file_exists(public_path($data->plan_files))) {
//                unlink(public_path($data->plan_files));
//            }
//
//            $data['plan_files'] = $path . $filename;
//        }
//
//// ✅ Now create the client with all data
//         Client::create($data);
//
//
//        // Assign the creator to the project
//        ProjectMember::create([
//            'project_id' => $project->id,
//            'user_id' => auth()->id(), // Automatically assign logged-in user
//        ]);
//
//        // Assign additional users if provided
//        if ($request->has('assign_id')) {
//            foreach ($request->assign_id as $user_id) {
//                if ($user_id != auth()->id()) { // Avoid duplicate assignment
//                    ProjectMember::create([
//                        'project_id' => $project->id,
//                        'user_id' => $user_id
//                    ]);
//                }
//            }
//        }
//
//        // Handle Image Uploads
//        if ($request->hasFile('upload_images')) {
//            $this->storeMediaFiles($request->file('upload_images'), $project, 'image');
//        }
//
//        // Handle Document Uploads
//        if ($request->hasFile('upload_documents')) {
//            $this->storeMediaFiles($request->file('upload_documents'), $project, 'document');
//        }
//
//        return redirect()->route('admin.manage.project')->with('success', 'Project created successfully');
//    }
//
//
//    private function storeMediaFiles($files, $project, $mediaType) {
//        foreach ($files as $file) {
//            $folderPath = public_path("uploads/project-images/{$project->name}");
//
//            if (!File::exists($folderPath)) {
//                File::makeDirectory($folderPath, 0777, true, true);
//            }
//
//            $fileName = time() . '-' . $file->getClientOriginalName();
//            $file->move($folderPath, $fileName);
//
//            ProjectMedia::create([
//                'project_id' => $project->id,
//                'media_type' => $mediaType,
//                'media_url' => "uploads/project-images/{$project->name}/$fileName"
//            ]);
//        }
//    }

    public function edit($ClientId)
    {
        $decodedId = FakerURL::id_d($ClientId);
        $client = Client::with('lead')->findOrFail($decodedId);
        $title = 'Edit Client';
        return view('admin.client.edit', compact('title','client'));
    }

    public function update(Request $request, $ClientId)
    {
        $decodedId = FakerURL::id_d($ClientId);
        $client = Client::with('lead')->findOrFail($decodedId);
        $data = $request->all();
        $client->update($data);
        $clientData = [
            'lead_id'     => $request->lead_id ?? $client->lead_id,
            'engineer'    => $request->engineer,
            'architect'   => $request->architect,
            'landscaper'  => $request->landscaper,
            'access_code' => $request->access_code,
            'status'      => $request->status,
        ];
        $client = Client::with('lead')->findOrFail(FakerURL::id_d($ClientId));
        if ($request->hasFile('spec_sheet')) {
            $file = $request->file('spec_sheet');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = 'uploads/specification-sheet/';
            $file->move(public_path($path), $filename);

            if ($client->spec_sheet && file_exists(public_path($client->spec_sheet))) {
                unlink(public_path($client->spec_sheet));
            }

            $clientData['spec_sheet'] = $path . $filename;
        }
        if ($request->hasFile('plan_files')) {
            $file = $request->file('plan_files');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = 'uploads/plan-files/';
            $file->move(public_path($path), $filename);
            if ($client->plan_files && file_exists(public_path($client->plan_files))) {
                unlink(public_path($client->plan_files));
            }

            $clientData['plan_files'] = $path . $filename;
        }
        $client->update($clientData);

        return redirect()->route('admin.manage.client')
            ->with('success', 'Client updated successfully');
    }

    public function show($ClientId)
    {
        $title = 'Show Client';
        $decodedId = FakerURL::id_d($ClientId);
        $client = Client::with('lead')->findOrFail($decodedId);

        return view('admin.client.show', compact('title', 'client'));
    }

    public function destroy($ClientId)
    {
        try {
            $project = Projects::findOrFail($ClientId);
            foreach (json_decode($project->upload_images, true) as $oldImage) {
                if (file_exists(public_path($oldImage))) {
                    unlink(public_path($oldImage));
                }
            }
            foreach (json_decode($project->upload_documents, true) as $oldDocument) {
                if (file_exists(public_path($oldDocument))) {
                    unlink(public_path($oldDocument));
                }
            }
            $project->delete();
            return response()->json(['success' => true, 'message' => 'Client deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'Client not found'], 404);
        }
    }


}