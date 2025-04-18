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
            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Picklo Homes</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ $title }} </a></li>
                                    <li class="breadcrumb-item active">Manage</li>
                                </ol>
                            </div>
                            <div class="d-flex w-100">
                                <div class="w-50">
                                    <h2 class="mb-5">Manage Project</h2>
                                </div>
                                <div class="w-50">
                                    <a href="{{ route('admin.create.client.project', 'sd') }}" class="float-end btn btn-success btn-sm ms-3">Add New Project</a>
                                </div>
                            </div>
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
                                        <th>S.no</th>
                                        <th>Client</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Assigned Members</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($clientProjects as $key => $project)
                                        <tr class="clickable-row" style="cursor: pointer;" data-href="{{ route('admin.show.client.project', $project->faker_id) }}">
                                            <td>{{ $key+1}}</td>
                                            <td>{{ $project->client->lead->client_name }}</td>
                                            <td>{{ $project->name }}</td>
                                            <td><span class="badge bg-primary">{{ ucfirst($project->status) }}</span></td>
                                            <td>{{ $project->start_date }}</td>
                                            <td>{{ $project->end_date }}</td>
                                            <td>
                                                @foreach($project->members as $member)
                                                    <span class="badge bg-info">{{ $member->user->name }}</span>
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach

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
@push('scripts')
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
            }).then((result) => {
                if (result.isConfirmed) {
                    var url = '{{ route("admin.delete.lead", ":id") }}';
                    url = url.replace(':id', id);
                    axios.get(url)
                        .then(response => {
                            if (response.data.success == true){
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
            })
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
