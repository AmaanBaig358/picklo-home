@extends('admin.partials.master')
<style>
    button.btn.btn-elevated-rounded-success.text-white.btn-sm.mt-2.my--button {
        background: green;
    }
</style>
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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Leads </a></li>
=======
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Picklo Homes</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.manage.roles') }}">Roles</a></li>
>>>>>>> 721f0e5 (First commit)
                                    <li class="breadcrumb-item active">{{ $title }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="container">
                    <div class="d-flex w-100">
                        <div class="w-50">
                            <h2 class="mb-4">{{ $title }}</h2>
                        </div>
                        <div class="w-50">
                            <a href="{{ route('admin.create.role') }}" class="float-end btn btn-success btn-sm ms-3">Add New Role</a>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Name</th>
                                        <th>Permissions</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @forelse($roles as $key => $role)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $role->name }}</td>

                                            <td style="width: 20%">
                                                @forelse($role->permissions as $permission)
                                                    {{--                                            <label class="badge bg-success">Admin</label>--}}
                                                    <button class="btn btn-elevated-rounded-success text-white btn-sm mt-2 my--button"> {{ $permission->name }}</button>
                                                @empty
                                                @endforelse
                                            </td>


                                            <td>
                                                <div class="d-flex flex-wrap gap-2">
                                                    <a href="{{ route('admin.show.role', $role->id) }}"
                                                       class="btn btn-outline-success">
                                                        <i class="ri-eye-line me-1"></i> View
                                                    </a>
                                                    <a href="{{ route('admin.edit.role', $role->id) }}"
                                                       class="btn btn-outline-primary">
                                                        <i class="ri-edit-fill me-1"></i> Edit
                                                    </a>
                                                    <button type="button" class="btn btn-outline-danger"
                                                            onclick="showConfirmBox({{ $role->id }})">
                                                        <i class="ri-delete-bin-line me-1"></i> Delete
                                                    </button>

                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No users found</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div> <!-- end row-->

            </div> <!-- container -->

        </div> <!-- content -->
        </div>

        @include('admin.partials.footer')

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
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
            }).then((result) => {
                if (result.isConfirmed) {
                    var url = '{{ route("admin.delete.role", ":id") }}';
                    url = url.replace(':id', id);

                    axios.get(url)
                        .then(response => {
                            if (response.data.success === true) {
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
                        .catch(error => {
                            console.error(error);
                        });
                }
            });
        }
    </script>


@endsection
