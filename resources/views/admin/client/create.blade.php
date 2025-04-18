@extends('admin.partials.master')
@push('styles')
    <link href="{{ asset('admin-assets/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css">
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
    </style>
@endpush

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
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Projects</a></li>
                                    <li class="breadcrumb-item active">Add New Project</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Add New Client</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.store.project') }}" method="POST" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="user_id" class="form-label">Client Name</label>
                                        <select class="form-control" name="lead_id" id="lead_id" required>
                                            <option value="">Select a Client</option>
                                            @foreach($clients as $client)
                                                <option value="{{ $client->id }}">
                                                    {{ $client->client_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Phone </label>
                                        <input type="text" class="form-control" placeholder="Enter Client Phone" name="client_phone" value="{{$client->client_phone}}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Client Email</label>
                                        <input type="email" class="form-control" placeholder="Enter Client Email" name="client_email" value="{{$client->client_email}}" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Job Address</label>
                                        <input type="text" class="form-control" placeholder="Enter Job Address" name="job_address" value="{{$client->job_address}}" readonly>
                                    </div>

                                    <div class="mb-3" >
                                        <label for="example-select" class="form-label">Status</label>
                                        <select class="form-select" name="status" id="example-select">
                                            <option value="Select Status"> Select Status </option>
                                            <option value="Pending" {{ $client->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="Approved" {{ $client->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                                            <option value="Reject" {{ $client->status == 'Reject' ? 'selected' : '' }}>Reject</option>
                                        </select>
                                    </div>

                                    <div class="mb-3" >
                                        <label for="example-select" class="form-label">Project</label>
                                        <select class="form-select" name="project_type" id="example-select">
                                            <option value="Project Type"> Project Type </option>
                                            <option value="Home" {{ $client->project_type == 'Home' ? 'selected' : '' }}>Home</option>
                                            <option value="Pool" {{ $client->project_type == 'Pool' ? 'selected' : '' }}>Pool</option>
                                            <option value="Remode" {{ $client->project_type == 'Remode' ? 'selected' : '' }}>Remode</option>
                                            <option value="Addition" {{ $client->project_type == 'Addition' ? 'selected' : '' }}>Addition</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Notes</label>
                                        <textarea type="textarea" class="form-control" placeholder="notes" name="notes"> {{$client->notes}}</textarea>
                                    </div>


                                    <div class="mb-3">
                                        <label for="" class="form-label">Architect</label>
                                        <input type="text" class="form-control" placeholder="Enter Architect" name="architect">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Landscaper</label>
                                        <input type="text" class="form-control" placeholder="Enter Landscaper" name="landscaper">
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Specification Sheet</label>
                                        <input type="file" class="form-control" placeholder="Enter Specification Sheet" name="specification_sheet">
                                    </div>

                                    <div class="mb-3">--}}
                                        <label for="" class="form-label">Architect</label>
                                        <input type="text" class="form-control" placeholder="Enter Architect" name="architect">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Landscaper</label>
                                        <input type="text" class="form-control" placeholder="Enter Landscaper" name="landscaper">
                                    </div>
                                    <div class="mb-3">--}}
                                        <label for="" class="form-label">Plan Files</label>
                                        <input type="file" class="form-control" placeholder="Enter Plan Files" name="plan_files">
                                    </div>


                                    <div class="mb-3">
                                        <label for="project-title" class="form-label">Title</label>
                                        <input type="text" id="project-title" name="title" class="form-control" placeholder="Enter Project Title" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="project-title" class="form-label">Description</label>
                                        <textarea id="project-description" name="description" class="form-control" placeholder="Enter Project Description" rows="4" required></textarea>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="start-date" class="form-label">Start Date</label>
                                            <input type="date" id="start-date" name="start_date" class="form-control" required>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="end-date" class="form-label">End Date</label>
                                            <input type="date" id="end-date" name="end_date" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-6">
                                            <label for="end-date" class="form-label">Upload Images</label>
                                            <div class="upload-container" onclick="document.getElementById('fileInput1').click()">
                                                <p>Drop files here or click to upload.</p>
                                                <div class="preview-container" id="previewContainer1"></div>
                                            </div>
                                            <input type="file" name="upload_images[]"  id="fileInput1" multiple style="display: none;" accept="image/*, .pdf, .docx">
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="end-date" class="form-label">Upload Documents</label>
                                            <div class="upload-container" onclick="document.getElementById('fileInput2').click()">
                                                <p>Drop files here or click to upload.</p>
                                                <div class="preview-container" id="previewContainer2"></div>
                                            </div>
                                            <input type="file" name="upload_documents[]" id="fileInput2" multiple style="display: none;" accept="image/*, .pdf, .docx">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="assign-to" class="form-label">Assign To</label>
                                        <select class="form-control select2" name="assign_id[]" id="assign-to" multiple>
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}">
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Create New Project</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#assign-to').select2();
        });

        function handleFileUpload(inputId, previewId) {
            const fileInput = document.getElementById(inputId);
            const previewContainer = document.getElementById(previewId);

            fileInput.addEventListener('change', function(event) {
                const files = Array.from(event.target.files);
                previewContainer.innerHTML = "";

                const dataTransfer = new DataTransfer();

                files.forEach((file, index) => {
                    const fileReader = new FileReader();
                    fileReader.onload = function(e) {
                        const previewItem = document.createElement("div");
                        previewItem.classList.add("preview-item");

                        const img = document.createElement("img");
                        img.src = e.target.result;

                        const removeButton = document.createElement("button");
                        removeButton.classList.add("remove-btn");
                        removeButton.textContent = "X";

                        removeButton.addEventListener("click", () => {
                            const updatedFiles = Array.from(fileInput.files).filter((_, i) => i !== index);
                            updateFileInput(fileInput, updatedFiles);
                            previewItem.remove();
                        });

                        previewItem.appendChild(img);
                        previewItem.appendChild(removeButton);
                        previewContainer.appendChild(previewItem);
                    };
                    fileReader.readAsDataURL(file);
                    dataTransfer.items.add(file);
                });

                fileInput.files = dataTransfer.files;
            });
        }

        function updateFileInput(fileInput, files) {
            const dataTransfer = new DataTransfer();
            files.forEach(file => dataTransfer.items.add(file));
            fileInput.files = dataTransfer.files;
        }

        handleFileUpload('fileInput1', 'previewContainer1');
        handleFileUpload('fileInput2', 'previewContainer2');


    </script>
@endpush
