@extends('layouts.app')

@section('content')
<div class="mb-6">
    <a href="{{ route('tasks.index') }}" class="text-blue-600 hover:text-blue-800">
        &larr; Back to Tasks
    </a>
</div>
<form method="POST" action="{{ route('tasks.store') }}">
    @csrf
    <!-- Name -->
    <div>
        <x-input-label for="title" :value="__('Title')" />
        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="description" :value="__('Description')" />
        <textarea name="description" id="description"  class="w-full block rounded-md shadow-sm border-gray-300">{{old('description')}}</textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>


    <div class="mt-4">
        <x-input-label for="status" :value="__('Status')" />

        <select name="status" id="status" class = "mt-1 w-full block rounded-md shadow-sm border-gray-300">
            <option value="">...</option>
            @foreach (\App\Enum\TaskStatus::cases() as $status )
                <option value="{{ $status->value }}" {{old('status') == $status->value ? 'selected' : ''}} >{{ ucfirst($status->value) }}</option>
            @endforeach
        </select>

        <x-input-error :messages="$errors->get('status')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="priority" :value="__('Priority')" />

        <select name="priority" id="priority" class = "mt-1 w-full block rounded-md shadow-sm border-gray-300">
            <option value="">...</option>
            @foreach (\App\Enum\TaskPriority::cases() as $priority )
                <option value="{{ $priority->value }}" {{old('priority') == $priority->value ? 'selected' : ''}} >{{ ucfirst($priority->value) }}</option>
            @endforeach
        </select>

        <x-input-error :messages="$errors->get('status')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="due_date" :value="__('Due Date')" />

        <input id="due_date" class="mt-1 w-full block font-medium text-sm text-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                        type="datetime-local"
                        name="due_date"
                        value="{{old('due_date')}}"
                        required autocomplete="due_date"
                         />

        <x-input-error :messages="$errors->get('due_date')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="completed_at" :value="__('Completed At')" />

        <input id="completed_at" class="mt-1 w-full block font-medium text-sm text-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                        type="datetime-local"
                        name="completed_at"
                        value="{{old('completed_at')}}"
                         />

        <x-input-error :messages="$errors->get('completed_at')" class="mt-2" />
    </div>


    <div class="flex justify-evenly">

        <div class="mt-4">
            <x-input-label for="customer_id" :value="__('Customer Name')" />
    
            <select name="customer_id" id="customer_id" class = "mt-1 w-full block rounded-md shadow-sm border-gray-300">
                <option value="">...</option>
                @foreach ($customers as $customer )
                    <option value="{{ $customer->id }}" {{old('customer_id') == $customer->id ? 'selected' : ''}} >{{ ucfirst($customer->first_name. ' '. $customer->last_name) }}</option>
                @endforeach
            </select>
    
            <x-input-error :messages="$errors->get('customer_id')" class="mt-2" />
        </div>
    
        <div class="mt-4">
            <x-input-label for="user_id" :value="__('Select Employee')" />
    
            <select name="user_id" id="user_id" class = "mt-1 w-full block rounded-md shadow-sm border-gray-300">
                <option value="">...</option>
                @foreach ($users as $user )
                    <option value="{{ $user->id }}" {{old('user_id') == $user->id ? 'selected' : ''}} >{{ $user->first_name. ' ' .$user->last_name }}</option>
                @endforeach
            </select>
    
            <x-input-error :messages="$errors->get('user')" class="mt-2" />
        </div>
    </div>
        
    <x-primary-button class="mt-2">
        {{ __('Save') }}
    </x-primary-button>
        </form>

@endsection