@extends('layouts.app')

@section('content')
@if (session('success'))
        <x-flash-message />
    @endif
    <main class="flex-1 p-6 bg-white md:ml-10 transition-all duration-300 rounded-tl-xl shadow-inner">
        <section class="mb-8">
            <x-active-trashed-filter route="interactions.index"/>
            <form method="GET" action="{{ route('interactions.index') }}" class="mb-4 flex gap-2">
                <input 
                    type="text" 
                    name="search" 
                    id="search" 
                    class="rounded-md p-2 border border-gray-300 focus:ring-2 focus:ring-blue-500" 
                    placeholder="Search interactions..." 
                    value="{{ request('search') }}"
                >
                <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Search</button>
                <a href="{{ route('interactions.index') }}" class="bg-gray-500 text-white p-2 rounded-md">Reset</a>
            </form>
            
            <x-table :columns="$columns" :data="$interactions" link-name="Record Interaction" table-title="Interactions List"
                route-create="interactions.create"
                route-view="interactions.show"
                route-edit="interactions.edit"
                route-delete="interactions.destroy"
                route-restore="interactions.restore"
                route-force-delete="interactions.forceDelete"
                csv="interactions.download">
                Customer List
            </x-table>
        </section>

    </main>
@endsection