@extends('layouts.app')

@section('content')
@if (session('success'))
<x-flash-message />
@endif
<main class="flex-1 p-6 bg-white md:ml-10 transition-all duration-300 rounded-tl-xl shadow-inner">
<section class="mb-8">
    @if (in_array(Auth::user()->role->id, [\App\Models\Role::IS_ADMIN, \App\Models\Role::IS_MANAGER]))
    <x-active-trashed-filter route="projects.index"/>
    @endif
    <form method="GET" action="{{ route('projects.index') }}" class="mb-4 flex flex-wrap gap-2">
        <!-- Search Input -->
        <input 
            type="text" 
            name="search" 
            id="search" 
            class="rounded-md p-2 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" 
            placeholder="Search projects..." 
            value="{{ request('search') }}"
        >
    
        <!-- Status Filter -->
        <select name="status" class="rounded-md p-2 border border-gray-300 focus:ring-2 focus:ring-blue-500 w-32">
            <option value="">All Statuses</option>
            @foreach (\App\Enum\ProjectStatus::cases() as $status )
            <option value="{{ $status->value }}" {{ old('status') == $status->value ? 'selected' : '' }}>{{ ucfirst($status->value) }}</option>
        @endforeach
        </select>
    
        <!-- Priority Filter -->
        <select name="priority" class="rounded-md p-2 border border-gray-300 focus:ring-2 focus:ring-blue-500 w-32">
            <option value="">All Priorities</option>
            @foreach (\App\Enum\ProjectPriority::cases() as $priority )
                <option value="{{ $priority->value }}" {{ old('priority') == $priority->value ? 'selected' : '' }}>{{ ucfirst($priority->value) }}</option>
            @endforeach
        </select>
    
        <!-- Submit Button -->
        <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Filter</button>
    
        <!-- Reset Button -->
        <a href="{{ route('projects.index') }}" class="bg-gray-500 text-white p-2 rounded-md">Reset</a>
    </form>
    <div class="flex justify-end mb-4">
        <a href="{{ route('projects.download') }}" class="btn btn-success">Export to CSV</a>
    </div>
    <x-table :columns="$columns" :data="$projects" link-name="Create Project" table-title="Project List"
        route-create="projects.create"
        route-view="projects.show"
        route-edit="projects.edit"
        route-delete="projects.destroy"
        route-restore="projects.restore"
        route-force-delete="projects.forceDelete"
        csv="projects.download">
        Project List
    </x-table>
</section>

</main>
@endsection