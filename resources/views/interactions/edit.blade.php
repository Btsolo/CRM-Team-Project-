@extends('layouts.app')

@section('content')
<div class="mb-6">
    <a href="{{ route('interactions.index') }}" class="text-blue-600 hover:text-blue-800">
        &larr; Back to Interactions
    </a>
</div>
<form method="POST" action="{{ route('interactions.update', $interaction->id) }}">
    @csrf
    @method('PUT')

    <!-- Interaction Type -->
    <div>
        <x-input-label for="type" :value="__('Interaction Type')" />
        <select name="type" id="type" class="mt-1 w-full block rounded-md shadow-sm border-gray-300">
            <option value="">...</option>
            @foreach (\App\Enum\InteractionType::cases() as $type)
                <option value="{{ $type->value }}" {{ old('type', $interaction->type) == $type->value ? 'selected' : '' }}>
                    {{ ucfirst($type->value) }}
                </option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('type')" class="mt-2" />
    </div>

    <!-- Subject -->
    <div class="mt-4">
        <x-input-label for="subject" :value="__('Subject')" />
        <x-text-input id="subject" class="block mt-1 w-full" 
                      type="text" name="subject" 
                      :value="old('subject', $interaction->subject)" required autofocus autocomplete="subject" />
        <x-input-error :messages="$errors->get('subject')" class="mt-2" />
    </div>

    <!-- Details -->
    <div class="mt-4">
        <x-input-label for="details" :value="__('Details')" />
        <textarea name="details" id="details" class="w-full block rounded-md shadow-sm border-gray-300">
            {{ old('details', $interaction->details) }}
        </textarea>
        <x-input-error :messages="$errors->get('details')" class="mt-2" />
    </div>

    <!-- Interaction Date -->
    <div class="mt-4">
        <x-input-label for="interaction_date" :value="__('Interaction Date')" />
        <x-text-input id="interaction_date" class="block mt-1 w-full"
                      type="datetime-local"
                      name="interaction_date"
                      :value="old('interaction_date', \Carbon\Carbon::parse($interaction->interaction_date)->format('Y-m-d\TH:i'))"
                      required autocomplete="interaction_date" />
        <x-input-error :messages="$errors->get('interaction_date')" class="mt-2" />
    </div>

    <div class="flex justify-evenly">
        <!-- Customer Selection -->
        <div class="mt-4">
            <x-input-label for="customer_id" :value="__('Customer Name')" />
            <select name="customer_id" id="customer_id" class="mt-1 w-full block rounded-md shadow-sm border-gray-300">
                <option value="">...</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}" {{ old('customer_id', $interaction->customer_id) == $customer->id ? 'selected' : '' }}>
                        {{ ucfirst($customer->first_name . ' ' . $customer->last_name) }}
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('customer_id')" class="mt-2" />
        </div>

        <!-- Employee Selection -->
        <div class="mt-4">
            <x-input-label for="user_id" :value="__('Select Employee')" />
            <select name="user_id" id="user_id" class="mt-1 w-full block rounded-md shadow-sm border-gray-300">
                <option value="">...</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id', $interaction->user_id) == $user->id ? 'selected' : '' }}>
                        {{ ucfirst($user->first_name . ' ' . $user->last_name) }}
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
        </div>
    </div>

    <!-- Submit Button -->
    <x-primary-button class="mt-2">
        {{ __('Edit') }}
    </x-primary-button>
</form>
@endsection
