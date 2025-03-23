@extends('layouts.app')

@section('content')
<main class="p-6 bg-white shadow-lg rounded-lg">
    <h3 class="text-2xl font-bold mb-6">Analytics Dashboard</h3>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="p-6 bg-blue-100 rounded-lg shadow-md">
            <h4 class="text-lg font-semibold">Total Customers</h4>
            <p class="text-3xl font-bold text-blue-700">{{ $totalCustomers }}</p>
        </div>
        <div class="p-6 bg-green-100 rounded-lg shadow-md">
            <h4 class="text-lg font-semibold">Total Projects</h4>
            <p class="text-3xl font-bold text-green-700">{{ $totalProjects }}</p>
        </div>
        <div class="p-6 bg-yellow-100 rounded-lg shadow-md">
            <h4 class="text-lg font-semibold">Total Tasks</h4>
            <p class="text-3xl font-bold text-yellow-700">{{ $totalTasks }}</p>
        </div>
    </div>

    <!-- Growth Trends -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h4 class="text-lg font-semibold">Last Month Growth</h4>
            <ul class="mt-2">
                <li>Customers: <strong>{{ $customersLastMonth }}</strong></li>
                <li>Projects: <strong>{{ $projectsLastMonth }}</strong></li>
                <li>Tasks: <strong>{{ $tasksLastMonth }}</strong></li>
            </ul>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h4 class="text-lg font-semibold">Last Year Growth</h4>
            <ul class="mt-2">
                <li>Customers: <strong>{{ $customersLastYear }}</strong></li>
                <li>Projects: <strong>{{ $projectsLastYear }}</strong></li>
                <li>Tasks: <strong>{{ $tasksLastYear }}</strong></li>
            </ul>
        </div>
    </div>

    <!-- Monthly Trends Chart -->
    <div class="bg-white p-6 rounded-lg shadow-md mt-6">
        <h4 class="text-lg font-semibold mb-4">Monthly Trends (Last 12 Months)</h4>
        <div id="chart_div" style="width: 100%; height: 400px;"></div>
    </div>
</main>

<!-- Google Charts Script -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Month', 'Customers', 'Projects', 'Tasks'],
            @foreach($monthlyData as $data)
                ["{{ $data['month'] }}", {{ $data['customers'] }}, {{ $data['projects'] }}, {{ $data['tasks'] }}],
            @endforeach
        ]);

        var options = {
            title: 'Monthly Trends (Last 12 Months)',
            curveType: 'function',
            legend: { position: 'bottom' },
            hAxis: { title: 'Month' },
            vAxis: { title: 'Count' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>
@endsection
