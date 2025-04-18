<?php

use App\Http\Controllers\admin\FollowUpController;
use App\Http\Controllers\admin\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\LeadController;
use App\Http\Controllers\admin\ClientController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\PreCategoryController;
use App\Http\Controllers\admin\PreSubCategoryController;
use App\Http\Controllers\admin\PreTaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('admin.login');
});

Route::view('login', 'admin.auth.login')->name('admin.login');
Route::post('login', [AuthController::class, 'loginProcess'])->name('admin.login.process');

Route::middleware('auth')->group(function () {

Route::get('logout', [AuthController::class, 'authLogout'])->name('admin.logout');
Route::get('dashboard', function (){ return view('admin.dashboard'); })->name('admin.dashboard');

// USER MANAGEMENT ROUTES START
Route::get('manage-users', [UserController::class, 'index'])->name('admin.manage.users');
Route::get('create-user', [UserController::class, 'create'])->name('admin.create.user');
Route::post('create-user', [UserController::class, 'store'])->name('admin.store.user');
Route::get('edit-user/{userId}', [UserController::class, 'edit'])->name('admin.edit.user');
Route::post('edit-user/{userId}', [UserController::class, 'update'])->name('admin.update.user');
Route::get('show-user/{userId}', [UserController::class, 'show'])->name('admin.show.user');
Route::get('delete-user/{userId}', [UserController::class, 'destroy'])->name('admin.delete.user');
// USER MANAGEMENT ROUTES END

// USER ROLE MANAGEMENT ROUTES START
Route::get('manage-roles', [RoleController::class, 'index'])->name('admin.manage.roles');
Route::get('create-role', [RoleController::class, 'create'])->name('admin.create.role');
Route::post('create-role', [RoleController::class, 'store'])->name('admin.store.role');
Route::get('edit-role/{roleId}', [RoleController::class, 'edit'])->name('admin.edit.role');
Route::post('edit-role/{roleId}', [RoleController::class, 'update'])->name('admin.update.role');
Route::get('show-role/{roleId}', [RoleController::class, 'show'])->name('admin.show.role');
Route::get('delete-role/{roleId}', [RoleController::class, 'destroy'])->name('admin.delete.role');

// CLIENTS MANAGEMENT ROUTES START
Route::get('manage-lead', [LeadController::class, 'index'])->name('admin.manage.lead');
Route::get('create-lead', [LeadController::class, 'create'])->name('admin.create.lead');
Route::post('create-lead', [LeadController::class, 'store'])->name('admin.store.lead');
Route::get('edit-lead/{leadId}', [LeadController::class, 'edit'])->name('admin.edit.lead');
Route::post('edit-lead/{leadId}', [LeadController::class, 'update'])->name('admin.update.lead');
Route::get('show-lead/{leadId}', [LeadController::class, 'show'])->name('admin.show.lead');
Route::get('delete-lead/{leadId}', [LeadController::class, 'destroy'])->name('admin.delete.lead');

// CLIENT MANAGEMENT ROUTES START
Route::get('manage-client', [ClientController::class, 'index'])->name('admin.manage.client');
Route::get('create-client', [ClientController::class, 'create'])->name('admin.create.client');
Route::post('create-client', [ClientController::class, 'store'])->name('admin.store.client');
Route::get('edit-client/{ClientId}', [ClientController::class, 'edit'])->name('admin.edit.client');
Route::get('show-client/{ClientId}', [ClientController::class, 'show'])->name('admin.show.client');
Route::post('edit-client/{ClientId}', [ClientController::class, 'update'])->name('admin.update.client');
Route::get('delete-client/{ClientId}', [ClientController::class, 'destroy'])->name('admin.delete.client');


// PROJECTS MANAGEMENT ROUTES START DEACTIVE
    Route::get('create-client-project/{clientId}', [ProjectController::class, 'create'])->name('admin.create.client.project');
    Route::post('create-project', [ProjectController::class, 'store'])->name('admin.store.project');
    Route::get('manage-client-projects/{clientId}', [ProjectController::class, 'index'])->name('admin.manage.client.project');
    Route::get('show-client-project/{ProjectId}', [ProjectController::class, 'show'])->name('admin.show.client.project');
    Route::get('edit-client-project/{ProjectId}', [ProjectController::class, 'edit'])->name('admin.edit.client.project');
    Route::post('edit-project/{ProjectId}', [ProjectController::class, 'update'])->name('admin.update.project');


    Route::get('delete-project/{ProjectId}', [ProjectController::class, 'destroy'])->name('admin.delete.project');

Route::get('project-followups/{projectId}', [FollowUpController::class, 'indexProjectFollowUp'])->name('admin.project.followup');
Route::get('create-project-followup/{projectId}', [FollowUpController::class, 'createProjectFollowUp'])->name('admin.create.project.followup');
Route::post('store-project-followup/{projectId}', [FollowUpController::class, 'storeProjectFollowUp'])->name('admin.store.project.followup');
Route::get('project-client-task/{projectId}', [ProjectController::class, 'indexProjectClientTask'])->name('admin.project.client.task');
Route::get('mature-client/{projectId}', [PreTaskController::class, 'matureClient'])->name('admin.client.task');
//Route::post('assign-tasks', [PreTaskController::class, 'assignTasks'])->name('admin.assign.tasks');

        //
    Route::post('/tasks/save', [TaskController::class, 'store'])->name('tasks.save');
    Route::get('manage-project-task/{projectId}',[TaskController::class, 'projectIndex'])->name('project.tasks.save');
    Route::get('show-project-task/{taskId}',[TaskController::class, 'projectShow'])->name('project.tasks.show');

// MANAGE CLIENT PRE CATEGORY ROUTES START
Route::get('manage-pre-category', [PreCategoryController::class, 'index'])->name('admin.manage.pre.category');
Route::get('create-pre-category', [PreCategoryController::class, 'create'])->name('admin.create.pre.category');
Route::post('create-pre-category', [PreCategoryController::class, 'store'])->name('admin.store.pre.category');
Route::get('show-pre-category/{PreCategoryId}', [PreCategoryController::class, 'show'])->name('admin.show.pre.category');
Route::post('edit-pre-category/{PreCategoryId}', [PreCategoryController::class, 'update'])->name('admin.update.pre.category');
Route::get('delete-pre-category/{PreCategoryId}', [PreCategoryController::class, 'destroy'])->name('admin.delete.pre.category');



// MANAGE CLIENT PRE SUBCATEGORY ROUTES START
    Route::get('manage-pre-subcategory', [PreSubCategoryController::class, 'index'])->name('admin.manage.pre.subcategory');
    Route::get('create-pre-subcategory', [PreSubCategoryController::class, 'create'])->name('admin.create.pre.subcategory');
    Route::post('create-pre-subcategory', [PreSubCategoryController::class, 'store'])->name('admin.store.pre.subcategory');
    Route::get('show-pre-subcategory/{PreSubCategoryId}', [PreSubCategoryController::class, 'show'])->name('admin.show.pre.subcategory');
    Route::post('edit-pre-subcategory/{PreSubCategoryId}', [PreSubCategoryController::class, 'update'])->name('admin.update.pre.subcategory');
    Route::get('delete-pre-subcategory/{PreSubCategoryId}', [PreSubCategoryController::class, 'destroy'])->name('admin.delete.pre.subcategory');

// MANAGE CLIENT PRE TASK ROUTES START
Route::get('manage-pre-task', [PreTaskController::class, 'index'])->name('admin.manage.pre.task');
Route::get('create-pre-task', [PreTaskController::class, 'create'])->name('admin.create.pre.task');
Route::post('create-pre-task', [PreTaskController::class, 'store'])->name('admin.store.pre.task');
Route::get('show-pre-task/{PreTaskId}', [PreTaskController::class, 'show'])->name('admin.show.pre.task');
Route::post('edit-pre-task/{PreTaskId}', [PreTaskController::class, 'update'])->name('admin.update.pre.task');
Route::get('delete-pre-task/{PreTaskId}', [PreTaskController::class, 'destroy'])->name('admin.delete.pre.task');
Route::get('client-todo/{ClientId}', [LeadController::class, 'clientTodo'])->name('admin.client.todo');
Route::post('client-todo', [LeadController::class, 'todoStore'])->name('admin.client.todo.store');
Route::get('manage-client-todo/{ClientId}', [LeadController::class, 'manageTodo'])->name('admin.client.todo.manage');
Route::Post('update-todo-order', [LeadController::class, 'updateOrder'])->name('admin.client.todo.order');

Route::get('client-follow-up/{ClientId}', [FollowUpController::class, 'clientFollowUpIndex'])->name('admin.client.followUp');
Route::get('add-client-follow-up/{ClientId}', [FollowUpController::class, 'addClientFollowUp'])->name('admin.add.client.followUp');
Route::post('store-client-follow-up/{ClientId}', [FollowUpController::class, 'storeClientFollowUp'])->name('admin.store.client.followUp');



Route::get('follow-up-complete/{followId}', [FollowUpController::class, 'completeFollowUp'])->name('admin.complete.followup');
Route::get('follow-up-edit/{followId}', [FollowUpController::class, 'editFollowUp'])->name('admin.edit.followup');
Route::post('follow-up-update/{followId}', [FollowUpController::class, 'updateFollowUp'])->name('admin.update.followup');




Route::get('user-followups', [FollowUpController::class, 'indexUserFollowUp'])->name('admin.user.followup');
Route::get('create-user-followup', [FollowUpController::class, 'createUserFollowUp'])->name('admin.create.user.followup');
Route::post('store-user-followup', [FollowUpController::class, 'storeUserFollowUp'])->name('admin.store.user.followup');
Route::get('follow-up-detail/{followId}', [FollowUpController::class, 'detailFollowUp'])->name('admin.detail.followup');

});

// ONLY VIEW ROUTES
Route::view('manage-task', 'admin.task.index')->name('admin.manage.task');
Route::view('create-task', 'admin.task.create')->name('admin.create.task');
Route::view('manage-file', 'admin.file-manager.index')->name('admin.manage.file');
//Route::view('mature-client', 'admin.lead.mature')->name('admin.mature.lead');
