<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth.split')] class extends Component {
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    public function login(): void
    {
        $this->validate();
        $this->ensureIsNotRateLimited();

        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($this->throttleKey());
            throw ValidationException::withMessages(['email' => __('auth.failed')]);
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();
        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }

    protected function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));
        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email) . '|' . request()->ip());
    }
}; ?>

<div class="flex flex-col gap-8 w-full">

    {{-- Header --}}
    <div class="text-center lg:text-left">
        <h1 class="text-3xl font-black tracking-tight text-gray-900 dark:text-white">
            Welcome back
        </h1>
        <p class="mt-2 text-sm font-medium text-gray-500 dark:text-gray-400">
            Please enter your details to sign in.
        </p>
    </div>

    <x-auth-session-status class="text-center" :status="session('status')" />

    <form method="POST" wire:submit="login" class="flex flex-col gap-6">

        {{-- Email --}}
        <div>
            <flux:input wire:model="email" :label="__('Email address')" type="email" required autofocus
                autocomplete="email" placeholder="farmer@lankagro.com"
                class="focus:ring-green-500 focus:border-green-500
                       dark:bg-gray-800 dark:border-gray-700 dark:text-white
                       dark:placeholder-gray-500 dark:focus:ring-green-500 dark:focus:border-green-500" />
        </div>

        {{-- Password --}}
        <div class="relative">
            <flux:input wire:model="password" :label="__('Password')" type="password" required
                autocomplete="current-password" placeholder="••••••••" viewable
                class="focus:ring-green-500 focus:border-green-500
                       dark:bg-gray-800 dark:border-gray-700 dark:text-white
                       dark:placeholder-gray-500 dark:focus:ring-green-500 dark:focus:border-green-500" />

            @if (Route::has('password.request'))
                <flux:link
                    class="absolute end-0 top-0 text-sm font-semibold text-green-600 hover:text-green-700 dark:text-green-400 dark:hover:text-green-300 transition-colors"
                    :href="route('password.request')" wire:navigate>
                    {{ __('Forgot password?') }}
                </flux:link>
            @endif
        </div>

        {{-- Remember me --}}
        <div class="flex items-center pt-1">
            <flux:checkbox wire:model="remember" :label="__('Keep me logged in')"
                class="dark:border-gray-600 dark:bg-gray-800 dark:checked:bg-green-600 dark:text-gray-300" />
        </div>

        {{-- Submit --}}
        <div class="mt-2">
            <button type="submit"
                class="w-full flex justify-center items-center py-3 px-4 rounded-xl shadow-md text-sm font-bold text-white
                       bg-green-600 hover:bg-green-700
                       dark:bg-green-700 dark:hover:bg-green-600
                       hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500
                       dark:focus:ring-offset-gray-900
                       transition-all duration-200 transform hover:-translate-y-0.5">
                <span wire:loading.remove wire:target="login">{{ __('Sign In') }}</span>
                <span wire:loading wire:target="login" class="flex items-center gap-2">
                    <svg class="animate-spin h-5 w-5 text-white" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    Signing in...
                </span>
            </button>
        </div>
    </form>

    {{-- Register link --}}
    @if (Route::has('register'))
        <div class="relative mt-2">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-200 dark:border-gray-700 transition-colors"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-4 bg-white dark:bg-gray-900 text-gray-500 dark:text-gray-400 transition-colors">
                    New to LankaGro?
                </span>
            </div>
        </div>

        <div class="text-center">
            <a href="{{ route('register') }}" wire:navigate
                class="w-full flex justify-center py-3 px-4 rounded-xl text-sm font-bold transition-colors duration-200
                       border-2 border-gray-200 dark:border-gray-700
                       bg-white dark:bg-gray-800
                       text-gray-700 dark:text-gray-200
                       hover:bg-gray-50 dark:hover:bg-gray-700
                       shadow-sm">
                {{ __('Create an account') }}
            </a>
        </div>
    @endif
</div>
