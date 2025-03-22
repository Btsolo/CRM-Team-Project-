@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="mb-6 flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-gray-800">Project Details</h2>
                    <div>
                        <a href="{{ route('projects.index') }}" class="text-blue-600 hover:text-blue-800">
                            &larr; Back to Projects
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Project Basic Info -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Project Information</h3>
                        
                        <div class="mb-4">
                            <p class="text-sm font-medium text-gray-500">Name</p>
                            <p class="mt-1 text-gray-900">{{ $project->name }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <p class="text-sm font-medium text-gray-500">Description</p>
                            <p class="mt-1 text-gray-900">{{ $project->description }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <p class="text-sm font-medium text-gray-500">Status</p>
                            <p class="mt-1 text-gray-900">{{ $project->status }}</p>
                        </div>
                    </div>

                    <!-- Related Entities -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Project Details</h3>
                        
                        <div class="mb-4">
                            <p class="text-sm font-medium text-gray-500">Priority</p>
                            <p class="mt-1 text-gray-900">{{ $project->priority }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <p class="text-sm font-medium text-gray-500">Start Date</p>
                            <p class="mt-1 text-gray-900">{{ $project->start_date }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <p class="text-sm font-medium text-gray-500">End Date</p>
                            <p class="mt-1 text-gray-900">{{ $project->end_date ? $project->end_date : 'N/A' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Financial Details -->
                <div class="mt-6 bg-gray-50 p-4 rounded-lg">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Financial Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Budget</p>
                            <p class="mt-1 text-gray-900">{{ $project->budget }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Actual Cost</p>
                            <p class="mt-1 text-gray-900">{{ $project->actual_cost ?: 'N/A' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Notes -->
                <div class="mt-6 bg-gray-50 p-4 rounded-lg">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Notes</h3>
                    <div class="prose max-w-none">
                        {!! nl2br(e($project->notes)) ?: '<p class="text-gray-500 italic">No notes provided</p>' !!}
                    </div>
                </div>

                <!-- Customer Information -->
                <div class="mt-6 bg-gray-50 p-4 rounded-lg">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Customer Information</h3>
                    <p class="text-gray-900">
                        <a href="{{ route('customers.show', $project->customer) }}" class="text-blue-600 hover:underline">
                            {{ $project->customer->first_name }} {{ $project->customer->last_name }}
                        </a>
                    </p>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 flex space-x-4">
                    <a href="{{ route('projects.edit', $project) }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Edit
                    </a>
                    
                    <form method="POST" action="{{ route('projects.destroy', $project) }}" onsubmit="return confirm('Are you sure you want to delete this project?');" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection