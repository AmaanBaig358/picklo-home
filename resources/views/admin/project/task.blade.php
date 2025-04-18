@extends('admin.partials.master')
@push('styles')
{{--    <link rel="stylesheet" href="https://unpkg.com/frappe-gantt/dist/frappe-gantt.css">--}}
    <style>
        #gantt-target {
            width: 100%;
            height: 500px;
        }
        .form-check {
            margin-bottom: 5px;
            font-size: 16px;
            color: #0f5a25;
        }
        .title--section {
            width: 100%;
            border: 3px solid #34804a;
            margin-bottom: 30px;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0px 6px 14px #3f9291;
        }
        .title--section h3 {
            text-align: center;
            text-transform: uppercase;
            padding-top: 10px;
            font-size: 20px;
            color: #39804a;
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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Picklo Homes</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Clients</a></li>
                                    <li class="breadcrumb-item active">Manage Client Task</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Manage Client Task</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-4">
                                        <label> Client Name</label>
                                        <input type="text" class="form-control" value="{{ $project->client->lead->client_name }}" readonly>
                                    </div>
                                    <div class="col-4">
                                        <label> Client Email</label>
                                        <input type="text" class="form-control" value="{{ $project->client->lead->client_email }}" readonly>
                                    </div>
                                    <div class="col-4">
                                        <label> Client Phone</label>
                                        <input type="text" class="form-control" value="{{ $project->client->lead->client_phone }}" readonly>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body ">
                                <h4 class="header-title mb-3"></h4>
                                <form method="POST" action="{{ route('tasks.save') }}">
                                    @csrf
                                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                                    <div id="progressbarwizard">
                                        <div class="row">
                                            <!-- Vertical Tabs Menu -->
                                            <div class="col-md-3">
                                                <div class="title--section">
                                                    <h3>Phases</h3>
                                                </div>
                                                <div class="nav flex-column nav-pills" id="category-tabs" role="tablist" aria-orientation="vertical">
                                                    @foreach ($categories as $key => $category)
                                                        <a
                                                            class="nav-link {{ $key == 0 ? 'active' : '' }}"
                                                            id="tab-{{ $category->id }}"
                                                            data-bs-toggle="pill"
                                                            href="#category-{{ $category->id }}"
                                                            role="tab"
                                                            aria-controls="category-{{ $category->id }}"
                                                            aria-selected="{{ $key == 0 ? 'true' : 'false' }}">
                                                            {{ $category->title }} <span> </span>
                                                        </a>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <!-- Tabs Content -->
                                            <div class="col-md-4">
                                                <div class="title--section">
                                                    <h3>Tasks</h3>
                                                </div>
                                                <div class="tab-content" id="category-tabs-content">
                                                    @foreach ($categories as $key => $category)
                                                        <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}"
                                                                id="category-{{ $category->id }}"
                                                                role="tabpanel"
                                                                aria-labelledby="tab-{{ $category->id }}">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    @foreach ($category->preTasks as $task)
                                                                        <div class="form-check">
                                                                           <label class="form-check-label" for="task-{{ $task->id }}">
                                                                            <input
                                                                                    type="checkbox"
                                                                                    class="form-check-input task-checkbox"
                                                                                    id="task-{{ $task->id }}"
                                                                                    name="tasks[]"
                                                                                    value="{{ $task->id }}"
                                                                                    data-title="{{ $task->title }}"
                                                                                    data-duration="{{ $task->duration }}"
                                                                                    {{ $selectedPreTasks->contains('id', $task->id) ? 'checked' : '' }}>
                                                                                {{ $task->title }}
                                                                            </label>
                                                                            <button type="button" class="btn btn-primary mx-2 p-1 set-duration-btn" style="display: none;">
                                                                                <i class="ri-calendar-2-line"></i></button>
                                                                            <input type="hidden" class="task-start-date" name="task_start_date[{{ $task->id }}]" value="">
                                                                            <input type="hidden" class="task-end-date" name="task_end_date[{{ $task->id }}]" value="">
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="title--section">
                                                    <h3>Gantt Chart</h3>
                                                </div>
                                                <div id="gantt_chart_div"></div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="mt-3 float-end">
                                        <button class="btn btn-success" type="submit">Save</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.partials.footer')




    </div>


    <!-- Duration Modal -->
    <div class="modal fade" id="durationModal" tabindex="-1" aria-labelledby="durationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="durationModalLabel">Set Task Duration</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="durationForm">
                        <div class="mb-3">
                            <label for="startDate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="startDate" name="start_date">
                        </div>
                        <div class="mb-3">
                            <label for="endDate" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="endDate" name="end_date">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveDurationBtn">Save Duration</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        $(document).ready(function () {

            $('.task-checkbox').on('change', function () {

                // Find the button next to this checkbox
                let setDurationButton = $(this).closest('.form-check').find('.set-duration-btn');

                if ($(this).is(':checked')) {
                    setDurationButton.show();  // Checkbox ticked — button show
                } else {
                    setDurationButton.hide();  // Unticked — button hide
                }

            });

            // If you want: trigger the logic on page load for pre-checked tasks
            $('.task-checkbox').each(function() {
                $(this).trigger('change');
            });

            $('.set-duration-btn').on('click', function () {

                let $taskContainer = $(this).closest('.form-check');
                let taskTitle = $taskContainer.find('.task-checkbox').attr('data-title');

                $('#durationModalLabel').text('Set Duration for: ' + taskTitle);

                // Store current task reference
                $('#durationModal').data('taskContainer', $taskContainer);

                $('#durationForm')[0].reset();
                $('#durationModal').modal('show');
            });

            $('#saveDurationBtn').on('click', function () {

                let startDate = $('#startDate').val();
                let endDate = $('#endDate').val();

                if(startDate === '' || endDate === '') {
                    alert('Please select both Start and End Date.');
                    return;
                }

                let $taskContainer = $('#durationModal').data('taskContainer');

                $taskContainer.find('.task-start-date').val(startDate);
                $taskContainer.find('.task-end-date').val(endDate);

                $('#durationModal').modal('hide');

                // Chart ko update kar do
                updateTaskInGantt($taskContainer);
            });

            function updateTaskInGantt($taskContainer) {

                const checkbox = $taskContainer.find('.task-checkbox')[0];
                const taskId = checkbox.value;
                const taskTitle = checkbox.getAttribute('data-title');
                const startDateValue = $taskContainer.find('.task-start-date').val();
                const endDateValue = $taskContainer.find('.task-end-date').val();

                const startDate = new Date(startDateValue);
                const endDate = new Date(endDateValue);

                // Pehle se jo data h usay hata do
                removeTaskFromData(taskId);

                // Naya data push karo
                taskData.push({
                    id: taskId,
                    title: taskTitle,
                    startDate: startDate,
                    endDate: endDate,
                    color: getRandomColor()
                });

                drawChart();  // Chart redraw
            }


        });
    </script>


    <script type="text/javascript">

        google.charts.load('current', { packages: ['gantt'] });
        google.charts.setOnLoadCallback(initializeTaskChart);

        let taskData = []; // Store selected tasks

        function initializeTaskChart() {
            // Load pre-selected tasks on page load
            document.querySelectorAll('.task-checkbox:checked').forEach(function(checkbox) {
                addTaskToData(checkbox);
            });

            drawChart(); // Draw initial chart
        }

        // Event listener for all checkboxes
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.task-checkbox').forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        addTaskToData(this);
                    } else {
                        removeTaskFromData(this.value);
                    }
                    drawChart(); // Redraw chart on every change
                });
            });
        });

        function addTaskToData(checkbox) {
            const taskId = checkbox.value;
            const taskTitle = checkbox.getAttribute('data-title');

            // Parent container se hidden fields nikalna
            const $taskContainer = $(checkbox).closest('.form-check');
            const startDateValue = $taskContainer.find('.task-start-date').val();
            const endDateValue = $taskContainer.find('.task-end-date').val();

            // Agar start ya end date nahi set, to skip karo
            if (!startDateValue || !endDateValue) return;

            const startDate = new Date(startDateValue);
            const endDate = new Date(endDateValue);

            // Duplicate task prevent
            if (!taskData.some(task => task.id === taskId)) {
                taskData.push({
                    id: taskId,
                    title: taskTitle,
                    startDate: startDate,
                    endDate: endDate,
                    color: getRandomColor()
                });
            }
        }

        function removeTaskFromData(taskId) {
            taskData = taskData.filter(task => task.id !== taskId);
        }

        function drawChart() {
            const data = new google.visualization.DataTable();
            data.addColumn('string', 'Task ID');
            data.addColumn('string', 'Task Name');
            data.addColumn('string', 'Resource');
            data.addColumn('date', 'Start Date');
            data.addColumn('date', 'End Date');
            data.addColumn('number', 'Duration');
            data.addColumn('number', 'Percent Complete');
            data.addColumn('string', 'Dependencies');
            data.addColumn('string', 'Bar Color'); // Custom Color

            taskData.forEach(function(task) {
                data.addRow([
                    task.id,
                    task.title,
                    'Resource',
                    task.startDate,
                    task.endDate,
                    null,
                    10,
                    null,
                    task.color
                ]);
            });

            const options = {
                height: 400,
                gantt: {
                    criticalPathEnabled: true,
                    criticalPathStyle: {
                        stroke: '#e64a19',
                        strokeWidth: 5
                    },
                    arrowStyle: {
                        width: 3,
                        color: '#e64a19',
                        radius: 0
                    },
                    barHeight: 20
                }
            };

            const chart = new google.visualization.Gantt(document.getElementById('gantt_chart_div'));
            chart.draw(data, options);

            // Optional: Update task count in UI if you want
            const countElement = document.getElementById('task-count');
            if (countElement) countElement.textContent = taskData.length;
        }

        function getRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
    </script>
@endpush
