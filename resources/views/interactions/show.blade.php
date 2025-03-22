@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="mb-6 flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-gray-800">Interaction Details</h2>
                    <div>
                        <a href="{{ route('interactions.index') }}" class="text-blue-600 hover:text-blue-800">
                            &larr; Back to Interactions
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Interaction Basic Info -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Interaction Information</h3>
                        
                        <div class="mb-4">
                            <p class="text-sm font-medium text-gray-500">Type</p>
                            <p class="mt-1 text-gray-900">{{ $interaction->type }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <p class="text-sm font-medium text-gray-500">Subject</p>
                            <p class="mt-1 text-gray-900">{{ $interaction->subject }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <p class="text-sm font-medium text-gray-500">Date & Time</p>
                            <p class="mt-1 text-gray-900">{{ $interaction->interaction_date }}</p>
                        </div>
                    </div>

                    <!-- Related Entities -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Related Information</h3>
                        
                        <div class="mb-4">
                            <p class="text-sm font-medium text-gray-500">Customer</p>
                            <p class="mt-1 text-gray-900">
                                <a href="{{ route('customers.show', $interaction->customer) }}" class="text-blue-600 hover:underline">
                                    {{ $interaction->customer->first_name }} {{ $interaction->customer->last_name }}
                                </a>
                            </p>
                        </div>
                        
                        <div class="mb-4">
                            <p class="text-sm font-medium text-gray-500">Employee</p>
                            <p class="mt-1 text-gray-900">
                                {{ $interaction->user->first_name }} {{ $interaction->user->last_name }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Interaction Details -->
                <div class="mt-6 bg-gray-50 p-4 rounded-lg">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Details</h3>
                    <div class="prose max-w-none">
                        {!! nl2br(e($interaction->details)) ?: '<p class="text-gray-500 italic">No details provided</p>' !!}
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 flex space-x-4">
                    <a href="{{ route('interactions.edit', $interaction) }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                        Edit
                    </a>
                    
                    <form method="POST" action="{{ route('interactions.destroy', $interaction) }}" onsubmit="return confirm('Are you sure you want to delete this interaction?');" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection