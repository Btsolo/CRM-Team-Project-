@extends('layouts.app')

@section('content')
<div class="p-6 bg-white border-b border-gray-200">
    <div class="mb-6">
        <a href="{{ route('projects.index') }}" class="text-blue-600 hover:text-blue-800">
            &larr; Back to Projects
        </a>
    </div>
<form action="{{ route('projects.update', $project) }}" method="POST">
    @method('PUT')
    @csrf

    <div>
        <x-input-label for="name" :value="__('ProjectName')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $project->name)" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div class="mt-2">
        <x-input-label for="description" :value="__('ProjectDescription')" />
        <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description', $project->description)" required autofocus autocomplete="description" />
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>

    <div class="mt-2">
        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="status">ProjectStatus</label>
        <select name="status" id="status" class="mt-1 w-full block rounded-md shadow-sm border-gray-300">
            <option value="">...</option>
            @foreach (\App\Enum\ProjectStatus::cases() as $status )
                <option value="{{ $status->value }}" {{ old('status', $project->status) == $status->value ? 'selected' : '' }}>{{ ucfirst($status->value) }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('status')" />
    </div>

    <div class="mt-2">
        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="priority">ProjectPriority</label>
        <select name="priority" id="priority" class="mt-1 w-full block rounded-md shadow-sm border-gray-300">
            <option value="">...</option>
            @foreach (\App\Enum\ProjectPriority::cases() as $priority )
                <option value="{{ $priority->value }}" {{ old('priority', $project->priority) == $priority->value ? 'selected' : '' }}>{{ ucfirst($priority->value) }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('priority')" />
    </div>

    <div class="mt-2">
        <x-input-label for="start_date" :value="__('StartDate')" />
        <x-text-input id="start_date" class="block mt-1 w-full" type="datetime-local" name="start_date" :value="old('start_date', $project->start_date)" required autocomplete="start_date" />
        <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
    </div>

    <div class="mt-2">
        <x-input-label for="end_date" :value="__('EndDate')" />
        <x-text-input name="end_date" id="end_date" class="mt-1 w-full block" type="datetime-local" :value="old('end_date', $project->end_date)" autocomplete="end_date" />
        <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
    </div>

    <div class="mt-2">
        <x-input-label for="budget" :value="__('Budget')" />
        <x-text-input name="budget" class="mt-1 w-full block" type="text" :value="old('budget', $project->budget)" required autocomplete="budget" placeholder="Currency is in dollar and should be number only" />
        <x-input-error :messages="$errors->get('budget')" class="mt-2" />
    </div>

    <div class="mt-2">
        <x-input-label for="actual_cost" :value="__('ActualCost')" />
        <x-text-input name="actual_cost" id="actual_cost" type="text" :value="old('actual_cost', $project->actual_cost)" class="mt-1 w-full block" placeholder="Currency is in dollar and should be number only" />
        <x-input-error :messages="$errors->get('actual_cost')" class="mt-2" />
    </div>

    <div class="mt-2">
        <x-input-label for='customer_id' :value="__('SelectClient')" />
        <select name="customer_id" id="customer_id" class="mt-1 w-full block rounded-md shadow-sm border-gray-300">
            <option value="">...</option>
            @foreach ($customers as $customer )
                <option value="{{ $customer->id }}" {{ old('customer_id', $project->customer_id) == $customer->id ? 'selected' : '' }}>{{ $customer->first_name. ' '. $customer->last_name }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('customer_id')" class="mt-1" />
    </div>
    
    <div class="mt-2">
        <x-input-label for="notes" :value="__('Notes')" />
        <textarea name="notes" id="notes" class="block mt-1 w-full rounded shadow-sm focus:ring-indigo-500"> {{ old('notes', $project->notes) }} </textarea>
        <x-input-error :messages="$errors->get('notes')" class="mt-2" />
    </div>


    <div class="mt-2">
        <x-primary-button class="ms-4">
            {{__('Edit')}}
        </x-primary-button>
    </div>
</form>
@endsection