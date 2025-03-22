@extends('layouts.app')

@section('content')
<x-active-trashed-filter/>
<x-table :columns="$columns" :data="$users" link-name="Create User" table-title="User List"
        route-create="users.create"
        route-view="users.show"
        route-edit="users.edit"
        route-delete="users.destroy">
        Task List
    </x-table>
@endsection