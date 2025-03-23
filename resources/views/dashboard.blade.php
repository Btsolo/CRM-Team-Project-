@extends('layouts.app')

@section('content')
<main class="flex-1 p-6 bg-white md:ml-10 transition-all duration-300 rounded-tl-xl shadow-inner">

    <h3 class="text-2xl font-bold mb-4">Welcome {{ $user->first_name. ' '.$user->last_name }}.</h3>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
        
        <!-- Total Customers -->
        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-gray-500 text-sm font-medium">Total Customers</h3>
                    <p class="text-2xl font-bold text-blue-600 mt-2">{{ $totalCustomers }}</p>
                </div>
                <div class="bg-blue-100 p-3 rounded-full">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Pending Tasks -->
        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="text-gray-500 text-sm font-medium">Pending Tasks</h3>
                    <p class="text-2xl font-bold text-orange-600 mt-2">{{ $pendingTasks }}</p>
                </div>
                <div class="bg-orange-100 p-3 rounded-full">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Projects -->
        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-gray-500 text-sm font-medium">Total Projects</h3>
                    <p class="text-2xl font-bold text-purple-600 mt-2">{{ $projects->count() }}</p>
                </div>
                <div class="bg-purple-100 p-3 rounded-full">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M9 12h6M9 16h6M9 8h6M3 12h2M3 16h2M3 8h2M19 12h2M19 16h2M19 8h2"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Interactions -->
    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
        <h3 class="text-gray-500 text-sm font-medium mb-4">Recent Interactions</h3>
        <ul class="space-y-4">
            @foreach($recentInteractions as $interaction)
                <li class="flex items-center justify-between">
                    <span class="text-gray-600">{{ $interaction->customer->first_name }} {{ $interaction->customer->last_name }}</span>
                    <span class="text-sm text-gray-400">{{ $interaction->created_at->diffForHumans() }}</span>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Recent Projects -->
    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
        <h3 class="text-gray-500 text-sm font-medium mb-4">Recent Projects</h3>
        <ul class="space-y-4">
            @foreach($projects as $project)
                <li class="flex items-center justify-between">
                    <span class="text-gray-600">{{ $project->name }}</span>
                    <span class="text-sm text-gray-400">{{ $project->status }}</span>
                </li>
            @endforeach
        </ul>
    </div>

 
    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
        <h3 class="text-gray-500 text-sm font-medium mb-4">Mini Analysis</h3>
        <p class="text-gray-600 text-sm">
            Over the last 6 months, there has been a steady increase in project completion rates, with a 
            <span class="text-green-600 font-bold">{{ $growthRate }}%</span> growth compared to the previous period.  
            Task completion has shown a {{ $taskCompletionRate > 0 ? 'positive' : 'negative' }} trend, indicating 
            {{ $taskCompletionRate > 0 ? 'improved productivity' : 'a need for better task management' }}.  
            Customer interactions have remained {{ $interactionStability > 0 ? 'consistent' : 'fluctuating' }}, suggesting 
            {{ $interactionStability > 0 ? 'strong engagement' : 'potential gaps in follow-ups' }}.
        </p>
    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
   
    const ctx = document.getElementById('revenueChart').getContext('2d');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: Object.keys(revenueData),
            datasets: [{
                label: 'Revenue',
                data: Object.values(revenueData),
                borderColor: 'rgb(54, 162, 235)',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>

@endsection
