@extends('admin.partials.master')
@section('main-content')

    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
<<<<<<< HEAD
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Picklo Homes</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tasks</a></li>
=======
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Picklo Homes</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('admin.manage.pre.task') }}">Tasks</a></li>
>>>>>>> 721f0e5 (First commit)
                                    <li class="breadcrumb-item active">{{$title}}</li>
                                </ol>
                            </div>
                            <h4 class="page-title">{{$title}}
                                <a href="#" data-bs-toggle="modal" data-bs-target="#add-new-task-modal"
                                   class="btn btn-success btn-sm ms-3">Add New</a></h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>S No</th>
                                        <th>Title</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($preTasks as $key => $preTask)
                                        <tr>
                                            <td> {{ $key + 1 }}</td>
                                            <td>{{$preTask->title}}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="javascript:" onclick="viewTask({{ $preTask->id }})"
                                                       class="btn btn-outline-success">
                                                        <i class="ri-eye-line me-1"></i> View
                                                    </a>
                                                    <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal"
                                                       data-bs-target="#edit-task-modal"
                                                       onclick="editTask({{ $preTask }})">
                                                        <i class="ri-edit-fill me-1"></i> Edit
                                                    </a>
                                                    <button type="button" class="btn btn-outline-danger"
                                                            onclick="showConfirmBox({{ $preTask->id }})">
                                                        <i class="ri-delete-bin-line me-1"></i> Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No clients found.</td>
                                        </tr>
                                    </tbody>
                                    @endforelse
                                </table>

                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div> <!-- end row-->

            </div> <!-- container -->

        </div> <!-- content -->

        @include('admin.partials.footer')

    </div>
@endsection

<!--  Add new task modal -->
<div class="modal fade task-modal-content" id="add-new-task-modal" tabindex="-1" role="dialog"
     aria-labelledby="NewTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
<<<<<<< HEAD
                <h4 class="modal-title" id="NewTaskModalLabel">{{$title}}</h4>
=======
                <h4 class="modal-title" id="NewTaskModalLabel">Create Task</h4>
>>>>>>> 721f0e5 (First commit)
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="p-2" method="POST" action="{{ route('admin.store.pre.task') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="task-description" class="form-label">Category</label>
                                <select class="form-control" name="category_id" id="category_id" required>
                                    <option value="">Select a Category</option>
                                    @foreach($preCategories as $preCategory)
                                        <option value="{{ $preCategory->id }}">
                                            {{ $preCategory->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="task-title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="task_title" name="title"
                                       placeholder="Enter title">
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Edit task modal -->
<div class="modal fade" id="edit-task-modal" tabindex="-1" role="dialog" aria-labelledby="EditTaskModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="EditTaskModalLabel">Edit Task</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-task-form" method="POST">
                    @csrf

                    <input type="hidden" id="edit_task_id" name="id">

                    <div class="mb-3">
                        <label for="task-description" class="form-label">Category</label>
<<<<<<< HEAD
                        <select class="form-control" name="category_id" id="category_id" required>
=======
                        <select class="form-control" name="category_id" id="edit_category_id" required>
>>>>>>> 721f0e5 (First commit)
                            <option value="">Select a Category</option>
                            @foreach($preCategories as $preCategory)
                                <option value="{{ $preCategory->id }}">
                                    {{ $preCategory->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="edit_task_title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="edit_task_title" name="title" required>
                    </div>

                    <div class="text-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
<div class="modal fade" id="view-task-modal" tabindex="-1" role="dialog" aria-labelledby="ViewTaskModalLabel"
     aria-hidden="true">
=======
<div class="modal fade" id="view-task-modal" tabindex="-1" role="dialog" aria-labelledby="ViewTaskModalLabel" aria-hidden="true">
>>>>>>> 721f0e5 (First commit)
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ViewTaskModalLabel">View Task</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label fw-bold">Title:</label>
<<<<<<< HEAD
                    <p id="view_task_title"></p>
                </div>
                <div class="mb-3">
                    <label for="view_task_category" class="form-label fw-bold">Category:</label>
                    <select class="form-control" name="category_id" id="category_id" required>
                        <option value="">Select a Category</option>
                        @foreach($preCategories as $preCategory)
                            <option value="{{ $preCategory->id }}">
                                {{ $preCategory->title }}
                            </option>
                        @endforeach
                    </select>

                </div>


=======
                    <p id="view_task_title"></p> <!-- Task title will be inserted here -->
                </div>
                <div class="mb-3">
                    <label for="view_task_category_name" class="form-label fw-bold">Category:</label>
                    <p id="view_task_category_name"></p>
                </div>
>>>>>>> 721f0e5 (First commit)
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
@push('scripts')
    <script>

        $(document).ready(function () {
            $("#task_title").keyup(function () {
                var enteredValue = $(this).val();
                var slug = enteredValue
=======


@push('scripts')
    <script>
        $(document).ready(function () {
            // Slug generation for Add form
            $("#task_title").on('keyup', function () {
                let slug = $(this).val()
>>>>>>> 721f0e5 (First commit)
                    .toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, "")
                    .replace(/\s+/g, "-")
                    .replace(/-+/g, "-");
<<<<<<< HEAD

                $("#slug").val(slug);
            });
        });

        function editTask(task) {
            document.getElementById('edit_task_id').value = task.id;
            document.getElementById('edit_task_title').value = task.title;

            // Set the selected category correctly
            let categoryDropdown = document.getElementById('category_id');
            categoryDropdown.value = task.category_id;
            if (categoryDropdown.value !== task.category_id.toString()) {
                $("#category_id").val(task.category_id).change();
            }

            // Update form action dynamically
            let actionUrl = "{{ route('admin.update.pre.task', ':id') }}";
            actionUrl = actionUrl.replace(':id', task.id);
            $("#edit-task-form").attr("action", actionUrl);
        }

        function viewTask(preTaskId) {
            $.ajax({
                url: "{{ route('admin.show.pre.task', '') }}/" + preTaskId,
                type: "GET",
                success: function (response) {
                    if (response) {
                        $('#view_task_title').text(response.title);
                        $('#view_task_category').text(response.category_id);

                        $('#view-task-modal').modal('show'); // Show the modal
                    }
                },
                error: function (xhr) {
=======
                $("#slug").val(slug);
            });

            // Slug generation for Edit form
            $("#edit_task_title").on('keyup', function () {
                let slug = $(this).val()
                    .toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, "")
                    .replace(/\s+/g, "-")
                    .replace(/-+/g, "-");
                $("#edit_task_slug").val(slug);
            });
        });

        function editTask(task) {
            $('#edit_task_id').val(task.id);
            $('#edit_task_title').val(task.title);

            let slug = task.title
                .toLowerCase()
                .replace(/[^a-z0-9\s-]/g, "")
                .replace(/\s+/g, "-")
                .replace(/-+/g, "-");
            $('#edit_task_slug').val(slug);

            // Set the correct category
            $('#edit_category_id').val(task.category_id).change();

            // Update form action
            let actionUrl = "{{ route('admin.update.pre.task', ':id') }}";
            actionUrl = actionUrl.replace(':id', task.id);
            $('#edit-task-form').attr('action', actionUrl);
        }
        function viewTask(preTaskId) {
            $.ajax({
                url: "{{ route('admin.show.pre.task', '') }}/" + preTaskId, // Adjust URL as needed
                type: "GET",
                success: function (response) {
                    if (response) {
                        // Set the title of the task
                        $('#view_task_title').text(response.title);

                        // Set the category name, ensuring it's available
                        $('#view_task_category_name').text(response.category_title);

                        // Show the modal
                        $('#view-task-modal').modal('show');
                    }
                },
                error: function () {
>>>>>>> 721f0e5 (First commit)
                    alert("Error fetching task details.");
                }
            });
        }
<<<<<<< HEAD
    </script>


    <script>
        function showConfirmBox(id) {
            // var paymentId = id;
=======
        function showConfirmBox(id) {
>>>>>>> 721f0e5 (First commit)
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
<<<<<<< HEAD
            }).then((result) = > {
                if(result.isConfirmed
        )
            {
                var url = '{{ route("admin.delete.pre.task", ":id") }}';
                url = url.replace(':id', id);
                axios.get(url)
                    .then(response = > {
                    if(response.data.success == true
            )
                {
                    const row = document.getElementById('payment-row-' + id);
                    if (row) {
                        row.style.transition = 'background-color 0.5s, opacity 0.5s';
                        row.style.opacity = 0;
                        row.style.backgroundColor = 'red';
                        setTimeout(() = > {
                            row.remove();
                    },
                        500
                    )
                        ;
                    }
                    Swal.fire(
                        'Deleted!',
                        response.data.message,
                        'success'
                    );
                    setTimeout(() = > {
                        location.reload();
                },
                    2000
                )
                    ;
                }
            })
            .
                catch(error = > {
                    console.error(error);
            })
                ;

            }
        })
        }
    </script>

    <!-- dragula js-->
    <script src="{{ asset('admin-assets/vendor/dragula/dragula.min.js')}}"></script>

    <!-- demo js -->
    <script src="{{ asset('admin-assets/js/pages/component.dragula.js')}}"></script>
=======
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = '{{ route("admin.delete.pre.task", ":id") }}';
                    url = url.replace(':id', id);

                    axios.get(url)
                        .then((response) => {
                            if (response.data.success) {
                                const row = document.getElementById('payment-row-' + id);
                                if (row) {
                                    row.style.transition = 'background-color 0.5s, opacity 0.5s';
                                    row.style.opacity = 0;
                                    row.style.backgroundColor = 'red';
                                    setTimeout(() => {
                                        row.remove();
                                    }, 500);
                                }

                                Swal.fire(
                                    'Deleted!',
                                    response.data.message,
                                    'success'
                                );

                                setTimeout(() => {
                                    location.reload();
                                }, 2000);
                            }
                        })
                        .catch((error) => {
                            console.error(error);
                            Swal.fire('Error', 'Something went wrong.', 'error');
                        });
                }
            });
        }
    </script>
>>>>>>> 721f0e5 (First commit)
@endpush
