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
                                <a href="#" data-bs-toggle="modal" data-bs-target="#add-new-task-modal" class="btn btn-success btn-sm ms-3">Add New</a></h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="board">
                            @foreach($client->cards as $card)
                            <div class="tasks">
                                <h5 class="mt-0 task-header">{{ $card->name }} </h5>
                                <div id="{{ $card->id }}" class="task-list-items">
                                    @foreach($card->todos as $task)
                                        <div class="card mb-0" id="{{ $task->id }}" data-task-id="{{ $task->id }}">
                                            <div class="card-body p-3">
                                                <span class="float-end badge bg-success-subtle text-success">{{ $task->priority }}</span>
                                                <small class="text-muted">{{ $task->created_at->format('d M Y') }}</small>

                                                <h5 class="my-2 fs-16">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body">
                                                        {{ $task->title }}
                                                    </a>
                                                </h5>

                                                <p class="mb-0">
                                                <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                                    <i class="ri-briefcase-2-line text-muted"></i> CRM
                                                </span>
                                                                            <span class="text-nowrap mb-2 d-inline-block">
                                                    <i class="ri-discuss-line text-muted"></i> <b>68</b> Comments
                                                </span>
                                                </p>

                                                <div class="dropdown float-end mt-2">
                                                    <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-2-fill fs-18"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a href="javascript:void(0);" class="dropdown-item"><i class="ri-edit-box-line me-1"></i>Edit</a>
                                                        <a href="javascript:void(0);" class="dropdown-item"><i class="ri-delete-bin-line me-1"></i>Delete</a>
                                                        <a href="javascript:void(0);" class="dropdown-item"><i class="ri-user-add-line me-1"></i>Add People</a>
                                                        <a href="javascript:void(0);" class="dropdown-item"><i class="ri-logout-circle-line me-1"></i>Leave</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>


                    </div>
                </div>
            </div>
        </div>

        @include('admin.partials.footer')

    </div>
@endsection

<!--  Add new task modal -->
<div class="modal fade task-modal-content" id="add-new-task-modal" tabindex="-1" role="dialog" aria-labelledby="NewTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="NewTaskModalLabel">Create New Todo</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add-task-form" class="p-2">
                    @csrf
                    <input type="hidden" id="client_id" name="client_id" value="{{ $client->id }}">
                    <div class="mb-3">
                        <label for="task-title" class="form-label">Client Name</label>
                        <input type="text" class="form-control" readonly value="{{ $client->client_name}}">
                        <input type="hidden" class="form-control" id="client_id" name="client_id" value="{{ $client->id}}">
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="task-title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="task-title" placeholder="Enter title">
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="task-priority2" class="form-label">Priority</label>
                                <select class="form-select" id="task-priority2" name="priority">
                                    <option value="">Select Task Priority</option>
                                    <option value="Low">Low</option>
                                    <option value="Medium">Medium</option>
                                    <option value="High">High</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="task-description" class="form-label">Description</label>
                        <textarea class="form-control" id="task-description" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="task-priority2" class="form-label">Status</label>
                        <select class="form-select" id="task-status" name="card_id">
                            @foreach($client->cards as $card)
                            <option value="{{ $card->id }}">{{ $card->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="task-priority" class="form-label">Due Date</label>
                                <input type="date" class="form-control" id="birthdatepicker" name="end_date" data-toggle="date-picker" data-single-date-picker="true">
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

<!--  Task details modal -->
<div class="modal fade task-modal-content" id="task-detail-modal" tabindex="-1" role="dialog" aria-labelledby="TaskDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="TaskDetailModalLabel">iOS App home page <span class="badge bg-danger ms-2">High</span></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="p-2">
                    <h5 class="mt-0">Description:</h5>

                    <p class="text-muted mb-4">
                        Voluptates, illo, iste itaque voluptas corrupti ratione reprehenderit magni similique? Tempore, quos delectus asperiores
                        libero voluptas quod perferendis! Voluptate, quod illo rerum? Lorem ipsum dolor sit amet. With supporting text below
                        as a natural lead-in to additional contenposuere erat a ante.
                    </p>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-4">
                                <h5>Create Date</h5>
                                <p>17 March 2023 <small class="text-muted">1:00 PM</small></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-4">
                                <h5>Due Date</h5>
                                <p>22 December 2023 <small class="text-muted">1:00 PM</small></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-4" id="tooltip-container">
                                <h5>Asignee:</h5>
                                <div class="avatar-group mt-1">
                                    <a href="javascript: void(0);" class="avatar-group-item"
                                       data-bs-toggle="tooltip" data-bs-placement="top"
                                       title="Tosha">
                                        <img src="{{ asset('admin-assets/images/users/avatar-1.jpg')}}" alt=""
                                             class="rounded-circle avatar-xs">
                                    </a>
                                    <a href="javascript: void(0);" class="avatar-group-item"
                                       data-bs-toggle="tooltip" data-bs-placement="top"
                                       title="Hooker">
                                        <div class="avatar-xs">
                                            <div
                                                    class="avatar-title rounded-circle text-bg-warning">
                                                K
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript: void(0);" class="avatar-group-item"
                                       data-bs-toggle="tooltip" data-bs-placement="top"
                                       title="Brain">
                                        <img src="{{ asset('admin-assets/images/users/avatar-9.jpg')}}" alt=""
                                             class="rounded-circle avatar-xs">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row-->

                    <ul class="nav nav-tabs nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#home-b1" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                Comments
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#profile-b1" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                Files
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="home-b1">
                            <textarea class="form-control mb-2" placeholder="Write message" id="example-textarea" rows="3"></textarea>
                            <div class="text-end">
                                <div class="btn-group mb-2 d-none d-sm-inline-block">
                                    <button type="button" class="btn btn-link btn-sm text-muted fs-18"><i class="ri-attachment-2"></i></button>
                                </div>
                                <div class="btn-group mb-2 d-none d-sm-inline-block">
                                    <button type="button" class="btn btn-primary btn-sm">Submit</button>
                                </div>
                            </div>

                            <div class="d-flex mt-2">
                                <img class="me-3 avatar-sm rounded-circle" src="{{ asset('admin-assets/images/users/avatar-3.jpg')}}" alt="Generic placeholder image">
                                <div class="w-100">
                                    <h5 class="mt-0">Jeremy Tomlinson</h5>
                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in
                                    vulputate at, tempus viverra turpis.

                                    <div class="d-flex mt-3">
                                        <a class="pe-3" href="#">
                                            <img src="{{ asset('admin-assets/images/users/avatar-4.jpg')}}" class="avatar-sm rounded-circle" alt="Generic placeholder image">
                                        </a>
                                        <div class="w-100">
                                            <h5 class="mt-0">Kathleen Thomas</h5>
                                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in
                                            vulputate at, tempus viverra turpis.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mt-2">
                                <a href="javascript:void(0);" class="text-danger">Load more </a>
                            </div>
                        </div>
                        <div class="tab-pane" id="profile-b1">
                            <div class="card mb-1 shadow-none border">
                                <div class="p-2">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="avatar-sm">
                                                        <span class="avatar-title rounded">
                                                            .ZIP
                                                        </span>
                                            </div>
                                        </div>
                                        <div class="col ps-0">
                                            <a href="javascript:void(0);" class="text-muted fw-bold">-admin-design.zip</a>
                                            <p class="mb-0">2.3 MB</p>
                                        </div>
                                        <div class="col-auto">
                                            <!-- Button -->
                                            <a href="javascript:void(0);" class="btn btn-link btn-lg text-muted">
                                                <i class="ri-download-2-line"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-1 shadow-none border">
                                <div class="p-2">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <img src="{{ asset('admin-assets/images/small/small-1.jpg')}}" class="avatar-sm rounded" alt="file-image" />
                                        </div>
                                        <div class="col ps-0">
                                            <a href="javascript:void(0);" class="text-muted fw-bold">Dashboard-design.jpg</a>
                                            <p class="mb-0">3.25 MB</p>
                                        </div>
                                        <div class="col-auto">
                                            <!-- Button -->
                                            <a href="javascript:void(0);" class="btn btn-link btn-lg text-muted">
                                                <i class="ri-download-2-line"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-0 shadow-none border">
                                <div class="p-2">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="avatar-sm">
                                                        <span class="avatar-title bg-secondary rounded">
                                                            .MP4
                                                        </span>
                                            </div>
                                        </div>
                                        <div class="col ps-0">
                                            <a href="javascript:void(0);" class="text-muted fw-bold">Admin-bug-report.mp4</a>
                                            <p class="mb-0">7.05 MB</p>
                                        </div>
                                        <div class="col-auto">
                                            <!-- Button -->
                                            <a href="javascript:void(0);" class="btn btn-link btn-lg text-muted">
                                                <i class="ri-download-2-line"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script src="{{ asset('admin-assets/vendor/dragula/dragula.min.js')}}"></script>
<script src="{{ asset('admin-assets/js/pages/component.dragula.js')}}"></script>
<script>
$(document).on('submit', '#add-task-form', function(e) {
    e.preventDefault();
    let formData = new FormData(this);
    $.ajax({
        url: "{{ route('admin.client.todo.store') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            if (response.success) {
                alertify.success('✅ Task created successfully!');
                $('#add-new-task-modal').modal('hide');
                setTimeout(() => {
                    location.reload();
            }, 1500);
            } else {
                alertify.error('❌ Something went wrong!');
            }
        },
        error: function(xhr) {
            console.log(xhr);
            if (xhr.responseJSON && xhr.responseJSON.errors) {
                $.each(xhr.responseJSON.errors, function(key, value) {
                    alertify.error(value[0]);
                });
            } else {
                alertify.error('⚠️ Error adding task.');
            }
        }
    });
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const containers = Array.from(document.querySelectorAll(".task-list-items")).filter(Boolean);
    if (containers.length === 0) {
        console.warn("No task lists found.");
        return;
    }
    const drake = dragula(containers);
    drake.on("drop", function (el, target, source, sibling) {
        if (!target) return;
        const cardId = el.getAttribute("data-task-id");
        const newTaskId = target.id;
        let orderNumber = 1;
        [...target.children].forEach((child, index) => {
            child.setAttribute("data-order", index + 1);
        if (child === el) {
            orderNumber = index + 1;
        }
    });
        console.log(`Card ID: ${cardId}, New Task ID: ${newTaskId}, Order Number: ${orderNumber}`);
        $.ajax({
            url: "/update-todo-order",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                card_id: newTaskId,
                task_id: cardId,
                order_number: orderNumber
            },
            success: function (response) {
                if (response.success) {
                } else {
                    alertify.error("Error updating task:", response.error);
                }
            },
            error: function (xhr) {
                console.error("AJAX Error:", xhr.responseText);
            }
        });
    });
});
</script>
@endpush


