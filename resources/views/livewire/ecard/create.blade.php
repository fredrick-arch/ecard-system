<div class="max-w-5xl mx-auto py-10 px-6">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

        <!-- FORM -->
        <div class="bg-white dark:bg-gray-800 shadow-2xl rounded-3xl p-10">
            <h1 class="text-3xl font-bold text-center mb-8 text-gray-900 dark:text-white">
                Unda E-Card Mpya
            </h1>

            <form wire:submit="createEcard" class="space-y-6">

                <div>
                    <label class="text-sm font-medium">Jina la Mwalikwa</label>
                    <input type="text" wire:model="recipient_name"
                        class="w-full px-4 py-3 border rounded-xl">
                    @error('recipient_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="text-sm font-medium">Ujumbe</label>
                    <textarea wire:model="message" rows="3"
                        class="w-full px-4 py-3 border rounded-xl"></textarea>
                </div>

                <div>
                    <label class="text-sm font-medium">Namba ya Simu</label>
                    <input type="tel" wire:model="recipient_phone"
                        class="w-full px-4 py-3 border rounded-xl">
                    @error('recipient_phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-between pt-4">
                    <a href="{{ route('dashboard') }}" class="px-6 py-3 bg-gray-200 rounded-xl">
                        Rudi
                    </a>

                    <button type="submit"
                        class="px-8 py-3 bg-indigo-600 text-white rounded-xl">
                        Tengeneza
                    </button>
                </div>

            </form>
        </div>

        <!-- PREVIEW -->
        <div class="bg-gray-50 dark:bg-gray-900 rounded-3xl p-8">

            <h2 class="text-xl font-semibold text-center mb-6">Preview</h2>

            <div class="bg-white rounded-2xl p-6 text-center">

                <h3 class="text-2xl font-bold mb-4">Mwaliko</h3>

                <p class="text-lg mb-6">
                    {{ $recipient_name ?: 'Jina litaonekana hapa...' }}
                </p>

                <div class="my-6 flex justify-center">

                    @if($qrCodeUrl)
                        {!! $qrCodeUrl !!}
                    @else
                        <div class="w-40 h-40 bg-gray-200 flex items-center justify-center rounded-xl text-gray-500">
                            QR Code
                        </div>
                    @endif

                </div>

                <p class="text-sm text-gray-500">
                    Scan QR kuthibitisha
                </p>

            </div>
        </div>

    </div>
</div>