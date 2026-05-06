<div class="max-w-5xl mx-auto py-10 px-6">
    
    <div class="bg-white dark:bg-gray-800 shadow-2xl rounded-3xl overflow-hidden">

        <!-- Tabs -->
        <div class="flex border-b border-gray-200 dark:border-gray-700">
            <button wire:click="$set('tab', 'simple')"
                    class="flex-1 py-5 text-lg font-medium transition-all {{ $tab === 'simple' ? 'border-b-4 border-indigo-600 text-indigo-600 font-semibold' : 'text-gray-500 hover:text-gray-700' }}">
                Simple Mode
            </button>
            <button wire:click="$set('tab', 'custom')"
                    class="flex-1 py-5 text-lg font-medium transition-all {{ $tab === 'custom' ? 'border-b-4 border-indigo-600 text-indigo-600 font-semibold' : 'text-gray-500 hover:text-gray-700' }}">
                Custom Design Mode (Upload Kadi)
            </button>
        </div>

<!-- ==================== SIMPLE MODE ==================== -->
@if($tab === 'simple')
<div class="p-10">
    <h1 class="text-3xl font-bold text-center mb-8">Unda E-Card Rahisi Kwa asiye na smart phone</h1>
    
    <form wire:submit.prevent="createEcard" class="space-y-8">
        <div>
            <label class="block text-sm font-medium mb-2">Jina la Mwalikwa</label>
            <input type="text" wire:model="recipient_name" 
                   class="w-full px-5 py-4 border border-gray-300 dark:border-gray-600 rounded-2xl focus:ring-2 focus:ring-indigo-500" 
                   placeholder="Jina la mwalikwa" required>
        </div>
        <div>
            <label class="block text-sm font-medium mb-2">Ujumbe (Hiari)</label>
            <textarea wire:model="message" rows="4" 
                      class="w-full px-5 py-4 border border-gray-300 dark:border-gray-600 rounded-2xl focus:ring-2 focus:ring-indigo-500"></textarea>
        </div>
        <div>
            <label class="block text-sm font-medium mb-2">Namba ya Simu (WhatsApp)</label>
            <input type="tel" wire:model="recipient_phone" 
                   class="w-full px-5 py-4 border border-gray-300 dark:border-gray-600 rounded-2xl focus:ring-2 focus:ring-indigo-500" 
                   placeholder="0787 876 102" required>
        </div>

        <div class="flex justify-end gap-4 pt-6">
            <a href="{{ route('dashboard') }}" class="px-8 py-3.5 text-gray-600">Rudi</a>
            <button type="submit" 
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-10 py-3.5 rounded-2xl font-semibold">
                Tengeneza E-Card
            </button>
        </div>
    </form>
</div>
@endif
        <!-- ==================== CUSTOM DESIGN MODE ==================== -->
        @if($tab === 'custom')
        <div class="p-12">
            <h1 class="text-3xl font-bold text-center mb-8">Custom Design Mode</h1>
            <p class="text-center text-gray-600 mb-10">Upload kadi uliyoitengeneza wenyewe</p>

            <div class="max-w-lg mx-auto">
                <label for="custom_image" class="block border-2 border-dashed border-gray-300 rounded-3xl p-16 hover:border-indigo-500 transition cursor-pointer text-center">
                    <div class="mx-auto w-20 h-20 bg-gray-100 rounded-2xl flex items-center justify-center text-5xl mb-6">📤</div>
                    <p class="text-lg font-medium">Bofya au buruta picha ya kadi yako hapa</p>
                </label>
                <input type="file" id="custom_image" wire:model="custom_image" class="hidden" accept="image/*">
            </div>

            @if($custom_image)
            <div class="mt-8 text-center">
                <img src="{{ $custom_image->temporaryUrl() }}" class="mx-auto max-h-96 rounded-2xl shadow" alt="Uploaded">
            </div>
            @endif

            <!-- Inputs: Jina, X, Y, Font Size -->
            <div class="mt-10 grid grid-cols-2 md:grid-cols-4 gap-6 max-w-lg mx-auto">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium mb-2">Jina la Mwalikwa</label>
                    <input type="text" wire:model="custom_recipient_name" 
                           class="w-full px-5 py-4 border rounded-2xl" placeholder="Jina la mwalikwa">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2">X Position</label>
                    <input type="number" wire:model="text_x" 
                           class="w-full px-5 py-4 border rounded-2xl" placeholder="300">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2">Y Position</label>
                    <input type="number" wire:model="text_y" 
                           class="w-full px-5 py-4 border rounded-2xl" placeholder="300">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium mb-2">Font Size</label>
                    <input type="number" wire:model="font_size" 
                           class="w-full px-5 py-4 border rounded-2xl" placeholder="65" min="30" max="120">
                    <p class="text-xs text-gray-500 mt-1">Kubwa zaidi = namba kubwa (50 - 90)</p>
                </div>
            </div>

            <div class="flex justify-center mt-12">
                <button wire:click="createEcard" 
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-12 py-4 rounded-2xl font-semibold text-lg">
                    Tengeneza na Weka QR Code
                </button>
            </div>
        </div>
        @endif

    </div>
</div>