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
                                    <li class="breadcrumb-item active">Client Follow-Ups</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="container">
                    <div class="d-flex w-100">
                        <div class="w-50">
                            <h2 class="mb-4">Follow-Ups</h2>
                        </div>
                        <div class="w-50">
                            <a href="{{ route('admin.add.client.followUp', $lead->faker_id) }}" class="float-end btn btn-success btn-sm ms-3">Add New</a>
                        </div>
                    </div>

                    <!-- Bootstrap Tabs -->
                    <ul class="nav nav-tabs" id="followupTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="upcoming-tab" data-toggle="tab" href="#upcoming" role="tab">Upcoming</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="overdue-tab" data-toggle="tab" href="#overdue" role="tab">Overdue</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="completed-tab" data-toggle="tab" href="#completed" role="tab">Completed</a>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content mt-3">
                        <!-- Upcoming Tab -->
                        <div class="tab-pane fade show active" id="upcoming" role="tabpanel">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="basic-datatable" class="datatable table table-striped dt-responsive nowrap w-100">
                                                <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Reminder Date</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($upcomingFollowUps as $followUp)
                                                    <tr class="clickable-row" style="cursor: pointer;" data-href="{{ route('admin.detail.followup', $followUp->faker_id) }}">
                                                        <td>

                                                            {{ $followUp->title }}
                                                 </td>

                                                        <td>{{ $followUp->description }}</td>
                                                        <td>{{ $followUp->reminder_date }}</td>
                                                        <td><span class="text-warning text-uppercase">{{ $followUp->status }}</span></td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                        </div> <!-- end card body-->
                                    </div> <!-- end card -->
                                </div><!-- end col-->
                            </div>
                        </div>

                        <!-- Overdue Tab -->
                        <div class="tab-pane fade" id="overdue" role="tabpanel">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="basic-datatable" class="datatable table table-striped dt-responsive nowrap w-100">
                                                <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Reminder Date</th>
                                                    <th>Status</th>
{{--                                                    <th>Actions</th>--}}
                                                </tr>
                                                <tbody>
                                                @foreach($overdueFollowUps as $followUp)
                                                    <tr class="clickable-row" style="cursor: pointer;" data-href="{{ route('admin.detail.followup', $followUp->faker_id) }}">
                                                        <td>

                                                            {{ $followUp->title }}
                                                        </td>
                                                        <td>{{ $followUp->description }}</td>
                                                        <td>{{ $followUp->reminder_date }}</td>
                                                        <td><span class="text-danger text-uppercase">{{ $followUp->status }}</span></td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                        </div> <!-- end card body-->
                                    </div> <!-- end card -->
                                </div><!-- end col-->
                            </div>
                        </div>

                        <!-- Completed Tab -->
                        <div class="tab-pane fade" id="completed" role="tabpanel">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="basic-datatable" class="datatable table table-striped dt-responsive nowrap w-100">
                                                <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Reminder Date</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($completedFollowUps as $followUp)
                                                    <tr class="clickable-row" style="cursor: pointer;" data-href="{{ route('admin.detail.followup', $followUp->faker_id) }}">
                                                        <td>
                                                                {{ $followUp->title }}
                                                           </td>
                                                        <td>{{ $followUp->description }}</td>
                                                        <td>{{ $followUp->reminder_date }}</td>
                                                        <td><span class="text-success text-uppercase">{{ $followUp->status }}</span></td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                        </div> <!-- end card body-->
                                    </div> <!-- end card -->
                                </div><!-- end col-->
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- container -->

        </div> <!-- content -->

        @include('admin.partials.footer')
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.datatable').DataTable();

            // Fix Bootstrap Tabs Issue (Prevent # in URL)
            $('a[data-toggle="tab"]').on('click', function (e) {
                e.preventDefault(); // Stop default action
                $(this).tab('show'); // Show the tab
            });

            // Maintain Active Tab on Refresh
            let activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                $('#followupTabs a[href="' + activeTab + '"]').tab('show');
            }

            $('#followupTabs a').on('click', function () {
                let tabId = $(this).attr('href');
                localStorage.setItem('activeTab', tabId);
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.clickable-row').on('click', function () {
                window.location.href = $(this).data('href');
            });
        });
    </script>
@endpush
