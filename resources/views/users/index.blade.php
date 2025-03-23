@extends('layouts.app')

@section('content')

<x-active-trashed-filter route="users.index"/>
<form method="GET" action="{{ route('users.index') }}" class="mb-4 flex flex-wrap gap-2">
    <!-- Search Input -->
    <input 
        type="text" 
        name="search" 
        id="search" 
        class="rounded-md p-2 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" 
        placeholder="Search users..." 
        value="{{ request('search') }}"
    >
    <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Filter</button>
                
                    <!-- Reset Button -->
                    <a href="{{ route('users.index') }}" class="bg-gray-500 text-white p-2 rounded-md">Reset</a>
                </form>
<x-table :columns="$columns" :data="$users" link-name="Create User" table-title="User List"
        route-create="users.create"
        route-view="users.show"
        route-edit="users.edit"
        route-delete="users.destroy"
        route-restore="users.restore"
                route-force-delete="users.forceDelete"
                csv="users.download">
        User List
    </x-table>
@endsection