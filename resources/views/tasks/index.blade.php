@extends('layouts.app')

@section('content')
<@if (session('success'))
<x-flash-message />
@endif
<main class="flex-1 p-6 bg-white md:ml-10 transition-all duration-300 rounded-tl-xl shadow-inner">
<section class="mb-8">
    @if (in_array(Auth::user()->role->id, [\App\Models\Role::IS_ADMIN, \App\Models\Role::IS_MANAGER]))
    <x-active-trashed-filter route="tasks.index"/>
    
    @endif
    <form method="GET" action="{{ route('tasks.index') }}" class="mb-4 flex flex-wrap gap-2">
        <!-- Search Input -->
        <input 
            type="text" 
            name="search" 
            id="search" 
            class="rounded-md p-2 border border-gray-300 focus:ring-2 focus:ring-blue-500" 
            placeholder="Search tasks..." 
            value="{{ request('search') }}"
        >
    
        <!-- Status Filter -->
        <select name="status" class="rounded-md p-2 border border-gray-300 focus:ring-2 focus:ring-blue-500 w-32">
            <option value="">All Statuses</option>
            @foreach (\App\Enum\TaskStatus::cases() as $status )
            <option value="{{ $status->value }}" {{old('status') == $status->value ? 'selected' : ''}} >{{ ucfirst($status->value) }}</option>
        @endforeach
        </select>
    
        <!-- Priority Filter -->
        <select name="priority" class="rounded-md p-2 border border-gray-300 focus:ring-2 focus:ring-blue-500 w-32">
            <option value="">All priorities</option>
            @foreach (\App\Enum\TaskPriority::cases() as $priority )
            <option value="{{ $priority->value }}" {{old('priority') == $priority->value ? 'selected' : ''}} >{{ ucfirst($priority->value) }}</option>
        @endforeach
        </select>
    
        <!-- Submit Button -->
        <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Filter</button>
    
        <!-- Reset Button -->
        <a href="{{ route('tasks.index') }}" class="bg-gray-500 text-white p-2 rounded-md">Reset</a>
    </form>
    
    <x-table :columns="$columns" :data="$tasks" link-name="Create Task" table-title="Task List"
        route-create="tasks.create"
        route-view="tasks.show"
        route-edit="tasks.edit"
        route-delete="tasks.destroy"
        route-restore="tasks.restore"
        route-force-delete="tasks.forceDelete"
        csv="tasks.download">
        Task List
    </x-table>
</section>

</main>
@endsection