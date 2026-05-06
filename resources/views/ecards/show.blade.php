<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            E-Card Details
        </h2>
    </x-slot>

    <div class="py-10 max-w-4xl mx-auto">

        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6">

            <img src="{{ asset('storage/' . $ecard->image_path) }}"
                 class="w-full rounded-xl mb-4">

            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                {{ $ecard->title }}
            </h1>

            <p class="text-gray-500 mt-2">
                {{ $ecard->recipient_name }}
            </p>

            <a href="{{ asset('storage/' . $ecard->image_path) }}"
               download
               class="inline-block mt-4 bg-green-600 text-white px-4 py-2 rounded-lg">
                Download
            </a>

        </div>

    </div>
</x-app-layout>