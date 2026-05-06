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
                    <a href="{{ route('home') }}" class="text-indigo-600 font-medium">Nyumbani</a>
                    <a href="{{ route('about') }}" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 transition">Kuhusu Sisi</a>
                    <a href="{{ route('contact') }}" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 transition">Wasiliana Nasi</a>
                    <a href="#" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 transition">Lugha</a>
                </div>

                <!-- Right Side -->
                <div class="flex items-center gap-x-4">
                    @guest
                        <a href="{{ route('login') }}" 
                           class="text-indigo-600 hover:text-indigo-700 font-medium transition">Ingia</a>
                        <a href="{{ route('register') }}" 
                           class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-2xl font-medium transition">
                            Jiandikishe
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" 
                           class="text-indigo-600 hover:text-indigo-700 font-medium transition">Dashboard</a>
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

    <!-- ==================== HERO SECTION ==================== -->
    <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-purple-50 dark:from-gray-950 dark:via-gray-900 dark:to-indigo-950 py-20 px-6">
        <div class="max-w-5xl mx-auto">

            <!-- Title -->
            <div class="text-center mb-16">
                <h1 class="text-5xl md:text-6xl font-extrabold tracking-tight text-gray-900 dark:text-white leading-tight">
                    Tuma Salamu za Kidijitali
                    <span class="block bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                        Zenye Kuvutia
                    </span>
                </h1>
                <p class="mt-6 text-lg md:text-xl text-gray-600 dark:text-gray-300 leading-relaxed">
                    Unda kadi maalum za kuzaliwa, harusi, sikukuu, upendo na zaidi.<br>
                    Tuma moja kwa moja kupitia <strong class="text-green-500">WhatsApp</strong> kwa jina lako la biashara.
                </p>
                
                <!-- Buttons -->
                <div class="mt-12 flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('register') }}"
                       class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:opacity-90 text-white text-lg px-10 py-4 rounded-2xl font-semibold shadow-lg transition transform hover:scale-105">
                        🚀 Anza Kutengeneza - Bure
                    </a>
                    <a href="{{ route('about') }}"
                       class="border border-gray-300 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 text-gray-700 dark:text-gray-300 text-lg px-10 py-4 rounded-2xl font-semibold transition">
                        Jifunze Zaidi
                    </a>
                </div>

                <!-- Small Trust Text -->
                <p class="mt-8 text-sm text-gray-500 dark:text-gray-400">
                    Hakuna malipo ya kuanza • Rahisi kutumia • Haraka sana
                </p>
            </div>

        </div>
    </div>

@endsection