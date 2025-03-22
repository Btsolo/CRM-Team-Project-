@props(['route'])
<div class="flex justify-between mb-4">
    <a href="{{ route($route) }}" class="bg-gray-600 text-white px-4 py-2 rounded-md">
        Active
    </a>
    <a href="{{ route($route, ['trashed' => true]) }}" class="bg-red-600 text-white px-4 py-2 rounded-md">
        Trashed
    </a>
</div>