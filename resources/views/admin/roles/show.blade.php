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
                                        <form action="{{ route('admin.store.role') }}" method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">UserName</label>
                                                <input type="text" id="simpleinput" name="name" class="form-control"
                                                       value="{{ $role->name }}" readonly placeholder="Enter Role Name">
                                            </div>

                                            @foreach($rolePermissions as $value)
                                                <label>
                                                    <input type="checkbox" disabled checked name="permission[]" value="{{ $value->id }}"
                                                           class="name">
                                                    {{ $value->name }}
                                                </label>
                                                <br/>
                                            @endforeach


                                            <a href="{{ url()->previous() }}" class="mt-3 btn btn-primary">
                                                Back to Roles
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






