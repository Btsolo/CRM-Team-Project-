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
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div>
                <a href="/">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 400">
                        <!-- Background circle -->
                        <circle cx="200" cy="200" r="180" fill="#f8f9fa" stroke="#e9ecef" stroke-width="2"/>
                        
                        <!-- Central hub representing the CRM system -->
                        <circle cx="200" cy="200" r="70" fill="#4361ee" opacity="0.9"/>
                        <text x="200" y="205" font-family="Arial" font-size="24" font-weight="bold" fill="white" text-anchor="middle" dominant-baseline="middle">CRM</text>
                        
                        <!-- Five model nodes positioned in a pentagon around the center -->
                        <!-- Projects Node -->
                        <circle cx="200" cy="80" r="40" fill="#3a86ff" stroke="#fff" stroke-width="2"/>
                        <text x="200" y="85" font-family="Arial" font-size="14" font-weight="bold" fill="white" text-anchor="middle" dominant-baseline="middle">Projects</text>
                        
                        <!-- Tasks Node -->
                        <circle cx="305" cy="135" r="40" fill="#4cc9f0" stroke="#fff" stroke-width="2"/>
                        <text x="305" y="140" font-family="Arial" font-size="14" font-weight="bold" fill="white" text-anchor="middle" dominant-baseline="middle">Tasks</text>
                        
                        <!-- Interactions Node -->
                        <circle cx="275" cy="265" r="40" fill="#4895ef" stroke="#fff" stroke-width="2"/>
                        <text x="275" y="265" font-family="Arial" font-size="14" font-weight="bold" fill="white" text-anchor="middle" dominant-baseline="middle">Interactions</text>
                        
                        <!-- Clients Node -->
                        <circle cx="125" cy="265" r="40" fill="#560bad" stroke="#fff" stroke-width="2"/>
                        <text x="125" y="265" font-family="Arial" font-size="14" font-weight="bold" fill="white" text-anchor="middle" dominant-baseline="middle">Clients</text>
                        
                        <!-- Analytics Node -->
                        <circle cx="95" cy="135" r="40" fill="#7209b7" stroke="#fff" stroke-width="2"/>
                        <text x="95" y="140" font-family="Arial" font-size="14" font-weight="bold" fill="white" text-anchor="middle" dominant-baseline="middle">Analytics</text>
                        
                        <!-- Connection lines from center to each node -->
                        <line x1="200" y1="130" x2="200" y2="200" stroke="#ffffff" stroke-width="3"/>
                        <line x1="265" y1="135" x2="200" y2="200" stroke="#ffffff" stroke-width="3"/>
                        <line x1="235" y1="265" x2="200" y2="200" stroke="#ffffff" stroke-width="3"/>
                        <line x1="165" y1="265" x2="200" y2="200" stroke="#ffffff" stroke-width="3"/>
                        <line x1="135" y1="135" x2="200" y2="200" stroke="#ffffff" stroke-width="3"/>
                        
                        <!-- Subtle pentagon connecting all outer nodes -->
                        <path d="M200,80 L305,135 L275,265 L125,265 L95,135 Z" fill="none" stroke="#e0e1ff" stroke-width="1" opacity="0.5"/>
                      </svg>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>