<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $first_name = '';
    public string $last_name = '';
    public string $username = '';
    public string $email = '';
    public string $phone_number = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function rules(): array
    {
        return [
            'first_name'            => ['required', 'string', 'max:255'],
            'last_name'             => ['required', 'string', 'max:255'],
            'username'              => ['required', 'string', 'max:255', 'unique:users', 'alpha_dash'],
            'email'                 => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'phone_number'          => ['nullable', 'string', 'max:20'],
            'password'              => ['required', 'string', 'confirmed', Password::defaults()],
            'password_confirmation' => ['required'],
        ];
    }
    public function register(): void
    {
        try {
            $validated = $this->validate();

            $validated['password'] = Hash::make($validated['password']);

            // Code rahisi zaidi ili tuone kama inaingia kwenye DB
            $user = User::create([
                'name'          => trim($validated['first_name'] . ' ' . $validated['last_name']),
                'first_name'    => $validated['first_name'],
                'last_name'     => $validated['last_name'],
                'username'      => $validated['username'],
                'email'         => $validated['email'],
                'phone_number'  => $validated['phone_number'] ?? null,
                'password'      => $validated['password'],
            ]);

            Auth::login($user);

session()->flash('status', 'Usajili umefanikiwa! Karibu sana, ' . $user->first_name . '!');

            $this->redirect(route('dashboard', absolute: false), navigate: true);
        } catch (\Exception $e) {
            session()->flash('error', 'Hitilafu imetokea wakati wa usajili. Tafadhali jaribu tena.' . $e->getMessage());
        }
    }
}; ?>


<div>
    
      <div class="text-center mb-16">
            <h1 class="text-5xl font-extrabold text-gray-900 dark:text-white mb-4">
                Jisajili hapa
            </h1>
                </div>
    <form wire:submit="register" class="space-y-6">
        
        <div class="grid grid-cols-2 gap-4">
            <!-- First Name -->
            <div>
                <x-input-label for="first_name" :value="__('Jina la Kwanza')" />
                <x-text-input wire:model="first_name" id="first_name" 
                              class="block mt-1 w-full" type="text" required autofocus />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <!-- Last Name -->
            <div>
                <x-input-label for="last_name" :value="__('Jina la Mwisho')" />
                <x-text-input wire:model="last_name" id="last_name" 
                              class="block mt-1 w-full" type="text" required />
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>
        </div>

        <!-- Username -->
        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input wire:model="username" id="username" 
                          class="block mt-1 w-full" type="text" required />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" 
                          class="block mt-1 w-full" type="email" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div>
            <x-input-label for="phone_number" :value="__('Namba ya Simu')" />
            <x-text-input wire:model="phone_number" id="phone_number" 
                          class="block mt-1 w-full" type="tel" />
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input wire:model="password" id="password" 
                          class="block mt-1 w-full" type="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Thibitisha Password')" />
            <x-text-input wire:model="password_confirmation" id="password_confirmation" 
                          class="block mt-1 w-full" type="password" required />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-6">
            <a href="{{ route('login') }}" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900">
                Tayari una akaunti? Ingia
            </a>

            <x-primary-button class="ms-4">
                Jiandikishe
            </x-primary-button>
        </div>
    </form>
</div>