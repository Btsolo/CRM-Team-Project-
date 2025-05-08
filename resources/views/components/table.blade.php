@props([
    'columns',
    'data',
    'linkName' => 'Add',
    'tableTitle' => '',
    'routeName',
    'routeCreate',
    'routeView',
    'routeDelete',
    'csv'
])
   @if (in_array(Auth::user()->role->id, [\App\Models\Role::IS_ADMIN, \App\Models\Role::IS_MANAGER]))
    <div class="flex justify-end">
        <a href="{{ route($routeCreate) }}"
            class="bg-gray-600 text-white px-4 py-2 rounded-md hover:text-blue-700">{{ $linkName }}</a>
    </div>
    
    @endif
<h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $tableTitle }}</h2>
<div class="overflow-x-auto">
   {{-- @if (in_array(Auth::user()->role->id, [\App\Models\Role::IS_ADMIN, \App\Models\Role::IS_MANAGER]))
    <div class="flex justify-end mb-2">
        <a href="{{ route($csv) }}" class="btn btn-success">Export to Excel</a>
    </div>
    
    @endif --}}
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                @foreach ($columns as $column)
                    <th class="p-3 text-left text-sm font-semibold text-gray-700">{{ ucfirst($column) }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $row )
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    @foreach ($columns as $column)
                        <td class="p-3 text-sm text-gray-700">{{ $row->$column }}</td>
                    @endforeach
                   @if (in_array(Auth::user()->role->id, [\App\Models\Role::IS_ADMIN, \App\Models\Role::IS_MANAGER]))
    
                    <td class="p-3 text-sm text-gray-700">
                        <div class="flex justify-evenly space-x-1">
                            <a href="{{ route($routeView, $row->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="orange" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 4.5v15m6-15v15m-10.875 0h15.75c.621 0 1.125-.504 1.125-1.125V5.625c0-.621-.504-1.125-1.125-1.125H4.125C3.504 4.5 3 5.004 3 5.625v12.75c0 .621.504 1.125 1.125 1.125Z" />
                                </svg>
                            </a>
                            @if(!$row->trashed())
                                <a href="{{ route($routeEdit, $row->id) }}" class="text-blue-500">Edit</a>
                                <form action="{{ route($routeDelete, $row->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500">Trash</button>
                                </form>
                            @else
                            <form action="{{ route($routeRestore, $row->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6"> <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" /> </svg>
                                </button>
                            </form>
                                <form action="{{ route($routeForceDelete, $row->id) }}" method="POST" onsubmit="return confirm('Permanently delete this task?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="red" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg></button>
                                </form>
                            @endif
                            
                        </div>

                    </td>
                    @endif
                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($columns) }}" class="p-3 text-sm text-gray-700">No data available</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-2">
        {{ $data->links() }}
    </div>
</div>
