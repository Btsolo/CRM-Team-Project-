@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    @if (session('success'))
        <x-flash-message />
    @endif
    <main class="flex-1 p-6 bg-white md:ml-10 transition-all duration-300 rounded-tl-xl shadow-inner">
        <section class="mb-8">
            <x-active-trashed-filter route="customers.index"/>
                <form method="GET" action="{{ route('customers.index') }}" class="mb-4 flex flex-wrap gap-2">
                    <!-- Search Input -->
                    <input 
                        type="text" 
                        name="search" 
                        id="search" 
                        class="rounded-md p-2 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        placeholder="Search customers..." 
                        value="{{ request('search') }}"
                    >
                
                    <!-- Customer Type Filter -->
                    <select name="customer_type" class="rounded-md p-2 border border-gray-300 focus:ring-2 focus:ring-blue-500 w-32">
                        <option value="">All Types</option>
                        @foreach (\App\Enum\CustomerType::cases() as $customer_type )
                        <option value="{{ $customer_type->value }}" {{old('customer_type') == $customer_type->value ? 'selected' : ''}} >{{ ucfirst($customer_type->value) }}</option>
                    @endforeach
                    </select>
                
                    <!-- Status Filter -->
                    <select name="status" class="rounded-md p-2 border border-gray-300 focus:ring-2 focus:ring-blue-500 w-32">
                        <option value="">All Statuses</option>
                        @foreach (\App\Enum\CustomerStatus::cases() as $status )
                        <option value="{{ $status->value }}" {{old('status') == $status->value ? 'selected' : ''}} >{{ ucfirst($status->value) }}</option>
                    @endforeach
                    </select>
                
                    <!-- Submit Button -->
                    <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Filter</button>
                
                    <!-- Reset Button -->
                    <a href="{{ route('customers.index') }}" class="bg-gray-500 text-white p-2 rounded-md">Reset</a>
                </form>
            <x-table :columns="$columns" :data="$customers" link-name="Create Customer" table-title="Customer List"
                route-create="customers.create"
                route-view="customers.show"
                route-edit="customers.edit"
                route-delete="customers.destroy"
                route-restore="customers.restore"
                route-force-delete="customers.forceDelete"
                csv="customers.download">
                Customer List

                
            </x-table>
        </section>

    </main>
@endsection
