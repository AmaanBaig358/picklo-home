<?php


namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Models\PreTask;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Helpers\FakerURL;

class TaskController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|integer|exists:projects,id',
            'tasks' => 'required|array',
            'task_start_date' => 'required|array',
            'task_end_date' => 'required|array',
        ]);

        foreach ($request->tasks as $taskId) {
            if (!empty($request->task_start_date[$taskId]) && !empty($request->task_end_date[$taskId])) {

                $preTask = PreTask::find($taskId);

                if ($preTask) {
                    // Check if the task already exists for this project
                    $alreadyExists = Task::where('project_id', $request->project_id)
                        ->where('title', $preTask->title)  // Assuming 'title' is unique for PreTask in the same project
                        ->exists();

                    if (!$alreadyExists) {
                        Task::create([
                            'project_id' => $request->project_id,
                            'user_id' => auth()->id(),
                            'title' => $preTask->title,
                            'start_date' => $request->task_start_date[$taskId],
                            'end_date' => $request->task_end_date[$taskId],
                        ]);
                    }
                }
            }
        }

        return redirect()->back()->with('success', 'Tasks successfully created!');
    }


    public function projectIndex($projectId)
{
    $title = 'Manage Project Task';
    $project = Project::with('tasks')->findOrFail(FakerURL::id_d($projectId));

    return view('admin.task.manage-index', compact('title', 'project'));
}

    public function projectShow($taskId)
    {
        $title = 'Manage Project Task';
        $task = Task::with('project')->findOrFail(FakerURL::id_d($taskId));

        return view('admin.task.show', compact('title', 'task'));
    }

}