@extends('admin.partials.master')

@push('style')
    <style>
        .dropdown-menu {
            min-width: 120px;
        }
    </style>
@endpush

@section('main-content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
<<<<<<< HEAD
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Picklo Homes</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">{{ $title }}</a></li>
=======
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Picklo Homes</a></li>
                                    <li class="breadcrumb-item active">{{ $title }}</li>
>>>>>>> 721f0e5 (First commit)

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
                            <a href="{{ route('admin.create.lead') }}" class="float-end btn btn-success btn-sm ms-3">Add New Lead</a>
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
<<<<<<< HEAD
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
=======
                                            <th>Lead Name</th>
                                            <th> Lead Email</th>
                                            <th> Lead Phone</th>
>>>>>>> 721f0e5 (First commit)
{{--                                            <th>Architect</th>--}}
                                            <th>Project Type</th>
                                            <th>Status</th>

{{--                                            <th>Actions</th>--}}
                                        </tr>
                                        </thead>
                                        <tbody>


                                        @forelse($leads as $key => $lead)
                                            <tr class="clickable-row" style="cursor: pointer;" data-href="{{ route('admin.show.lead', $lead->faker_id) }}">
                                                <td>{{ $key + 1 }}</td>
                                                <td>

                                                        {{ $lead->client_name }}
                                                </td>
                                                <td>{{ $lead->client_email }}</td>
                                                <td>{{ $lead->client_phone }}</td>
                                                <td>{{ $lead->project_type }}</td>
                                                <td>{{ $lead->status }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No clients found.</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div> <!-- container -->
            </div> <!-- content -->
        </div>
        @include('admin.partials.footer')
    </div>
@endsection

@push('scripts')
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
                    let url = '{{ route("admin.delete.lead", ":id") }}';
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
                                Swal.fire('Deleted!', response.data.message, 'success');
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
    <script>
        $(document).ready(function () {
            $('.clickable-row').on('click', function () {
                window.location.href = $(this).data('href');
            });
        });
    </script>
@endpush
