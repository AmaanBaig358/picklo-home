@extends('admin.partials.master')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #004eff;
            border: 1px solid #aaa;
            border-radius: 4px;
            cursor: default;
            color: #fff;
            float: left;
            margin-right: 5px;
            margin-top: 5px;
            padding: 0 5px;
        }
    </style>
@endpush
@section('main-content')
    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
<<<<<<< HEAD
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Picklo Homes</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Leads</a></li>
=======
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Picklo Homes</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.manage.lead') }}">Leads</a></li>
>>>>>>> 721f0e5 (First commit)
                                    <li class="breadcrumb-item active">Add New Lead</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Add New Lead</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.store.lead') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="" class="form-label"> Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter Client Name" name="client_name">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Phone </label>
                                                    <input type="text" class="form-control" placeholder="Enter Client Phone" name="client_phone">
                                                </div>

                                            <div class="mb-3" >
                                                <label for="example-select" class="form-label">Project</label>
                                                <select class="form-select" name="project_type" id="example-select">
                                                    <option value="Project Type"> Project Type </option>
                                                    <option value="Home">Home</option>
                                                    <option value="Pool">Pool</option>
<<<<<<< HEAD
                                                    <option value="Remode">Remode</option>
=======
                                                    <option value="Remodel">Remodel</option>
>>>>>>> 721f0e5 (First commit)
                                                    <option value="Addition">Addition</option>
                                                </select>
                                            </div>

                                        </div> <!-- end col -->

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Client Email</label>
                                                <input type="email" class="form-control" placeholder="Enter Client Email" name="client_email">
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Job Address</label>
                                                <input type="text" class="form-control" placeholder="Enter Job Address" name="job_address">
                                            </div>
                                            <div class="mb-3">
                                                <label for="assign-to" class="form-label">Assign To</label>
                                                <select class="form-control select2" name="assign_id[]" id="assign-to" multiple>
                                                    @foreach($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-12">

                                            <div class="mb-3">
                                                <label for="" class="form-label">Notes</label>
                                                <textarea type="textarea" class="form-control" placeholder="notes" name="notes"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Create New Lead</button>
                                        </div> <!-- end col -->
                                    </div>
                                </form>
                                <!-- end row-->
                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div><!-- end col -->
                </div><!-- end row -->

            </div> <!-- container -->

        </div> <!-- content -->

        @include('admin.partials.footer')
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#assign-to').select2({
                placeholder: "Select Assign Users",
                allowClear: true
            });
        });
    </script>
@endpush
