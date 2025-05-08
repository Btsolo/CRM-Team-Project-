<!-- filepath: c:\Users\User\Documents\TEAM PROJECT\Project\resources\views\users\edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="mb-6">
        <a href="{{ route('users.index') }}" class="text-blue-600 hover:text-blue-800">
            &larr; Back to Users
        </a>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="overflow-hidden overflow-x-auto p-6 bg-white border-b border-gray-200">
                <form method="POST" action="{{ route('users.update', $user) }}">
                    @method('PUT')
                    @csrf

                    <div class="mt-4">
                        <x-input-label for="role_id" :value="('User Role')" />
            
                        <select name="role_id" id="role_id" class="mt-1 w-full block rounded-md shadow-sm border-gray-300">
                            <option value="">Select Role</option>
                            <option value="2" {{ old('role_id', $user->role_id) == 2 ? 'selected' : '' }}>Manager</option>
                            <option value="3" {{ old('role_id', $user->role_id) == 3 ? 'selected' : '' }}>User</option>
                        </select>
            
                        <x-input-error :messages="$errors->get('role_id')" class="mt-2" />
                    </div>
                    
                    <div class="mt-4">                    
                        <x-primary-button class="ms-4">
                            {{ __('Save') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection