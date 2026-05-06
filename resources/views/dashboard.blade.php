<x-app-layout>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Flash Message -->
            @if (session()->has('status'))
                <div class="mb-10 bg-green-500 text-white px-8 py-6 rounded-3xl text-xl font-medium shadow-lg flex items-center gap-4">
                    <span class="text-3xl">🎉</span>
                    <span>{{ session('status') }}</span>
                </div>
            @endif

            @if (session()->has('error'))
                <div class="mb-10 bg-red-500 text-white px-8 py-6 rounded-3xl text-xl font-medium shadow-lg">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Main Content -->
            <div class="bg-white dark:bg-gray-800 shadow-2xl sm:rounded-3xl overflow-hidden">
                <div class="p-12 text-center border-b border-gray-100 dark:border-gray-700">
                    <h1 class="text-5xl font-bold text-gray-900 dark:text-white">
                        Karibu, <span class="text-indigo-600">{{ auth()->user()->first_name }}</span>!
                    </h1>
                    <p class="mt-4 text-2xl text-gray-600 dark:text-gray-400">
                        Umeingia kwa mafanikio katika E-Card TZ
                    </p>
                </div>

                <div class="p-12">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                        <!-- Card 1: Unda E-Card -->
                        <a href="{{ route('ecard.create') }}" 
                           class="block bg-gradient-to-br from-indigo-500 to-purple-600 text-white p-10 rounded-3xl hover:scale-105 transition-all duration-300 group">
                            <div class="text-7xl mb-6 group-hover:rotate-12 transition-transform">🎨</div>
                            <h3 class="text-3xl font-semibold mb-3">Unda E-Card</h3>
                            <p class="opacity-90 text-lg">Tengeneza kadi nzuri za kidijitali</p>
                        </a>

                      <!-- Card 2: Tuma via WhatsApp -->
<a href="{{ route('ecards.history') }}"
   class="block bg-gradient-to-br from-emerald-500 to-teal-600 text-white p-10 rounded-3xl hover:scale-105 transition-all duration-300 group">
    <div class="text-7xl mb-6">📱</div>
    <h3 class="text-3xl font-semibold mb-3">Tuma via WhatsApp</h3>
    <p class="opacity-90 text-lg">Tuma kadi moja kwa moja kwa namba</p>
</a>
                        <!-- Card 3: Historia Yangu -->
                        <a href="{{ route('ecards.history') }}"
                           class="block bg-gradient-to-br from-amber-500 to-orange-600 text-white p-10 rounded-3xl hover:scale-105 transition-all duration-300 group">
                            <div class="text-7xl mb-6">📜</div>
                            <h3 class="text-3xl font-semibold mb-3">Historia Yangu</h3>
                            <p class="opacity-90 text-lg">Angalia kadi ulizotuma hapo awali</p>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>