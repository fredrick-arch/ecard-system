@extends('layouts.main')

@section('content')

    <!-- ==================== NAVIGATION BAR ==================== -->
    <nav class="bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800 sticky top-0 z-50 shadow-md">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center h-16">

                <!-- Logo -->
                <div class="flex items-center">
                    <span class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">E-Card Services TZ</span>
                </div>

                <!-- Main Menu -->
                <div class="hidden md:flex items-center gap-x-8 text-sm font-medium">
                    <a href="{{ route('home') }}" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 transition">Nyumbani</a>
                    <a href="{{ route('about') }}" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 transition">Kuhusu Sisi</a>
                    <a href="{{ route('contact') }}" class="text-indigo-600 font-medium">Wasiliana Nasi</a>
                    <a href="#" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 transition">Lugha</a>
                </div>

                <!-- Right Side -->
                <div class="flex items-center gap-x-4">
                    @guest
                        <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-700 font-medium transition">Ingia</a>
                        <a href="{{ route('register') }}" 
                           class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-2xl font-medium transition">
                            Jiandikishe
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" class="text-indigo-600 hover:text-indigo-700 font-medium transition">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" 
                                    onclick="return confirm('Unataka kutoka kwenye mfumo?')"
                                    class="text-red-600 hover:text-red-700 font-medium transition">
                                Toka
                            </button>
                        </form>
                    @endguest
                </div>

            </div>
        </div>
    </nav>

    <!-- ==================== PAGE CONTENT ==================== -->
    <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-purple-50 dark:from-gray-950 dark:via-gray-900 dark:to-indigo-950 py-20 px-6">
        <div class="max-w-5xl mx-auto">

            <!-- Title -->
            <div class="text-center mb-16">
                <h1 class="text-5xl font-extrabold text-gray-900 dark:text-white mb-4">
                    Wasiliana Nasi
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-300">
                    Tupo tayari kukusaidia wakati wowote
                </p>
            </div>

            <!-- Contact Card -->
            <div class="bg-white dark:bg-gray-800 shadow-2xl rounded-3xl p-12 text-center">
                <!-- Icon -->
                <div class="text-6xl mb-6">💬</div>
                
                <!-- Info -->
                <p class="text-lg text-gray-700 dark:text-gray-300 mb-6">
                    Unaweza kuwasiliana nasi moja kwa moja kupitia WhatsApp kwa msaada wa haraka.
                </p>
                
                <div class="text-2xl font-semibold text-indigo-600 mb-8">
                    +255 787 876 102
                </div>

                <!-- Button -->
                <a href="https://wa.me/255787876102" target="_blank"
                   class="inline-block bg-green-500 hover:bg-green-600 text-white text-lg px-10 py-4 rounded-2xl font-semibold transition">
                    Fungua WhatsApp
                </a>
            </div>

            <!-- Extra Info -->
            <div class="mt-12 text-center text-gray-600 dark:text-gray-400">
                Tunapatikana kila siku kuanzia saa 2 asubuhi hadi saa 12 jioni.
            </div>

        </div>
    </div>

@endsection