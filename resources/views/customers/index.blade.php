@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    @if (session('success'))
        <x-flash-message />
    @endif
    <main class="flex-1 p-6 bg-white md:ml-10 transition-all duration-300 rounded-tl-xl shadow-inner">
        <section class="mb-8">

            <x-table :columns="$columns" :data="$customers" link-name="Create Customer" table-title="Customer List"
                route-create="customers.create"
                route-view="customers.show"
                route-edit="customers.edit"
                route-delete="customers.destroy">
                Customer List
            </x-table>
        </section>

    </main>
@endsection
