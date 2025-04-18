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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Picklo Homes</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Leads</a></li>
                                    <li class="breadcrumb-item active">Add Mature Client</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Add New  Mature Client</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3"></h4>
                                <form method="POST" action="{{ route('admin.assign.tasks') }}">
                                    @csrf
                                    <input type="hidden" name="client_id" value="{{ $lead->id }}">
                                    @if(session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif

                                    <div id="progressbarwizard">

                                        <ul class="nav nav-pills nav-justified form-wizard-header mb-3" role="tablist">
                                            @foreach ($categories as $key => $category)
                                            <li class="nav-item" role="presentation">

                                                <a href="#category-{{ $category->id }}" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-1  {{ $key == 0 ? 'active' : '' }}" aria-selected="{{ $key == 0 ? 'true' : 'false' }}" role="tab" tabindex="-1">
                                                    <i class="ri-account-circle-line fw-normal fs-18 align-middle me-1"></i>
                                                    <span class="d-none d-sm-inline">{{ $category->title }}</span>
                                                </a>
                                            </li>
                                            @endforeach

                                        </ul>

                                        <div class="tab-content b-0 mb-0" >
                                            <div id="bar" class="progress mb-3" style="height: 7px;">
                                                <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: 66.6667%;" bis_skin_checked="1"></div>
                                            </div>
                                            @foreach ($categories as $key => $category)

                                                <div class="tab-pane {{ $key == 0 ? 'active show' : '' }}" id="category-{{ $category->id }}" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-12" >

                                                        @foreach ($category->preTasks as $task)
                                                            <div class="row mb-3">
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input"
                                                                           id="task-{{ $task->id }}"
                                                                           name="tasks[]"
                                                                           value="{{ $task->id }}"
                                                                            {{ $lead->tasks->contains($task->id) ? 'checked' : '' }}>


                                                                    <label class="form-check-label" for="task-{{ $task->id }}">{{ $task->title }}</label>
                                                                </div>
                                                            </div>

                                                        @endforeach
                                                    </div>
                                                </div>

                                                <ul class="list-inline wizard mb-0">
                                                    @if ($key > 0)
                                                    <li class="previous list-inline-item">
                                                        <button type="button" class="btn btn-light"><i class="ri-arrow-left-line me-1"></i> Back</button>
                                                    </li>
                                                    @endif
                                                        @if ($key < count($categories) - 1)
                                                    <li class="next list-inline-item float-end">
                                                        <a href="javascript:void(0);" class="btn btn-info">Add More Info <i class="ri-arrow-right-line ms-1"></i></a>
                                                    </li>
                                                        @else
                                                            <li class="list-inline-item float-end">
                                                                <button type="submit" class="btn btn-success">Submit <i class="ri-check-line ms-1"></i></button>
                                                            </li>
                                                        @endif
                                                </ul>
                                            </div>

                                            @endforeach

                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.partials.footer')
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('admin-assets/vendor/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}"></script>

    <!-- Wizard Form Demo js -->
    <script src="{{ asset('admin-assets/js/pages/demo.form-wizard.js')}}"></script>

@endpush
