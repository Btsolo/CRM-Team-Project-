@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('customers.store') }}">
    @csrf
    <!-- Name -->
    <div>
        <x-input-label for="first_name" :value="__('FirstName')" />
        <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="last_name" :value="__('LastName')" />
        <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="mt-4">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <x-input-label for="phone_number" :value="__('Phone Number')" />

        <x-text-input id="phone_number" class="block mt-1 w-full"
                        type="text"
                        name="phone_number"
                        required autocomplete="new-phone_number" />

        <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
        <x-input-label for="company_name" :value="__('Company Name')" />

        <x-text-input id="company_name" class="block mt-1 w-full"
                        type="text"
                        name="company_name" required autocomplete="new-password" />

        <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
    </div>

    <div class="flex justify-between space-x-2">

        <div class="mt-4">
            <x-input-label for="customer_type" :value="__('Customer Type')" />
    
            <select name="customer_type" id="customer_type" class = "mt-1 w-full block rounded-md shadow-sm border-gray-300">
                <option value="">...</option>
                @foreach (\App\Enum\CustomerType::cases() as $customer_type )
                    <option value="{{ $customer_type->value }}" {{old('customer_type') == $customer_type->value ? 'selected' : ''}} >{{ ucfirst($customer_type->value) }}</option>
                @endforeach
            </select>
    
            <x-input-error :messages="$errors->get('customer_type')" class="mt-2" />
        </div>
    
        <div class="mt-4">
            <x-input-label for="industry" :value="__('Industry')" />
    
            <select name="industry" id="industry" class = "mt-1 w-full block rounded-md shadow-sm border-gray-300">
                <option value="">...</option>
                @foreach (\App\Enum\CustomerIndustry::cases() as $industry )
                    <option value="{{ $industry->value }}" {{old('industry') == $industry->value ? 'selected' : ''}} >{{ ucfirst($industry->value) }}</option>
                @endforeach
            </select>
    
            <x-input-error :messages="$errors->get('industry')" class="mt-2" />
        </div>
    
        <div class="mt-4">
            <x-input-label for="tags" :value="__('Tags')" />
    
            <select name="tags" id="tags" class = "mt-1 w-full block rounded-md shadow-sm border-gray-300">
                <option value="">...</option>
                @foreach (\App\Enum\CustomerTag::cases() as $tags )
                    <option value="{{ $tags->value }}" {{old('tags') == $tags->value ? 'selected' : ''}} >{{ ucfirst($tags->value) }}</option>
                @endforeach
            </select>
    
            <x-input-error :messages="$errors->get('tags')" class="mt-2" />
        </div>
    
        <div class="mt-4">
            <x-input-label for="status" :value="__('Status')" />
    
            <select name="status" id="status" class = "mt-1 w-full block rounded-md shadow-sm border-gray-300">
                <option value="">...</option>
                @foreach (\App\Enum\CustomerStatus::cases() as $status )
                    <option value="{{ $status->value }}" {{old('status') == $status->value ? 'selected' : ''}} >{{ ucfirst($status->value) }}</option>
                @endforeach
            </select>
    
            <x-input-error :messages="$errors->get('status')" class="mt-2" />
        </div>
    </div>

        <x-primary-button class="mt-2">
            {{ __('Create') }}
        </x-primary-button>

</form>
@endsection