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
<body class="font-sans text-gray-900 antialiased bg-gray-100 dark:bg-gray-900">

    <!-- ==================== NAVIGATION ==================== -->
    <nav class="bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800 sticky top-0 z-50 shadow-md">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center h-16">
                
                <!-- Logo -->
                <div class="flex items-center">
                    <span class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">E-Card Services TZ</span>
                </div>

                <!-- Menu -->
                <div class="hidden md:flex items-center gap-x-8 text-sm font-medium">
                    <a href="{{ route('home') }}" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 transition">Nyumbani</a>
                    <a href="{{ route('about') }}" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 transition">Kuhusu Sisi</a>
                    <a href="{{ route('contact') }}" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 transition">Wasiliana Nasi</a>
                    <a href="#" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 transition">Lugha</a>

                    @guest
                        <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-700 font-medium transition">Ingia</a>
                        <a href="{{ route('register') }}" class="ml-4 bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2.5 rounded-2xl font-medium transition">
                            Jiandikishe
                        </a>
                    @endguest

                    @auth
                        <a href="{{ route('dashboard') }}" class="text-indigo-600 hover:text-indigo-700 font-medium transition">Dashboard</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- ==================== PAGE CONTENT ==================== -->
    <!-- ==================== PAGE CONTENT ==================== -->
<main class="flex items-center justify-center h-[calc(100vh-64px)] px-4">
    <div class="w-full max-w-md px-6 py-5 bg-white dark:bg-gray-800 shadow-xl rounded-2xl">
        {{ $slot }}
    </div>
</main>

</body>
</html>