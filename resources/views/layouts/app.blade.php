<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    <!-- Header -->
    <header class="bg-gray-900 text-white py-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center px-6">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <img src="/Images/crm_logo.jpg" alt="logo" class="h-10 w-auto">
                <span class="text-xl font-bold">CRM Dashboard</span>
            </div>
            
            <!-- User Profile Dropdown -->
            <div class="relative">
                <button id="user-menu-btn" class="inline-flex items-center min-w-[150px] px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                    <div class="text-black dark:text-white truncate">{{ Auth::user()->first_name.' '.Auth::user()->last_name }}</div>
                    <div class="ms-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
                
                


                <div id="user-menu" class="hidden absolute right-0 mt-2 bg-white text-gray-800 shadow-lg rounded-md w-48 py-2">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
    
                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                    
                </div>
            </div>
        </div>
    </header>
    
    <!-- Sidebar & Main Content -->
    <div class="flex flex-1">
        <!-- Sidebar -->
        <aside id="sidebar" class="bg-gray-800 text-white w-64 min-h-screen p-5 transform md:translate-x-0 -translate-x-64 md:static fixed transition-transform duration-300">
            <h2 class="text-lg font-semibold mb-4">Quick Links</h2>
            <nav>
                <ul class="space-y-2">
                    <li><a href="{{ route('dashboard') }}" class="block p-2 hover:bg-gray-700 rounded">Dashboard</a></li>
                    @if (in_array(Auth::user()->role->id, [\App\Models\Role::IS_ADMIN, \App\Models\Role::IS_MANAGER]))
                    <li><a href="{{ route('customers.index') }}" class="block p-2 hover:bg-gray-700 rounded">Customers</a></li>
                    <li><a href="{{ route('interactions.index') }}" class="block p-2 hover:bg-gray-700 rounded">Interactions</a></li>
                    <li><a href="{{ route('users.index') }}" class="block p-2 hover:bg-gray-700 rounded">Users</a></li>
                    <li><a href="#" class="block p-2 hover:bg-gray-700 rounded">Analytics</a></li>
                    @endif
                    <li><a href="{{ route('projects.index') }}" class="block p-2 hover:bg-gray-700 rounded">Projects</a></li>
                    <li><a href="{{ route('tasks.index') }}" class="block p-2 hover:bg-gray-700 rounded">Tasks</a></li>
                    <li><a href="{{ route('contacts') }}" class="block p-2 hover:bg-gray-700 rounded">Contact</a></li>
                </ul>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <main class="flex-1 p-6 bg-white shadow-md md:ml-10">
            @yield('content')
        </main>
    </div>

    <!-- JavaScript for Sidebar & Dropdown -->
    <script>
        document.getElementById('user-menu-btn').addEventListener('click', () => {
            document.getElementById('user-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>
