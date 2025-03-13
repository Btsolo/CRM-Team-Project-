@extends('layouts.app')

@section('content')

<!-- Main Content -->
<main class="flex-1 p-6 bg-white md:ml-10 transition-all duration-300 rounded-tl-xl shadow-inner">
    
    <h3 class="text-2xl font-bold  mb-4">Welcome "USER NAME".</h3>
    <!--Dashboard grid container-->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
        <!--Total customers card-->
        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
            <Div class="flex items-center justify-between">
                <div>
                    <h3 class="text-gray-500 text-sm font-medium">Total Customers</h3>
                    <p class="text-2xl font-bold text-blue-600 mt-2">1234</p>  <!-- this is subject to change to something that dispalys this info from backend-->
                </div>
                <div class="bg-blue-100 p-3 rounded-full">
                    <!--User's icon-->
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
            </Div>
    </div>

    <!--Sales comparison card-->
    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
        <h3 class="text-gray-500 text-sm font-medium mb-4">Sales this Week</h3>
        <div class="flex items-center justify-between">
            <div>
                <p class="text-2xl font-bold text-green-600">Ksh 200,000</p>
                <span class="text-sm text-green-500">↑ 12%</span>
        </div>
        <div class="text-right">
            <p class="text-sm text-gray-500">Last Week</p>
            <p class="text-sm text-gray-500">Ksh 180,000</p>

        </div>
    </div>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
        <div class="flex justify-between items-center">
            <div>
                <h3 class="text-gray-500 text-sm font-medium">Pending Tasks</h3>
                <p class="text-2xl font-bold text-orange-600 mt-2">15</p>
            </div>
            <div class="bg-orange-100 p-3 rounded-full"></div>
            <!--Clipbard icon-->
            <svg class="w6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
            </svg>
        </div>
    </div>

    <!--Recent interaction card-->
    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
        <h3 class="text-gray-500 text-sm font-medium mb-4">Recent Interaction</h3>
        <ul class="space-y-4">
            <li class="flex items-center justify-between">
                <span class="text-gray-600">John Doe</span>
                <span class="text-sm text-gray-400">2hrs ago</span>
            </li>
            <li class="flex items-center justify-between">
                <span class="text-gray-600">Jane Smith</span>
                <span class="text-sm text-gray-400">3hrs ago</span>
            </li>
            <li class="flex items-center justify-between">
                <span class="text-gray-600">Mary Jane</span>
                <span class="text-sm text-gray-400">4hrs ago</span>
            </li>
        </ul>
    </div>
    </div>
    
<!--Revenue chart section-->
<div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
    <h3 class="text-gray-500 text-sm font-medium mb-4">Revenue Trends(last 6 months)</h3>
    <!--Revenue chart-->
    <div class="h-64 bg-gray-50 rounded-lg flex items-center justify-center">
        <!-- Chart placeholder (replace with actual chart) -->
        <p class="text-gray-400">Revenue chart will go here</p>
    </div>
</div>
</main>
@endsection