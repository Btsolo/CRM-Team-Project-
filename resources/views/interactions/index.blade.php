@extends('layouts.app')

@section('content')
<!-- Main Content -->
<main class="flex-1 p-6 bg-white md:ml-10 transition-all duration-300 rounded-tl-xl shadow-inner">

    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-600">Customer Interactions</h1>
            <button class="bg-gray-600 text-white px-4 py-2 rounded-md hover:text-blue-800">
                + New Interaction
            </button>
        </div>

        <div class="mb-4">
            <input type="text" placeholder="Search interactions..." 
                   class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Customer</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Date</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Type</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Notes</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4">John Doe</td>
                        <td class="px-6 py-4">2023-10-01</td>
                        <td class="px-6 py-4"><span class="bg-green-100 text-green-800 px-2 py-1 rounded">Call</span></td>
                        <td class="px-6 py-4">Discussed new project requirements</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">Jane Smith</td>
                        <td class="px-6 py-4">2023-10-02</td>
                        <td class="px-6 py-4"><span class="bg-blue-100 text-blue-800 px-2 py-1 rounded">Email</span></td>
                        <td class="px-6 py-4">Sent proposal documents</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
 </main>
@endsection