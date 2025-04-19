<?php

namespace App\Http\Controllers\admin;
use App\Models\Client;
use App\Models\Leads;
use App\Models\ClientTodo;
use App\Models\FollowUp;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $unapprovedLeads = Leads::where('is_approved', 0)->count();
        $approvedLeads = Leads::where('is_approved', 1)->count();
        $activeProject = Project::where('status', 'in_progress')->count();
        $closeProject = Project::where('status', 'completed')->count();
        return view('admin.dashboard',compact('unapprovedLeads','approvedLeads','activeProject','closeProject'));
    }
}
