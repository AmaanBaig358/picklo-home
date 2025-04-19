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
<<<<<<< HEAD
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Picklo Homes</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Projects</a></li>
=======
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Picklo Homes</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.manage.client.project', $client->faker_id) }}">Projects</a></li>
>>>>>>> 721f0e5 (First commit)
                                    <li class="breadcrumb-item active">{{$title}}</li>
                                </ol>
                            </div>
                            <div class="d-flex w-100">
                                <div class="w-50">
                                    <h2 class="mb-5">{{$title}}</h2>
                                </div>
{{--                                <div class="w-50">--}}
{{--                                    <a href="javascript:" class="float-end btn btn-success btn-sm ms-3">Manage </a>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">


                    <div class="col-12">
                        <div class="card">
                            <form action="{{ route('admin.update.project', $project->faker_id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="user_id" class="form-label">Client Name</label>
                                            <input type="text" class="form-control"
                                                   placeholder="Enter Project Title" disabled value="{{$project->client->lead->client_name}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="user_id" class="form-label">Client Email</label>
                                            <input type="text" class="form-control"
                                                   placeholder="Enter Project Title" disabled value="{{$project->client->lead->client_email}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="user_id" class="form-label">Client Phone</label>
                                            <input type="text" class="form-control"
                                                   placeholder="Enter Project Title" disabled value="{{$project->client->lead->client_phone}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="project-title" class="form-label">Title</label>
                                    <input type="text" id="project-title" name="name" class="form-control"
                                           placeholder="Enter Project Title" required value="{{$project->name}}">
                                </div>
                                <div class="mb-3">
                                    <label for="project-title" class="form-label">Description</label>
                                    <textarea id="project-description" name="description" class="form-control"
                                              placeholder="Enter Project Description" rows="4"
                                              required>{{$project->description}}</textarea>

                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="start-date" class="form-label">Start Date</label>
                                        <input type="date" id="start-date" name="start_date" class="form-control"
                                               required value="{{$project->start_date}}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="end-date" class="form-label">End Date</label>
                                        <input type="date" id="end-date" name="end_date" class="form-control" required
                                               value="{{$project->end_date}}">
                                    </div>
                                </div>
                                <div class="row mt-3">



                                    <div class="col-lg-6">
                                        <label class="form-label">Upload Project Images</label>
                                        <div class="upload-container"
                                             onclick="document.getElementById('fileInput1').click()">
                                            <p>Drop files here or click to upload.</p>
                                            <div class="preview-container" id="previewContainer1">
                                                @foreach($project->media as $image)
                                                    @if($image->media_type === 'image')
                                                        <a href="{{ url($image->media_url) }}" download>
                                                            <img src="{{ asset($image->media_url) }}" alt="Uploaded Image" width="100">
                                                        </a>
                                                    @endif

                                                @endforeach
                                            </div>
                                        </div>
                                        <input type="file" name="upload_images[]" id="fileInput1" multiple
                                               style="display: none;" accept="image/*, .pdf, .docx">
                                    </div>
                                    <!-- Upload Documents Section -->
                                    <div class="col-lg-6">
                                        <label class="form-label">Upload Project Document</label>
                                        <div class="upload-container"
                                             onclick="document.getElementById('fileInput2').click()">
                                            <p>Drop files here or click to upload.</p>
                                            <div class="preview-container" id="previewContainer2">
                                                @foreach($project->media as $image)
                                                    @if($image->media_type === 'document')
                                                        <a href="{{ url($image->media_url) }}" download>
                                                            <img src="https://rmk.stavedu.ru/img/doc.png" alt="Uploaded Document" width="100">
                                                        </a>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <input type="file" name="upload_documents[]" id="fileInput2" multiple
                                               style="display: none;" accept="image/*, .pdf, .docx">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="assign-to" class="form-label">Assign To</label>
                                    <select class="form-control select2" name="assign_id[]" id="assign-to" multiple>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}" {{ in_array($user->id, $project->members->pluck('user_id')->toArray()) ? 'selected' : '' }}>
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Update Project</button>
                            </div>
                            </form>
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
            $('#assign-to').select2({
                placeholder: "Select Assign Users",
                allowClear: true
            });
        });
    </script>
    <script>
        function handleFileUpload(inputId, previewId) {
            const fileInput = document.getElementById(inputId);
            const previewContainer = document.getElementById(previewId);

            fileInput.addEventListener("change", function (event) {
                const files = Array.from(event.target.files);
                previewContainer.innerHTML = ""; // Clear previous previews

                const dataTransfer = new DataTransfer(); // To manage file input state

                files.forEach((file, index) = > {
                    const fileReader = new FileReader();

                fileReader.onload = function (e) {
                    const previewItem = document.createElement("div");
                    previewItem.classList.add("preview-item");

                    if (file.type.startsWith("image/")) {
                        const img = document.createElement("img");
                        img.src = e.target.result;
                        img.classList.add("preview-image");
                        previewItem.appendChild(img);
                    } else {
                        const docPreview = document.createElement("span");
                        docPreview.textContent = file.name;
                        docPreview.classList.add("doc-preview");
                        previewItem.appendChild(docPreview);
                    }

                    // Cross (X) Remove Button
                    const removeButton = document.createElement("span");
                    removeButton.classList.add("remove-btn");
                    removeButton.innerHTML = "&#10060;"; // Unicode for ❌

                    removeButton.addEventListener("click", () = > {
                        files.splice(index, 1); // Remove file from array
                    updateFileInput(fileInput, files);
                    previewItem.remove();
                })
                    ;

                    previewItem.appendChild(removeButton);
                    previewContainer.appendChild(previewItem);
                };

                fileReader.readAsDataURL(file);
                dataTransfer.items.add(file);
            })
                ;

                fileInput.files = dataTransfer.files;
            });
        }

        // Function to update input files when a file is removed
        function updateFileInput(fileInput, files) {
            const dataTransfer = new DataTransfer();
            files.forEach(file = > dataTransfer.items.add(file)
        )
            ;
            fileInput.files = dataTransfer.files;
        }

        // Initialize for both file inputs
        handleFileUpload("fileInput1", "previewContainer1");
        handleFileUpload("fileInput2", "previewContainer2");
    </script>
@endpush
