@extends('layouts.app')

@section('content')
<!-- Main Content -->
<main class="flex-1 p-6 bg-white md:ml-10 transition-all duration-300 rounded-tl-xl shadow-inner">
    <!--Search and filters section-->
    <section class="mb-8">
        <h2 class="text-2xl  font-bold text-gray-800 mb-4">Search & Filters</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!--Search bar-->
            <div>
                <label for="search-name" class="block text-sm font-medium text-gray-700">Search by Name</label>
                <input type="text" id="search-name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" placeholder="Enter Customer Name">
        </div>
        <!-- Filter by Date  -->
        <div>
            <label for="filter-date-start" class="block text-sm font-medium text-gray-700">Filter by Date Range</label>
    <div class="flex space-x-2">
        <input type="date" id="filter-date-start" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="Start Date">
        <input type="date" id="filter-date-end" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="End Date">
        </div>
        <!-- Filter by Order Frequency -->
        <div>
            <label for="filter-frequency" class="block text-sm font-medium text-gray-700">Filter by Order Frequency</label>
            <select id="filter-frequency" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                <option value="all">All</option>
                <option value="high">High</option>
                <option value="medium">Medium</option>
                <option value="low">Low</option>
            </select>
        </div>
    </div>
    </section>
    <!-- Apply Filters Button -->
    <div class="flex items-end">
        <button id="apply-filters" class="bg-gray-800 text-white px-4 py-2 rounded-md hover:text-blue-800">
            Apply Filters
        </button>
    </div>
</section>


    <!--Customer information section-->
    <section class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Customer List</h2>
        <div class="overfloe-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="p-3 text-left text-sm font-semibold text-gray-700">Name</th>
                        <th class="p-3 text-left text-sm font-semibold text-gray-700">Email</th>
                        <th class="p-3 text-left text-sm font-semibold text-gray-700">Customer Type</th>
                        <th class="p-3 text-left text-sm font-semibold text-gray-700">Status</th>
                        <th class="p-3 text-left text-sm font-semibold text-gray-700">Action</th>
                    </tr>
                </thead>
                @foreach ($customers as $customer )
                <tbody>
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="p-3 text-sm text-gray-700">{{ $customer->first_name }}  {{ $customer->last_name }}</td>
                        <td class="p-3 text-sm text-gray-700">{{$customer->email}}</td>
                        <td class="p-3 text-sm text-gray-700">
                            {{ $customer->customer_type }}
                        </td>
                        <td class="p-3 text-sm text-gray-700">
                            {{ $customer->status }}
                        </td>
                    </tr>
                </tbody>
                    @endforeach
                </table>
                <div class="mt-2">
                    {{ $customers->links() }}
                </div>
        </div>
    </section>

    <!--Add a new customer button-->
    <div class="flex justify-end">
        <button class="bg-gray-600 text-white px-4 py-2 rounded-md hover:text-blue-700">Add Customer</button>
    </div>

 </main>
@endsection