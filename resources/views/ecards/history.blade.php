<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            📜 Historia ya E-Cards
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if($ecards->isEmpty())
                <div class="flex flex-col items-center justify-center text-center py-20">
                    <div class="text-6xl mb-4">📭</div>
                    <h3 class="text-2xl font-semibold text-gray-700 dark:text-gray-300 mb-2">
                        Hakuna E-Card bado
                    </h3>
                    <p class="text-gray-500 mb-6">
                        Anza kutengeneza kadi yako ya kwanza sasa
                    </p>
                    <a href="{{ route('ecard.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl shadow">
                        Tengeneza E-Card
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($ecards as $ecard)
                        <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-md hover:shadow-2xl transition overflow-hidden group">
                            
                            <!-- Kadi Image -->
                            <div class="relative">
                                <a href="{{ route('ecard.show', $ecard->id) }}">
                                    <img src="{{ asset('storage/' . $ecard->image_path) }}"
                                         class="w-full h-52 object-cover group-hover:scale-105 transition duration-300">
                                </a>
                                <div class="absolute bottom-3 right-3 bg-white p-2 rounded-xl shadow">
                                    <img src="{{ asset('storage/' . ($ecard->qr_code_path ?? $ecard->image_path)) }}"
                                         class="w-14 h-14 object-contain">
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1">
                                    {{ $ecard->title }}
                                </h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                                    {{ $ecard->recipient_name }}
                                </p>

                                <div class="flex gap-2">
                                    <a href="{{ route('ecard.show', $ecard->id) }}"
                                       class="flex-1 text-center bg-indigo-600 hover:bg-indigo-700 text-white text-xs px-3 py-2.5 rounded-lg shadow">
                                        View
                                    </a>

                                    <!-- Tuma Kadi moja kwa moja -->
                                    <button onclick="sendCardToWhatsApp('{{ $ecard->recipient_phone }}', '{{ asset('storage/' . $ecard->image_path) }}')"
                                            class="flex-1 text-center bg-green-600 hover:bg-green-700 text-white text-xs px-3 py-2.5 rounded-lg shadow">
                                        📱 Tuma Kadi WhatsApp
                                    </button>

                                    <a href="{{ asset('storage/' . $ecard->image_path) }}" download
                                       class="flex-1 text-center bg-amber-600 hover:bg-amber-700 text-white text-xs px-3 py-2.5 rounded-lg shadow">
                                        ⬇️ Download
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>

<script>
function sendCardToWhatsApp(phone, imageUrl) {
    // Ujumbe mfupi sana ili WhatsApp iweze kuonyesha picha vizuri
    const text = encodeURIComponent(imageUrl);
    const url = `https://wa.me/${phone}?text=${text}`;
    window.open(url, '_blank');
}
</script>