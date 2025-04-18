<?php

namespace App\Http\Controllers\admin;

use App\Models\Client;
use App\Models\Clients;
use App\Models\Leads;
use App\Models\PreCategory;
use App\Models\Project;
use App\Models\Task;
use App\Models\TodoTask;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PreTask;
use App\Helpers\FakerURL;

class PreTaskController extends Controller
{
    public function index()
    {
        $title = 'Manage Client Task';
        $preCategories = PreCategory::get();
        $preTasks = PreTask::get();
        return view('admin.pre-task.index', compact('title', 'preCategories', 'preTasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required',
        ]);
        $data = $request->all();
        PreTask::create($data);
        return redirect()->route('admin.manage.pre.task')->with('success', 'Pre Task created successfully');
    }

    public function update(Request $request, $PreTaskId)
    {
        $preTasks = PreTask::findOrFail($PreTaskId);
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required',
        ]);
        $preTasks->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
        ]);
        return redirect()->back()->with('success', ' Pre Task updated successfully!');
    }

    public function show($PreTaskId)
    {
        $preTasks = PreTask::findOrFail($PreTaskId);

        if (!$preTasks) {
            return response()->json(['error' => ' Pre Task not found'], 404);
        }
        return response()->json($preTasks);
    }

    public function destroy($PreTaskId)
    {
        try {
            $preTasks = PreTask::findOrFail($PreTaskId);
            $preTasks->delete();
            return response()->json(['success' => true, 'message' => 'Pre Task deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'Pre Task not found'], 404);
        }
    }

    public function matureClient($projectId)
    {
        // Fetch categories with preTasks
        $categories = PreCategory::with('preTasks')->get();

        // Get the project with related tasks
        $project = Project::with('showPreTasks', 'tasks')->find(FakerURL::id_d($projectId));

        // Get the task titles from the project
        $taskTitles = $project->tasks->pluck('title')->toArray();

        // Fetch all preTasks from categories and filter based on the taskTitles
        $selectedPreTasks = $categories->flatMap(function ($category) use ($taskTitles) {
            return $category->preTasks->filter(function ($task) use ($taskTitles) {
                return in_array($task->title, $taskTitles);
            });
        });

        // Pass data to the view
        return view('admin.project.task', compact('categories', 'project', 'selectedPreTasks'));
    }


    public function assignTasks(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:projects,id',
            'tasks' => 'required|array',
            'tasks.*' => 'exists:pre_tasks,id',
        ]);
        $client = Project::find($request->client_id);
        if (!$client) {
            return redirect()->back()->with('error', 'Client not found.');
        }
        $client->tasks()->sync($request->tasks);
        return redirect()->back()->with('success', 'Tasks successfully assigned.');
    }

}
