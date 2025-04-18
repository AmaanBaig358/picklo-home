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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Picklo Homes</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tasks</a></li>
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
                <h4 class="modal-title" id="NewTaskModalLabel">{{$title}}</h4>
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
<div class="modal fade" id="view-task-modal" tabindex="-1" role="dialog" aria-labelledby="ViewTaskModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ViewTaskModalLabel">View Task</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label fw-bold">Title:</label>
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


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>

        $(document).ready(function () {
            $("#task_title").keyup(function () {
                var enteredValue = $(this).val();
                var slug = enteredValue
                    .toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, "")
                    .replace(/\s+/g, "-")
                    .replace(/-+/g, "-");

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
                    alert("Error fetching task details.");
                }
            });
        }
    </script>


    <script>
        function showConfirmBox(id) {
            // var paymentId = id;
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
@endpush
