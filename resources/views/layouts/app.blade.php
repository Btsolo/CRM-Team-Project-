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
    <body class="flex flex-col min-h-screen">
        <!-- Header -->
        <header class="bg-gray-800 text-white p-4">
            <div class="container mx-auto flex justify-between items-center">
                <div class="flex items-center">
                    <!-- Logo -->
                    <div class="text-2xl font-bold">
                        <a href="index.html"><img src="Images/crm logo.jpg" alt="logo" class="h-10 w-auto mr-2">CRM</a>
                    </div>
                </div>
                    <!-- page header -->
                    <div class=" flex-1  text-center px-4">
                        <h1 class="text-2xl font-bold">Dashboard</h1>
                </div>
                <!-- Right Section: User Profile and Hamburger -->
                <div class="flex items-center space-x-4">
                <!-- User Profile -->
                <div class="relative">
                    <a href="user-profile.html" class="flex items-center space-x-2 hover:text-gray-300">
                        <span>User</span>
                        <div class="w-8 h-8 rounded-full bg-blue-600 overflow-hidden">
                            <img src="Images/userProfile_icon.png" alt="userProfile_icon" class="h-full w-full rounded-full">
                        </div>
                    </a>
                </div>
                 <!-- Hamburger Menu Button (Visible on small screens) -->
                 <button id="sidebar-toggle" aria-label="Toggle menu" class="text-white focus:outline-none md:hidden">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                    </svg>
                </button>
                </div>
            </div>
        </header>
    
        <!-- Sidebar and Main Content Container -->
         <div class="flex flex-1 relative">
            <!-- Sidebar -->
            <aside id="sidebar" class="bg-gray-700 bg-opacity-90 text-white w-64 p-4 md:static fixed md:translate-x-0 -right-64 md:right-0 h-screen md:h-auto transform transition-transform duration-300 ease-in-out z-50 shadow-xl">
                <h2 class="text-xl font-bold mb-4 "><u>Quick Links</u></h2>
                <nav>
                    <ul class="space-y-2">
                        <li><a href="{{ route('dashboard') }}" class="block p-2 hover:bg-gray-700 rounded">Dashboard</a></li>
                        <li><a href="{{ route('customers.index') }}" class="block p-2 hover:bg-gray-700 rounded">Customers</a></li>
                        <li><a href="#" class="block p-2 hover:bg-gray-700 rounded">Analytics</a></li>
                        <li><a href="{{ route('tasks.index') }}" class="block p-2 hover:bg-gray-700 rounded">Task Tracking</a></li>
                        <li><a href="{{ route('interactions.index') }}" class="block p-2 hover:bg-gray-700 rounded">Interaction Tracking</a></li>
                        <li><a href="{{ route('contacts') }}" class="block p-2 hover:bg-gray-700 rounded">Contact</a></li>
                    </ul>
                </nav>
            </aside>
    
            <main class="flex-1 p-6 bg-white md:ml-10 transition-all duration-300 rounded-tl-xl shadow-inner">
                @yield('content')
            </main>
              <!-- JavaScript for Sidebar Toggle -->
        <script>
            const toggleButton = document.getElementById('sidebar-toggle');
            const sidebar = document.getElementById('sidebar');
    
            toggleButton.addEventListener('click', () => {
                sidebar.classList.toggle('-right-64');
                sidebar.classList.toggle('right-0');
            });
        </script>
         </div>
    </body>
</html>