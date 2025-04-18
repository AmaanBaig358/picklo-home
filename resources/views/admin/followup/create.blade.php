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
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Client Follow-Ups</a></li>
                                    <li class="breadcrumb-item active">Add New Follow-Up</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Add New Follow-Up</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.store.user.followup') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-lg-6 mb-3">
                                            <label for="follow-type" class="form-label">Follow-Up Type</label>
                                            <select name="follow-type" id="follow-type" class="form-control">
                                                <option value="">Select Follow-Up Type</option>
                                                <option value="client">Client</option>
                                                <option value="project">Project</option>
                                                <option value="user">User</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="title" class="form-label">Title</label>
                                            <input type="text" name="title" class="form-control" placeholder="Enter Follow Title" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 mb-3 follow-up-select" id="client-select" style="display: none;">
                                            <label>Select Client:</label>
                                            <select class="form-control" name="client_id">
                                                <option value="">Select Client</option>
                                                @forelse($leads as $lead)
                                                    <option value="{{ $lead->id }}">{{ $lead->client_name }}</option>
                                                @empty
                                                    <option value="">No Client Found!</option>
                                                @endforelse
                                            </select>
                                        </div>

                                        <div class="col-lg-12 mb-3 follow-up-select" id="project-select" style="display: none;">
                                            <label>Select Project:</label>
                                            <select class="form-control" name="project_id">
                                                <option value="">Select Project</option>
                                                @forelse($projects as $project)
                                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                                @empty
                                                    <option value="">No Project Found!</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 mb-3">
                                            <label for="client_phone" class="form-label">Client Phone</label>
                                            <input type="text" name="client_phone" class="form-control" placeholder="Client phone number" required value="{{ $lead->client_phone }}" readonly>
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label for="client_email" class="form-label">Client Email</label>
                                            <input type="text" name="client_email" class="form-control" placeholder="Client email" required value="{{ $lead->client_email }}" readonly>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea name="description" class="form-control" placeholder="Enter Project Description" rows="4" required></textarea>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-6">
                                            <label for="reminder_date" class="form-label">Reminder Date/Time</label>
                                            <input type="datetime-local" id="reminder_date" name="reminder_date" class="form-control" required>
                                        </div>

                                        <div class="col-lg-6">
                                            <label for="status" class="form-label">Status</label>
                                            <select name="status" class="form-control" required>
                                                <option value="">Select Follow-up Status</option>
                                                <option value="pending">Pending</option>
                                                <option value="canceled">Canceled</option>
                                                <option value="completed">Completed</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="upload_files" class="form-label">Upload Files</label>
                                        <div class="upload-container" onclick="document.getElementById('fileInput1').click()">
                                            <p>Drop files here or click to upload.</p>
                                            <div class="preview-container" id="previewContainer1"></div>
                                        </div>
                                        <input type="file" name="upload_files[]" id="fileInput1" multiple style="display: none;" accept="image/*, .pdf, .docx">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Create</button>
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
            $('#follow-type').change(function () {
                var selectedValue = $(this).val();

                // Hide all select fields first and remove required attribute
                $('.follow-up-select').hide().find('select').prop('required', false);

                // Show the corresponding select field based on selection and add required attribute
                if (selectedValue === 'client') {
                    $('#client-select').show().find('select').prop('required', true);
                } else if (selectedValue === 'task') {
                    $('#task-select').show().find('select').prop('required', true);
                } else if (selectedValue === 'project') {
                    $('#project-select').show().find('select').prop('required', true);
                } else if (selectedValue === 'user') {
                    $('#user-select').show().find('select').prop('required', true);
                }
            });
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
