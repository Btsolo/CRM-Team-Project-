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
                <button id="user-menu-btn" class="flex items-center space-x-2 focus:outline-none">
                    <span>User</span>
                    <img src="/Images/userProfile_icon.png" alt="User Icon" class="w-8 h-8 rounded-full">
                </button>
                <div id="user-menu" class="hidden absolute right-0 mt-2 bg-white text-gray-800 shadow-lg rounded-md w-48 py-2">
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Settings</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Logout</a>
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
                    <li><a href="{{ route('customers.index') }}" class="block p-2 hover:bg-gray-700 rounded">Customers</a></li>
                    <li><a href="{{ route('projects.index') }}" class="block p-2 hover:bg-gray-700 rounded">Projects</a></li>
                    <li><a href="{{ route('tasks.index') }}" class="block p-2 hover:bg-gray-700 rounded">Tasks</a></li>
                    <li><a href="{{ route('interactions.index') }}" class="block p-2 hover:bg-gray-700 rounded">Interactions</a></li>
                    <li><a href="#" class="block p-2 hover:bg-gray-700 rounded">Analytics</a></li>
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
