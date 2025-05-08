<x-guest-layout>
    <?xml version="1.0" encoding="UTF-8"?>
<svg viewBox="0 0 500 300" xmlns="http://www.w3.org/2000/svg">
  <!-- Background -->
  <rect width="500" height="300" fill="white"/>
  
  <!-- Main Logo Circle -->
  <circle cx="250" cy="150" r="100" fill="#3498db" opacity="0.9"/>
  
  <!-- People Silhouettes -->
  <g transform="translate(195, 100) scale(0.6)">
    <!-- Person 1 -->
    <circle cx="80" cy="50" r="25" fill="#ffffff"/>
    <path d="M40,120 C40,85 120,85 120,120" stroke="#ffffff" stroke-width="10" fill="none"/>
    
    <!-- Person 2 -->
    <circle cx="170" cy="50" r="25" fill="#ffffff"/>
    <path d="M130,120 C130,85 210,85 210,120" stroke="#ffffff" stroke-width="10" fill="none"/>
    
    <!-- Person 3 (smaller, in front connecting the two) -->
    <circle cx="125" cy="80" r="20" fill="#ffffff"/>
    <path d="M95,135 C95,110 155,110 155,135" stroke="#ffffff" stroke-width="10" fill="none"/>
  </g>
  
  <!-- Connection Lines -->
  <path d="M200,150 L300,150" stroke="#ffffff" stroke-width="4" stroke-dasharray="8,4"/>
  <path d="M250,100 L250,200" stroke="#ffffff" stroke-width="4" stroke-dasharray="8,4"/>
  <path d="M215,115 L285,185" stroke="#ffffff" stroke-width="4" stroke-dasharray="8,4"/>
  <path d="M215,185 L285,115" stroke="#ffffff" stroke-width="4" stroke-dasharray="8,4"/>
  
  <!-- Text -->
  <text x="250" y="245" font-family="Arial, sans-serif" font-size="40" font-weight="bold" text-anchor="middle" fill="#333333">CRM</text>
  <text x="250" y="270" font-family="Arial, sans-serif" font-size="14" text-anchor="middle" fill="#666666">Customer Relationship Management</text>
</svg>
    <form method="POST" action="{{ route('register') }}">
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
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
