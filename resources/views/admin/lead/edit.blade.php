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
                                    <li class="breadcrumb-item active">Add New Client</li>
=======
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Picklo Homes</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.manage.lead') }}">Leads</a></li>
                                    <li class="breadcrumb-item active">Edit Client</li>
>>>>>>> 721f0e5 (First commit)
                                </ol>
                            </div>
                            <h4 class="page-title">{{$title}}</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.update.lead', $lead->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
<<<<<<< HEAD
                                                <label for="" class="form-label">Client Name</label>
                                                <input type="text" class="form-control" placeholder="Enter Client Name" name="client_name" value="{{ $lead->client_name }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Client Phone </label>
=======
                                                <label for="" class="form-label">Lead Name</label>
                                                <input type="text" class="form-control" placeholder="Enter Client Name" name="client_name" value="{{ $lead->client_name }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Lead Phone </label>
>>>>>>> 721f0e5 (First commit)
                                                <input type="text" class="form-control" placeholder="Enter Client Phone" name="client_phone" value="{{ $lead->client_phone }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="example-select" class="form-label">Status</label>
                                                <select class="form-select" name="status" id="example-select">
                                                    <option value="">Select Status</option>
                                                    <option value="pending" {{ $lead->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="Approved" {{ $lead->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                                                    <option value="Reject" {{ $lead->status == 'Reject' ? 'selected' : '' }}>Reject</option>
                                                </select>
                                            </div>



                                        </div> <!-- end col -->

                                        <div class="col-lg-6">
                                            <div class="mb-3">
<<<<<<< HEAD
                                                <label class="form-label">Client Email</label>
=======
                                                <label class="form-label">Lead Email</label>
>>>>>>> 721f0e5 (First commit)
                                                <input type="email" class="form-control" placeholder="Enter Client Email" name="client_email" value="{{ $lead->client_email }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Job Address</label>
                                                <input type="text" class="form-control" placeholder="Enter Job Address" name="job_address" value="{{ $lead->job_address }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="assign-to" class="form-label">Assign To</label>
                                                <select class="form-control select2" name="assign_id[]" id="assign-to" multiple>
                                                    @foreach($users as $user)
                                                        <option value="{{ $user->id }}"
                                                                {{ in_array($user->id, $lead->assignedUsers->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                            {{ $user->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>



                                        </div> <!-- end col -->
                                        <div class="col-12">
                                            <div class="mb-3" >
                                                <label for="example-select" class="form-label">Project</label>
                                                <select class="form-select" name="project_type" id="example-select">
                                                    <option value="Project Type"> Project Type </option>
                                                    <option value="Home" {{ $lead->project_type == 'Home' ? 'selected' : '' }}>Home</option>
                                                    <option value="Pool" {{ $lead->project_type == 'Pool' ? 'selected' : '' }}>Pool</option>
<<<<<<< HEAD
                                                    <option value="Remode" {{ $lead->project_type == 'Remode' ? 'selected' : '' }}>Remode</option>
=======
                                                    <option value="Remodel" {{ $lead->project_type == 'Remodel' ? 'selected' : '' }}>Remodel</option>
>>>>>>> 721f0e5 (First commit)
                                                    <option value="Addition" {{ $lead->project_type == 'Addition' ? 'selected' : '' }}>Addition</option>
                                                </select>
                                            </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Notes</label>
                                            <textarea type="textarea" class="form-control" placeholder="notes" name="notes">{{ $lead->notes }}</textarea>
                                        </div>
                                            <button type="submit" class="btn btn-primary">Update Lead</button>
                                        </div>
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

