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
<<<<<<< HEAD
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Picklo Homes</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Leads</a></li>
=======
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Picklo Homes</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.manage.users') }}">User</a></li>
>>>>>>> 721f0e5 (First commit)
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
                                        <form action="{{ route('admin.update.user', $user->id) }}" method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">UserName</label>
                                                <input type="text" id="simpleinput" name="name" class="form-control"
                                                       placeholder="Enter User Name" value="{{ $user->name }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label"> Email </label>
                                                <input type="text" id="simpleinput" name="email" class="form-control"
                                                       placeholder="Enter Email" value="{{ $user->email }}" readonly>
                                            </div>


                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label"> Phone </label>
                                                <input type="text" id="simpleinput" name="phone_number"
                                                       class="form-control" placeholder="Enter Phone"
                                                       value="{{ $user->phone_number }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label"> Address</label>
                                                <input type="text" id="simpleinput" name="address" class="form-control"
                                                       placeholder="Enter Address" value="{{ $user->address }}">
                                            </div>

                                            <div class="rounded-full w-40 h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                                <img class="rounded-full" id="imagePreview" width="200" alt=""
                                                     src="{{ (!empty($user->profile_image))  ? asset($user->profile_image) : asset('admin-assets/images/profile-4.jpg') }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Profile Image</label>
                                                <input type="file" id="imageInput" name="profile_image"
                                                       class="form-control" placeholder="Profile Image">
                                            </div>
                                            <a href="{{ url()->previous() }}" class="btn btn-primary">
                                                Back to User
                                            </a>
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









