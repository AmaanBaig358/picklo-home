<?php

namespace App\Http\Controllers\admin;
use App\Helpers\FakerURL;
use App\Models\Client;
use App\Models\Project;
use App\Models\ProjectMedia;
use App\Models\ProjectMember;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    public function index($clientId)
    {
        $title = 'Manage Project';
        $clientId = FakerURL::id_d($clientId);
        $clientProjects = Project::where('client_id', $clientId)->with('client')->OrderByDesc('created_at')->get();
        return view('admin.project.index', compact('title', 'clientProjects'));
    }

<<<<<<< HEAD
=======
    public function sidebar($clientId)
    {
        $title = 'Manage Project';
        $clientId = FakerURL::id_d($clientId);

        $client = Client::findOrFail($clientId); // 🔥 Add this line

        $clientProjects = Project::where('client_id', $clientId)
            ->with('client')
            ->orderByDesc('created_at')
            ->get();

        return view('admin.project.index', compact('title', 'clientProjects', 'client'));
    }

>>>>>>> 721f0e5 (First commit)
    public function create($clientId)
    {
        $title = 'Create Project';
        $client = Client::with('lead')->findOrFail(FakerURL::id_d($clientId));
        $users = User::get();
        return view('admin.project.create', compact('title', 'client', 'users'));
    }

    public function store(Request $request) {


        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'assign_id' => 'nullable|array',
            'assign_id.*' => 'exists:users,id',
            'upload_images.*' => 'nullable|file|mimes:jpg,jpeg,png|max:10240',
            'upload_documents.*' => 'nullable|file|mimes:pdf,docx|max:20480'
        ]);

        $clientId = FakerURL::id_d($request->client_id);

        $project = Project::create([
            'client_id' => $clientId,
            'name' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        ProjectMember::create([
            'project_id' => $project->id,
            'user_id' => auth()->id(), // Automatically assign logged-in user
        ]);

        if ($request->has('assign_id')) {
            foreach ($request->assign_id as $user_id) {
                if ($user_id != auth()->id()) { // Avoid duplicate assignment
                    ProjectMember::create([
                        'project_id' => $project->id,
                        'user_id' => $user_id
                    ]);
                }
            }
        }

        if ($request->hasFile('upload_images')) {
            $this->storeMediaFiles($request->file('upload_images'), $project, 'image');
        }

        // Handle Document Uploads
        if ($request->hasFile('upload_documents')) {
            $this->storeMediaFiles($request->file('upload_documents'), $project, 'document');
        }

        return redirect()->route('admin.manage.client.project', $request->client_id)->with('success', 'Project created successfully');
    }

    public function edit($ProjectId)
    {
        $title = 'Edit Project';
        $project = Project::with('members', 'media')->findOrFail(FakerURL::id_d($ProjectId));
        $users = User::all();
        return view('admin.project.edit', compact('project','title', 'users'));
    }

    public function update(Request $request, $ProjectId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'assign_id' => 'nullable|array',
            'assign_id.*' => 'exists:users,id',
            'upload_images.*' => 'nullable|file|mimes:jpg,jpeg,png|max:10240',
            'upload_documents.*' => 'nullable|file|mimes:pdf,docx|max:20480'
        ]);

        // Fetch the project by ID
        $project = Project::findOrFail(FakerURL::id_d($ProjectId));

        // Update project details
        $project->update([
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        // Update project members manually (add or remove members)
        if ($request->has('assign_id')) {
            // Remove any users who are not in the new assign_id list
            $currentMemberIds = $project->members->pluck('user_id')->toArray();
            $newMemberIds = collect($request->assign_id)->filter(fn($id) => $id != auth()->id())->all();

        // Add logged-in user to the list
        $newMemberIds[] = auth()->id();

        // Find members to be removed
        $membersToRemove = array_diff($currentMemberIds, $newMemberIds);
        ProjectMember::whereIn('user_id', $membersToRemove)
            ->where('project_id', $project->id)
            ->delete(); // Removing unassigned members

        // Add new members
        foreach ($newMemberIds as $user_id) {
            if (!in_array($user_id, $currentMemberIds)) {
                ProjectMember::create([
                    'project_id' => $project->id,
                    'user_id' => $user_id,
                ]);
            }
        }
    }

        // Handle image uploads (without deleting old media)
        if ($request->hasFile('upload_images')) {
            $this->storeMediaFiles($request->file('upload_images'), $project, 'image');
        }

        // Handle document uploads (without deleting old media)
        if ($request->hasFile('upload_documents')) {
            $this->storeMediaFiles($request->file('upload_documents'), $project, 'document');
        }

        return redirect()->route('admin.manage.client.project', $project->client->faker_id)
            ->with('success', 'Project updated successfully');
    }

    public function show($projectId)
    {
        $title = 'Project Detail';
        $users = User::where('is_active', '1')->get();
        $project = Project::with('media', 'members')->findOrFail(FakerURL::id_d($projectId));
        return view('admin.project.show', compact('title', 'users', 'project'));
    }


<<<<<<< HEAD
=======


    //HELPER FUNCTION
>>>>>>> 721f0e5 (First commit)
    private function storeMediaFiles($files, $project, $mediaType) {
        foreach ($files as $file) {
            $folderPath = public_path("uploads/project-images/{$project->name}");

            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, 0777, true, true);
            }

            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->move($folderPath, $fileName);

            ProjectMedia::create([
                'project_id' => $project->id,
                'media_type' => $mediaType,
                'media_url' => "uploads/project-images/{$project->name}/$fileName"
            ]);
        }
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 721f0e5 (First commit)
