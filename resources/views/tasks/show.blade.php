@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="mb-6 flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-gray-800">Task Details</h2>
                    <div>
                        <a href="{{ route('tasks.index') }}" class="text-blue-600 hover:text-blue-800">
                            &larr; Back to Tasks
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Task Basic Info -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Task Information</h3>
                        
                        <div class="mb-4">
                            <p class="text-sm font-medium text-gray-500">Title</p>
                            <p class="mt-1 text-gray-900">{{ $task->title }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <p class="text-sm font-medium text-gray-500">Description</p>
                            <p class="mt-1 text-gray-900">{{ $task->description }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <p class="text-sm font-medium text-gray-500">Status</p>
                            <p class="mt-1 text-gray-900">{{ $task->status }}</p>
                        </div>
                    </div>

                    <!-- Related Entities -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Task Details</h3>
                        
                        <div class="mb-4">
                            <p class="text-sm font-medium text-gray-500">Priority</p>
                            <p class="mt-1 text-gray-900">{{ $task->priority }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <p class="text-sm font-medium text-gray-500">Due Date</p>
                            <p class="mt-1 text-gray-900">{{ $task->due_date }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <p class="text-sm font-medium text-gray-500">Completed At</p>
                            <p class="mt-1 text-gray-900">{{ $task->completed_at ? $task->completed_at : 'Not completed' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Assigned User and Customer -->
                <div class="mt-6 bg-gray-50 p-4 rounded-lg">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Assigned To</h3>
                    <p class="text-gray-900">
                        {{ $task->user->first_name }} {{ $task->user->last_name }}
                    </p>
                </div>
                
                <div class="mt-6 bg-gray-50 p-4 rounded-lg">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Customer</h3>
                    <p class="text-gray-900">
                        @if($task->customer)
                            <a href="{{ route('customers.show', $task->customer) }}" class="text-blue-600 hover:underline">
                                {{ $task->customer->first_name }} {{ $task->customer->last_name }}
                            </a>
                        @else
                            <span class="text-gray-500 italic">No customer assigned</span>
                        @endif
                    </p>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 flex space-x-4">
                    <a href="{{ route('tasks.edit', $task) }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Edit
                    </a>
                    
                    <form method="POST" action="{{ route('tasks.destroy', $task) }}" onsubmit="return confirm('Are you sure you want to delete this task?');" class="inline">
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