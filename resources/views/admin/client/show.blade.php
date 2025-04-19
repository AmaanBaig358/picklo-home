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
<<<<<<< HEAD

        .upload-container {
            border: 2px dashed #ccc;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            margin-bottom: 20px;
            position: relative;
            width: 100%;
            min-height: 120px;
            background-color: #f8f8f8;
        }

        .upload-container p {
            margin: 0;
            font-size: 14px;
            color: #666;
        }

        .preview-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            padding: 10px;
        }

        .preview-container img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .remove-btn {
            background: red;
            color: white;
            border: none;
            cursor: pointer;
            padding: 2px 5px;
            border-radius: 3px;
            position: absolute;
            top: 5px;
            right: 5px;
            font-size: 12px;
        }

        .preview-item {
            position: relative;
        }
=======
>>>>>>> 721f0e5 (First commit)
    </style>
@endpush

@section('main-content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
<<<<<<< HEAD
                <div class="row">
=======

                <!-- Page Title -->
                <div class="row mb-3">
>>>>>>> 721f0e5 (First commit)
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
<<<<<<< HEAD
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Picklo Homes</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Clients</a></li>
=======
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Picklo Homes</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.manage.client') }}">Clients</a></li>
>>>>>>> 721f0e5 (First commit)
                                    <li class="breadcrumb-item active">Client Detail</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
<<<<<<< HEAD
                <div class="container">
                    <div class="d-flex w-100">
                        <div class="w-50">
                            <h2 class="mb-5">Client Detail</h2>
                        </div>
                        <div class="w-50">
                            <a href="{{ route('admin.create.client.project', $client->faker_id) }}" class="float-end btn btn-success btn-sm ms-3">Add New Project</a>
                            <a href="{{ route('admin.manage.client.project', $client->faker_id) }}" class="float-end btn btn-success btn-sm ms-3">Manage Projects</a>
                            <a href="{{ route('admin.edit.client', $client->faker_id) }}" class="float-end btn btn-success btn-sm ms-3">Edit Client</a>
                        </div>


                    </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="" class="form-label">Phone </label>
                                    <input type="text" class="form-control" placeholder="Enter Client Phone" name="client_phone" value="{{$client->lead->client_phone}}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Client Email</label>
                                    <input type="email" class="form-control" placeholder="Enter Client Email" name="client_email" value="{{$client->lead->client_email}}" readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Job Address</label>
                                    <input type="text" class="form-control" placeholder="Enter Job Address" name="job_address" value="{{$client->lead->job_address}}" readonly>
                                </div>

                                <div class="mb-3" >
                                    <label for="example-select" class="form-label">Project</label>
                                    <select class="form-select" name="project_type" id="example-select" disabled>
                                        <option value="Project Type"> Project Type </option>
                                        <option value="Home" {{ $client->lead->project_type == 'Home' ? 'selected' : '' }}>Home</option>
                                        <option value="Pool" {{ $client->lead->project_type == 'Pool' ? 'selected' : '' }}>Pool</option>
                                        <option value="Remode" {{ $client->lead->project_type == 'Remode' ? 'selected' : '' }}>Remode</option>
                                        <option value="Addition" {{ $client->lead->project_type == 'Addition' ? 'selected' : '' }}>Addition</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Notes</label>
                                    <textarea type="textarea" class="form-control" placeholder="notes" name="notes" readonly> {{$client->lead->notes}}</textarea>
                                </div>
                                <div class="mb-3" >
                                    <label for="example-select" class="form-label"> Project Status</label>
                                    <select class="form-select" name="status" id="example-select" disabled>
                                        <option value="Select Status"> Select Status </option>
                                        <option value="Pending" {{ $client->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="Approved" {{ $client->status == 'hold' ? 'selected' : '' }}>Hold</option>
                                        <option value="Reject" {{ $client->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Engineer</label>
                                    <input type="text" class="form-control" placeholder="Enter Engineer" name="engineer" readonly value="{{$client->engineer}}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Architect</label>
                                    <input type="text" class="form-control" placeholder="Enter Architect" name="architect" readonly value="{{$client->architect}}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Landscaper</label>
                                    <input type="text" class="form-control" placeholder="Enter Landscaper" name="landscaper" readonly  value="{{$client->landscaper}}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Specification Sheet</label>
                                    <input type="file" class="form-control" name="spec_sheet">
                                    @if(!empty($client->spec_sheet))
                                        <div class="mt-2">
                                            <a href="{{ asset($client->spec_sheet) }}" class="btn btn-outline-primary" download>
                                                <i class="ri-download-2-line"></i> Download Specification Sheet
                                            </a>
                                        </div>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Access Code</label>
                                    <input type="text" class="form-control" placeholder="Enter Access Code" name="access_code" readonly value="{{$client->access_code}}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Plan Files</label>
                                    <input type="file" class="form-control" name="plan_files">
                                    @if(!empty($client->plan_files))
                                        <div class="mt-2">
                                            <a href="{{ asset($client->plan_files) }}" class="btn btn-outline-primary" download>
                                                <i class="ri-download-2-line"></i> Download Plan File
                                            </a>
                                        </div>
                                    @endif
                                </div>

                                <a href="{{ url()->previous() }}" type="button" class="btn btn-primary" >Back To Client</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

=======

                <!-- Top Buttons -->
                <div class="row mb-4">
                    <div class="col-6">
                        <h2>Client Detail</h2>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ route('admin.create.client.project', $client->faker_id) }}" class="btn btn-success btn-sm ms-2">Add New Project</a>
                        <a href="{{ route('admin.manage.client.project', $client->faker_id) }}" class="btn btn-success btn-sm ms-2">Manage Project</a>
                        <a href="{{ route('admin.edit.client', $client->faker_id) }}" class="btn btn-success btn-sm ms-2">Edit Client</a>
                    </div>
                </div>

                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- LEFT COLUMN -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Client Name</label>
                                    <input type="text" class="form-control" value="{{ $client->lead->client_name }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Client Phone</label>
                                    <input type="text" class="form-control" value="{{ $client->lead->client_phone }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Project Type</label>
                                    <input type="text" class="form-control" value="{{ $client->lead->project_type }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Landscaper</label>
                                    <input type="text" class="form-control" value="{{ $client->landscaper }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Engineer</label>
                                    <input type="text" class="form-control" value="{{ $client->engineer }}" readonly>
                                </div>


                                <div class="mb-3">
                                    <label class="form-label">Plan Files</label>

                                    <div class="preview-container mb-2" id="previewContainer1" style="text-align: left;">
                                        @if(!empty($client->plan_files))
                                            @php
                                                $file = asset($client->plan_files);
                                                $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                                $isImage = in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                                                $isDoc = in_array($extension, ['pdf', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx']);
                                            @endphp

                                            @if($isImage)
                                                <!-- Direct download image -->
                                                <a href="{{ $file }}" download>
                                                    <img src="{{ $file }}" alt="Image Preview" class="img-fluid" style="max-width: 150px;">
                                                </a>
                                            @elseif($isDoc)
                                                <!-- Direct download doc icon -->
                                                <a href="{{ $file }}" download>
                                                    <img src="https://rmk.stavedu.ru/img/doc.png" alt="Document Icon" style="width: 150px;">
                                                </a>
                                            @else
                                                <!-- Fallback -->
                                                <p class="text-muted">Preview not available.</p>
                                            @endif
                                        @else
                                            <p class="text-muted">No file uploaded.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

{{--                                <div class="mb-3">--}}
{{--                                    <label class="form-label">Plan Files</label>--}}
{{--                                    @if(!empty($client->plan_files))--}}
{{--                                        <a href="{{ asset($client->plan_files) }}" class="btn btn-outline-primary" download>--}}
{{--                                            <i class="ri-download-2-line"></i> Download Plan File--}}
{{--                                        </a>--}}
{{--                                    @else--}}
{{--                                        <p class="text-muted">No file uploaded.</p>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <!-- RIGHT COLUMN -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Job Address</label>
                                    <input type="text" class="form-control" value="{{ $client->lead->job_address }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Client Email</label>
                                    <input type="email" class="form-control" value="{{ $client->lead->client_email }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Project Status</label>
                                    <input type="text" class="form-control" value="{{ ucfirst($client->status) }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Architect</label>
                                    <input type="text" class="form-control" value="{{ $client->architect }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Access Code</label>
                                    <input type="text" class="form-control" value="{{ $client->access_code }}" readonly>
                                </div>

                                <!-- Specification Sheet -->
                                <div class="mb-3">
                                    <label class="form-label">Specification Sheet</label>

                                    <div class="preview-container mb-2" id="previewContainer1" style="text-align: left;">
                                        @if(!empty($client->spec_sheet))
                                            @php
                                                $file = asset($client->spec_sheet);
                                                $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                                $isImage = in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                                                $isDoc = in_array($extension, ['pdf', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx']);
                                            @endphp

                                            @if($isImage)
                                                <!-- Direct download image -->
                                                <a href="{{ $file }}" download>
                                                    <img src="{{ $file }}" alt="Image Preview" class="img-fluid" style="max-width: 200px;">
                                                </a>
                                            @elseif($isDoc)
                                                <!-- Direct download doc icon -->
                                                <a href="{{ $file }}" download>
                                                    <img src="https://rmk.stavedu.ru/img/doc.png" alt="Document Icon" style="width: 80px;">
                                                </a>
                                            @else
                                                <!-- Fallback -->
                                                <p class="text-muted">Preview not available.</p>
                                            @endif
                                        @else
                                            <p class="text-muted">No file uploaded.</p>
                                        @endif
                                    </div>
                                </div>



                            </div> <!-- end .row -->
                        </div>

                        <!-- Notes Section -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Notes</label>
                                    <textarea class="form-control" rows="4" readonly>{{ $client->lead->notes }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="text-end mt-4">
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Back To Client</a>
                        </div>

                    </div> <!-- end card-body -->
                </div> <!-- end card -->

            </div> <!-- container -->
        </div> <!-- content -->
    </div> <!-- content-page -->
@endsection
>>>>>>> 721f0e5 (First commit)
