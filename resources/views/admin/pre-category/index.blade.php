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
                                    <li class="breadcrumb-item active">{{$title}}</li>
                                </ol>
                            </div>
                            <h4 class="page-title">{{$title}}
=======
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Picklo Homes</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('admin.manage.pre.category') }}">Phases</a></li>
                                    <li class="breadcrumb-item active">Manage Phases</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Manage Phases
>>>>>>> 721f0e5 (First commit)
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
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
<<<<<<< HEAD


=======
>>>>>>> 721f0e5 (First commit)
                                    <tbody>
                                    @forelse($preCategories as $key => $preCategorie)
                                        <tr>
                                            <td> {{ $key + 1 }}</td>
                                            <td>{{$preCategorie->title}}</td>
                                            <td>{{$preCategorie->description}}</td>
                                            <td>
                                                <div class="d-flex flex-wrap gap-2">
                                                    <a href="javascript:" onclick="viewTask({{ $preCategorie->id }})"
                                                       class="btn btn-outline-success">
                                                        <i class="ri-eye-line me-1"></i> View
                                                    </a>
                                                    <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal"
                                                       data-bs-target="#edit-task-modal"
                                                       onclick="editTask({{ $preCategorie }})">
                                                        <i class="ri-edit-fill me-1"></i> Edit
                                                    </a>
                                                    <button type="button" class="btn btn-outline-danger"
                                                            onclick="showConfirmBox({{$preCategorie->id }})">
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
                <h4 class="modal-title" id="NewTaskModalLabel">Create Phases</h4>
>>>>>>> 721f0e5 (First commit)
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="p-2" method="POST" action="{{ route('admin.store.pre.category') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="task-title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="task_title" name="title"
                                       placeholder="Enter title">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="task-title" class="form-label">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter Slug">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="mb-3">
                                <label for="task-description" class="form-label">Description</label>
                                <textarea class="form-control" id="task-description" name="description"
                                          rows="3"></textarea>
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
<<<<<<< HEAD
                <h4 class="modal-title" id="EditTaskModalLabel">Edit Pre Category</h4>
=======
                <h4 class="modal-title" id="EditTaskModalLabel">Edit Phases</h4>
>>>>>>> 721f0e5 (First commit)
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-task-form" method="POST">
                    @csrf
<<<<<<< HEAD

=======
>>>>>>> 721f0e5 (First commit)
                    <input type="hidden" id="edit_task_id" name="id">
                    <div class="mb-3">
                        <label for="edit_task_title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="edit_task_title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_task_slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" id="edit_task_slug" name="slug" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_task_description" class="form-label">Description</label>
                        <textarea class="form-control" id="edit_task_description" name="description" rows="3"
                                  required></textarea>
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


<div class="modal fade" id="view-task-modal" tabindex="-1" role="dialog" aria-labelledby="ViewTaskModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
<<<<<<< HEAD
                <h4 class="modal-title" id="ViewTaskModalLabel">View Pre Category </h4>
=======
                <h4 class="modal-title" id="ViewTaskModalLabel">View Phases </h4>
>>>>>>> 721f0e5 (First commit)
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label fw-bold">Title:</label>
                    <p id="view_task_title"></p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Slug:</label>
                    <p id="view_task_slug"></p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Description:</label>
                    <p id="view_task_description"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


@push('scripts')
    <script>
<<<<<<< HEAD

        $(document).ready(function () {
            $("#task_title").keyup(function () {
                var enteredValue = $(this).val();
                var slug = enteredValue
                    .toLowerCase() // Convert to lowercase
                    .replace(/[^a-z0-9\s-]/g, "") // Remove special characters
                    .replace(/\s+/g, "-") // Replace spaces with hyphens
                    .replace(/-+/g, "-"); // Remove multiple hyphens

                $("#slug").val(slug); // Set the slug input field
            });
        });

        function editTask(task) {
            document.getElementById('edit_task_id').value = task.id;
            document.getElementById('edit_task_title').value = task.title;
            document.getElementById('edit_task_slug').value = task.slug;
            document.getElementById('edit_task_description').value = task.description;
            let actionUrl = "{{ route('admin.update.pre.category', ':id') }}";
            actionUrl = actionUrl.replace(':id', task.id);

            $("#edit-task-form").attr("action", actionUrl);
        }

        function viewTask(preCategoryId) {
            $.ajax({
                url: "{{ route('admin.show.pre.category', '') }}/" + preCategoryId,
                type: "GET",
                success: function (response) {
                    if (response) {
                        $('#view_task_title').text(response.title);
                        $('#view_task_slug').text(response.slug);
                        $('#view_task_description').text(response.description);

                        $('#view-task-modal').modal('show'); // Show the modal
                    }
                },
                error: function (xhr) {
                    alert("Error fetching task details.");
=======
        $(document).ready(function () {
            $("#task_title").keyup(function () {
                let slug = $(this).val()
                    .toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-');
                $("#slug").val(slug);
            });
        });

        // Slug for Edit Modal
        $("#edit_task_title").on('keyup', function () {
            let slug = $(this).val()
                .toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');
            $("#edit_task_slug").val(slug);
        });

        function editTask(task) {
            $('#edit_task_id').val(task.id);
            $('#edit_task_title').val(task.title);
            $('#edit_task_slug').val(task.slug);
            $('#edit_task_description').val(task.description);

            let actionUrl = "{{ route('admin.update.pre.category', ':id') }}".replace(':id', task.id);
            $('#edit-task-form').attr('action', actionUrl);
        }

        function viewTask(id) {
            $.ajax({
                url: "{{ route('admin.show.pre.category', '') }}/" + id,
                type: "GET",
                success: function (res) {
                    if (res) {
                        $('#view_task_title').text(res.title);
                        $('#view_task_slug').text(res.slug);
                        $('#view_task_description').text(res.description);
                        $('#view-task-modal').modal('show');
                    }
                },
                error: function () {
                    alert("Error fetching details.");
                }
            });
        }

        function showConfirmBox(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This will be permanently deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = "{{ route('admin.delete.pre.category', ':id') }}".replace(':id', id);
                    axios.get(url).then((res) => {
                        if (res.data.success) {
                            const row = document.getElementById('payment-row-' + id);
                            if (row) {
                                row.style.transition = 'opacity 0.5s, background-color 0.5s';
                                row.style.backgroundColor = '#f8d7da';
                                row.style.opacity = 0;
                                setTimeout(() => row.remove(), 500);
                            }
                            Swal.fire('Deleted!', res.data.message, 'success');
                            setTimeout(() => location.reload(), 2000);
                        }
                    }).catch((err) => {
                        console.error(err);
                    });
>>>>>>> 721f0e5 (First commit)
                }
            });
        }
    </script>
<<<<<<< HEAD


    <script>
        function showConfirmBox(id) {

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) = > {
                if(result.isConfirmed
        )
            {
                var url = '{{ route("admin.delete.pre.category", ":id") }}';
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
>>>>>>> 721f0e5 (First commit)
@endpush


