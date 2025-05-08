<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
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
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-evenly mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('register') }}">
                {{ __('Not Registered?') }}
            </a>
            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
