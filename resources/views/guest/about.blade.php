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
                    <a href="{{ route('about') }}" class="text-indigo-600 font-medium">Kuhusu Sisi</a>
                    <a href="{{ route('contact') }}" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 transition">Wasiliana Nasi</a>
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
                    Kuhusu Sisi
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-300">
                    Tunajenga njia rahisi na nzuri za kutuma salamu za kidijitali
                </p>
            </div>

            <!-- Card -->
            <div class="bg-white dark:bg-gray-800 shadow-2xl rounded-3xl p-12">
                <!-- Intro -->
                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-10">
                    Sisi ni timu kutoka Tanzania inayojikita katika kutengeneza mfumo wa
                    kisasa wa kadi za salamu (E-Card). Tunazingatia urahisi wa matumizi,
                    muonekano mzuri, na uwezo wa kutuma salamu moja kwa moja kupitia WhatsApp.
                </p>

                <!-- Features -->
                <div class="grid md:grid-cols-3 gap-8 text-center">
                    <div class="p-6 rounded-2xl bg-indigo-50 dark:bg-gray-700">
                        <div class="text-4xl mb-3">⚡</div>
                        <h3 class="font-semibold text-lg text-gray-800 dark:text-white">Haraka</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mt-2">
                            Tuma salamu ndani ya sekunde chache
                        </p>
                    </div>
                    <div class="p-6 rounded-2xl bg-purple-50 dark:bg-gray-700">
                        <div class="text-4xl mb-3">🎨</div>
                        <h3 class="font-semibold text-lg text-gray-800 dark:text-white">Ubunifu</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mt-2">
                            Tengeneza kadi zako kwa urahisi na ubunifu mkubwa
                        </p>
                    </div>
                    <div class="p-6 rounded-2xl bg-emerald-50 dark:bg-gray-700">
                        <div class="text-4xl mb-3">💰</div>
                        <h3 class="font-semibold text-lg text-gray-800 dark:text-white">Bei Nafuu</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mt-2">
                            Inafaa kwa kila mtu na biashara ndogo
                        </p>
                    </div>
                </div>
            </div>

            <!-- Bottom CTA -->
            <div class="text-center mt-16">
                <a href="{{ route('register') }}"
                   class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white text-lg px-10 py-4 rounded-2xl font-semibold transition">
                    Anza Sasa Bure
                </a>
            </div>

        </div>
    </div>

@endsection