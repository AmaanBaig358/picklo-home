@extends('admin.partials.master')
@section('main-content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Picklo Homes</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Projects Tasks</a></li>
                                    <li class="breadcrumb-item active">{{$title}}</li>
                                </ol>
                            </div>
                            <div class="d-flex w-100">
                                <div class="w-50">
                                    <h2 class="mb-5">{{$title}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">


                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="user_id" class="form-label">Project</label>
                                            <input type="text" id="project-title" class="form-control"
                                                   placeholder="Enter Project Title" required value="{{ $task->project->name }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="user_id" class="form-label">User Name</label>
                                            <input type="text" class="form-control"
                                                   placeholder="Enter User Name" required value="{{ $task->user->name }}" disabled>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="user_id" class="form-label">Title</label>
                                            <input type="text" id="project-title" class="form-control"
                                                   placeholder="Enter Project Title" required value="{{ $task->title }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="user_id" class="form-label">Status</label>
                                            <input type="text" class="form-control"
                                                   placeholder="Enter Project Title" required value="{{ $task->status }}" disabled>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="user_id" class="form-label">Start Date</label>
                                            <input type="text" id="project-title" class="form-control"
                                                   placeholder="Enter Project Title" required value="{{ $task->start_date }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="user_id" class="form-label">End Date</label>
                                            <input type="text" class="form-control"
                                                   placeholder="Enter Project Title" required value="{{ $task->start_date }}" disabled>
                                        </div>
                                    </div>

                                </div>


                                <a href="{{ url()->previous() }}" type="button" class="btn btn-primary">Back To Project</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

