<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>
<div class="w-full">
    
    <!-- TITLE -->
    <div class="text-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
            Karibu Tena 👋
        </h1>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
            Ingia kuendelea na huduma zako
        </p>
    </div>

    <!-- SESSION STATUS -->
    <x-auth-session-status class="mb-4 text-center text-sm text-green-600" :status="session('status')" />

    <form wire:submit="login" class="space-y-4">

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input 
                wire:model="form.email" 
                id="email" 
                class="block mt-1 w-full rounded-xl focus:ring-2 focus:ring-indigo-500" 
                type="email" 
                required 
                autofocus 
            />
            <x-input-error :messages="$errors->get('form.email')" class="mt-1 text-xs" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input 
                wire:model="form.password" 
                id="password" 
                class="block mt-1 w-full rounded-xl focus:ring-2 focus:ring-indigo-500"
                type="password"
                required 
            />
            <x-input-error :messages="$errors->get('form.password')" class="mt-1 text-xs" />
        </div>

        <!-- REMEMBER + FORGOT -->
        <div class="flex items-center justify-between text-sm">
            <label class="flex items-center gap-2 text-gray-600 dark:text-gray-400">
                <input wire:model="form.remember" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                Kumbuka mimi
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" 
                   class="text-indigo-600 hover:text-indigo-700 font-medium">
                    Umesahau password?
                </a>
            @endif
        </div>

        <!-- BUTTON -->
        <div>
            <x-primary-button class="w-full justify-center py-2.5 text-base rounded-xl">
                Ingia
            </x-primary-button>
        </div>

        <!-- REGISTER LINK -->
        <div class="text-center text-sm text-gray-600 dark:text-gray-400">
            Huna akaunti? 
            <a href="{{ route('register') }}" 
               class="text-indigo-600 hover:text-indigo-700 font-semibold">
                Jiandikishe
            </a>
        </div>

    </form>
</div>