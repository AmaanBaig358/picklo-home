@extends('admin.partials.master')
@section('main-content')

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Picklo Homes</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Leads</a></li>
                                    <li class="breadcrumb-item active">  {{ $title }}</li>
                                </ol>
                            </div>
                            <h4 class="page-title">  {{ $title }}</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form action="{{ route('admin.store.user') }}" method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">UserName</label>
                                                <input type="text" name="name" class="form-control"
                                                       placeholder="Enter User Name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label"> Email </label>
                                                <input type="email" name="email" class="form-control"
                                                       placeholder="Enter Email">
                                            </div>


                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label"> Password </label>
                                                <input type="password" name="password" id="password"
                                                       class="form-control" placeholder="Enter Password">
                                                <i class="password--hide" data-lucide="eye" id="togglePassword"></i>
                                            </div>

                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label"> Confirm Password</label>
                                                <input type="password" id="confirmation_password"
                                                       name="password_confirmation" class="form-control"
                                                       placeholder="Enter Confirm Password">
                                                <i class="c--password--hide" data-lucide="eye"
                                                   id="toggleConfirmPassword"></i>
                                            </div>

                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label"> Phone </label>
                                                <input type="text" name="phone_number"
                                                       class="form-control" placeholder="Enter Phone">
                                            </div>
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label"> Address</label>
                                                <input type="text" name="address" class="form-control"
                                                       placeholder="Enter Address">
                                            </div>

                                            <div class="mb-3">
                                                <label for="example-select" class="form-label">Select User Role</label>
                                                <select class="form-select" name="user_role" id="example-select">
                                                    <option value="">Select user role</option>
                                                    @forelse($userRole as $role)
                                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Profile Image</label>
                                                <input type="file" name="profile_image"
                                                       class="form-control" placeholder="Profile Image">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Create New User</button>
                                        </form>
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row-->
                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div><!-- end col -->
                </div><!-- end row -->

            </div> <!-- container -->

        </div> <!-- content -->

        @include('admin.partials.footer')

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

@endsection
