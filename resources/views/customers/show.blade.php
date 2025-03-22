@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="mb-6">
                    <a href="{{ route('customers.index') }}" class="text-blue-600 hover:text-blue-800">
                        &larr; Back to Customers
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Personal Information</h3>
                        <div class="mt-4 space-y-4">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Name</p>
                                <p class="mt-1">{{ $customer->first_name }} {{ $customer->last_name }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Email</p>
                                <p class="mt-1">{{ $customer->email }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Phone</p>
                                <p class="mt-1">{{ $customer->phone_number }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Status</p>
                                <p class="mt-1">
                                    <span class="px-2 py-1 text-xs font-medium rounded-full
                                        {{ $customer->status == 'Active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $customer->status }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Business Information</h3>
                        <div class="mt-4 space-y-4">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Company</p>
                                <p class="mt-1">{{ $customer->company_name ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Customer Type</p>
                                <p class="mt-1">{{ $customer->customer_type }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Industry</p>
                                <p class="mt-1">{{ $customer->industry ?? 'N/A' }}</p>
                            </div>
                            @if($customer->tags)
                            <div>
                                <p class="text-sm font-medium text-gray-500">Tags</p>
                                <div class="mt-1 flex flex-wrap gap-2">
                                    @foreach(explode(',', $customer->tags) as $tag)
                                        <span class="px-2 py-1 text-xs font-medium bg-gray-100 rounded-full">
                                            {{ trim($tag) }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex space-x-4">
                    <a href="{{ route('customers.edit', $customer) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
                        Edit Customer
                    </a>
                    <form action="{{ route('customers.destroy', $customer) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700" onclick="return confirm('Are you sure you want to delete this customer?')">
                            Delete Customer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection