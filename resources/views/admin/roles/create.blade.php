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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.manage.roles') }}">Roles</a></li>
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
                                        <form action="{{ route('admin.store.role') }}" method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">UserName</label>
                                                <input type="text" id="simpleinput" name="name" class="form-control"
                                                       placeholder="Enter Role Name">
                                            </div>


                                            <div class="col-sm-6 mb-2 mb-sm-0">
                                                @foreach($permission as $value)
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input"
                                                               name="permission[]" value="{{ $value->id }}">
                                                        {{ $value->name }}</label>
                                                    </div> <!-- end checkbox -->
                                                @endforeach
                                            </div>

                                            <button type="submit" class="mt-3 btn btn-primary">Create New Role</button>
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






