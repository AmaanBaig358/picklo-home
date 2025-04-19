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

=======
>>>>>>> 721f0e5 (First commit)
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

<<<<<<< HEAD
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

=======
>>>>>>> 721f0e5 (First commit)
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
<<<<<<< HEAD

=======
>>>>>>> 721f0e5 (First commit)
        .preview-item {
            position: relative;
        }
    </style>
@endpush
<<<<<<< HEAD
=======

>>>>>>> 721f0e5 (First commit)
@section('main-content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
<<<<<<< HEAD
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Picklo Homes</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Client</a></li>
                                    <li class="breadcrumb-item active">{{$title}}</li>
                                </ol>
                            </div>
                            <h4 class="page-title">{{$title}}</h4>
=======
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Picklo Homes</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.manage.client') }}">Client</a></li>
                                    <li class="breadcrumb-item active">{{ $title }}</li>
                                </ol>
                            </div>
                            <h4 class="page-title">{{ $title }}</h4>
>>>>>>> 721f0e5 (First commit)
                        </div>
                    </div>
                </div>

<<<<<<< HEAD
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.update.client', $client->faker_id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <h3 class="mb-3">Lead Information</h3>
                                    <hr>

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
                                        <textarea type="textarea" class="form-control" placeholder="notes" name="notes"> {{$client->lead->notes}}</textarea>
                                    </div>


                                    <h3 class="mb-3">Client Details</h3>
                                    <hr>
                                    <div class="mb-3" >
                                        <label for="example-select" class="form-label">Status</label>
                                        <select class="form-select" name="status" id="example-select">
                                            <option value="Select Status"> Select Status </option>
                                            <option value="pending" {{ $client->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="hold" {{ $client->status == 'hold' ? 'selected' : '' }}>Hold</option>
                                            <option value="completed" {{ $client->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Engineer</label>
                                        <input type="text" class="form-control" placeholder="Enter Engineer" name="engineer" value="{{$client->engineer}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Landscaper</label>
                                        <input type="text" class="form-control" placeholder="Enter Landscaper" name="landscaper" value="{{$client->landscaper}}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Architect</label>
                                        <input type="text" class="form-control" placeholder="Enter Architect" name="architect" value="{{$client->architect}}">
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
                                        <input type="text" class="form-control" placeholder="Enter Access Code" name="access_code" value="{{$client->access_code}}">
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

                                    <button type="submit" class="btn btn-primary">Update Client</button>
                                </form>

                            </div>
                        </div>
=======
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.update.client', $client->faker_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Row 1: Client Name | Job Address -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Client Name</label>
                                    <input type="text" class="form-control" name="client_name" value="{{ $client->lead->client_name ?? '' }}" placeholder="Enter Client Name">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Job Address</label>
                                    <input type="text" class="form-control" name="job_address" value="{{ $client->lead->job_address }}" readonly>
                                </div>

                                <!-- Row 2: Client Phone | Client Email -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Client Phone</label>
                                    <input type="text" class="form-control" name="client_phone" value="{{ $client->lead->client_phone }}" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Client Email</label>
                                    <input type="email" class="form-control" name="client_email" value="{{ $client->lead->client_email }}" readonly>
                                </div>

                                <!-- Row 3: Project Type | Status -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Project Type</label>
                                    <input type="text" class="form-control" name="project_type" value="{{ $client->lead->project_type }}" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" name="status">
                                        <option value="Select Status">Select Status</option>
                                        <option value="pending" {{ $client->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="hold" {{ $client->status == 'hold' ? 'selected' : '' }}>Hold</option>
                                        <option value="completed" {{ $client->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    </select>
                                </div>

                                <!-- Row 4: Engineer | Landscaper -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Engineer</label>
                                    <input type="text" class="form-control" name="engineer" value="{{ $client->engineer }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Landscaper</label>
                                    <input type="text" class="form-control" name="landscaper" value="{{ $client->landscaper }}">
                                </div>

                                <!-- Row 5: Architect | Access Code -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Architect</label>
                                    <input type="text" class="form-control" name="architect" value="{{ $client->architect }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Access Code</label>
                                    <input type="text" class="form-control" name="access_code" value="{{ $client->access_code }}">
                                </div>

                                <!-- Row 6: Spec Sheet | Plan Files -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Specification Sheet</label>
                                    <input type="file" class="form-control" name="spec_sheet">
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
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Plan Files</label>
                                    <input type="file" class="form-control" name="plan_files">
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

                                <!-- Row 7: Notes (Full Width) -->
                                <div class="col-12 mb-3">
                                    <label class="form-label">Notes</label>
                                    <textarea class="form-control" name="notes" rows="4" placeholder="Enter any project notes...">{{ $client->lead->notes }}</textarea>
                                </div>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Update Client</button>
                            </div>
                        </form>
>>>>>>> 721f0e5 (First commit)
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<<<<<<< HEAD

=======
>>>>>>> 721f0e5 (First commit)
