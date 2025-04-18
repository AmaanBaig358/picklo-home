@extends('admin.partials.master')
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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Picklo Homes</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Leads</a></li>
                                    <li class="breadcrumb-item active">Add New Client</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Add New Client</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form>
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Client Name</label>
                                                <input type="text" id="simpleinput" class="form-control"
                                                       placeholder="Enter Client Name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Client Phone </label>
                                                <input type="text" id="simpleinput" class="form-control"
                                                       placeholder="Enter Client Phone">
                                            </div>
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Engineer </label>
                                                <input type="text" id="simpleinput" class="form-control"
                                                       placeholder="Enter Engineer">
                                            </div>
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Access Code</label>
                                                <input type="text" id="simpleinput" class="form-control"
                                                       placeholder="Enter Access Code">
                                            </div>
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Specification Sheet</label>
                                                <input type="file" id="simpleinput" class="form-control"
                                                       placeholder="Enter Specification Sheet">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Create New Client</button>
                                        </form>
                                    </div> <!-- end col -->

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Client Email</label>
                                            <input type="text" id="simpleinput" class="form-control"
                                                   placeholder="Enter Client Email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Architect</label>
                                            <input type="text" id="simpleinput" class="form-control"
                                                   placeholder="Enter Architect">
                                        </div>
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Landscaper</label>
                                            <input type="text" id="simpleinput" class="form-control"
                                                   placeholder="Enter Landscaper">
                                        </div>
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Job Address</label>
                                            <input type="text" id="simpleinput" class="form-control"
                                                   placeholder="Enter Job Address">
                                        </div>
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Plan Files</label>
                                            <input type="file" id="simpleinput" class="form-control"
                                                   placeholder="Enter Plan Files">
                                        </div>
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
@endsection
@push('scripts')
    {{--    <script>--}}
    {{--        function showConfirmBox(id) {--}}
    {{--            // var paymentId = id;--}}
    {{--            Swal.fire({--}}
    {{--                title: 'Are you sure?',--}}
    {{--                text: "You won't be able to revert this!",--}}
    {{--                icon: 'warning',--}}
    {{--                showCancelButton: true,--}}
    {{--                confirmButtonColor: '#3085d6',--}}
    {{--                cancelButtonColor: '#d33',--}}
    {{--                confirmButtonText: 'Yes, delete it!'--}}
    {{--            }).then((result) => {--}}
    {{--                if (result.isConfirmed) {--}}
    {{--                    var url = '{{ route("admin.delete.user", ":id") }}';--}}
    {{--                    url = url.replace(':id', id);--}}
    {{--                    axios.get(url)--}}
    {{--                        .then(response => {--}}
    {{--                            if (response.data.success == true){--}}
    {{--                                const row = document.getElementById('payment-row-' + id);--}}
    {{--                                if (row) {--}}
    {{--                                    row.style.transition = 'background-color 0.5s, opacity 0.5s';--}}
    {{--                                    row.style.opacity = 0;--}}
    {{--                                    row.style.backgroundColor = 'red';--}}
    {{--                                    setTimeout(() => {--}}
    {{--                                        row.remove();--}}
    {{--                                    }, 500);--}}
    {{--                                }--}}
    {{--                                Swal.fire(--}}
    {{--                                    'Deleted!',--}}
    {{--                                    response.data.message,--}}
    {{--                                    'success'--}}
    {{--                                );--}}
    {{--                                setTimeout(() => {--}}
    {{--                                    location.reload();--}}
    {{--                                }, 2000);--}}
    {{--                            }--}}
    {{--                        })--}}
    {{--                        .catch(error => {--}}
    {{--                            console.error(error);--}}
    {{--                        });--}}

    {{--                }--}}
    {{--            })--}}
    {{--        }--}}
    {{--    </script>--}}
@endpush
