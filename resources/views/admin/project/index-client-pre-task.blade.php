@extends('admin.partials.master')
@section('main-content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Picklo Homes</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Leads</a></li>
                                    <li class="breadcrumb-item active">Add Mature Client</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Add New  Mature Client</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3"></h4>
                                <div class="row">
                                    <div class="col-12" >

                                        @foreach ($client->tasks as $task)
                                            <p><strong>{{ $task->title }}</strong> ({{ $task->precategory->title }})</p>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.partials.footer')
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('admin-assets/vendor/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}"></script>

    <!-- Wizard Form Demo js -->
    <script src="{{ asset('admin-assets/js/pages/demo.form-wizard.js')}}"></script>

@endpush
