<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ dark: localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches) }" x-init="$watch('dark', val => {
    localStorage.setItem('theme', val ? 'dark' : 'light');
    document.documentElement.classList.toggle('dark', val)
});
document.documentElement.classList.toggle('dark', dark)"
    :class="{ 'dark': dark }">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-gray-50 dark:bg-gray-950 antialiased transition-colors duration-300">
    <div class="relative grid h-dvh flex-col items-center justify-center lg:max-w-none lg:grid-cols-2 lg:px-0">

        {{-- Dark Mode Toggle --}}
        <button @click="dark = !dark"
            class="fixed top-4 right-4 z-50 p-2.5 rounded-xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-md hover:shadow-lg transition-all duration-200 text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white"
            :title="dark ? 'Switch to light mode' : 'Switch to dark mode'">
            {{-- Sun icon (shown in dark mode) --}}
            <svg x-show="dark" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707M17.657 17.657l-.707-.707M6.343 6.343l-.707-.707M12 7a5 5 0 100 10A5 5 0 0012 7z" />
            </svg>
            {{-- Moon icon (shown in light mode) --}}
            <svg x-show="!dark" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
            </svg>
        </button>

        {{-- Left panel: decorative image --}}
        <div class="relative hidden h-full flex-col p-10 text-white lg:flex shadow-2xl">
            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-1000 hover:scale-105"
                style="background-image: url('{{ asset('Images/tea.jpg') }}');">
            </div>
            <div
                class="absolute inset-0 bg-gradient-to-t from-green-900/95 via-green-900/40 to-black/30 dark:from-black/95 dark:via-black/60 dark:to-black/40 transition-colors duration-300">
            </div>

            <a href="{{ route('home') }}"
                class="relative z-20 flex items-center text-3xl font-black tracking-tight text-white drop-shadow-md"
                wire:navigate>
                <img src="{{ asset('Images/LOGO.jpg') }}" alt="LankaGro Logo"
                    class="h-12 w-12 rounded-xl me-3 object-cover border-2 border-white/20 shadow-lg">
                LankaGro
            </a>

            <div class="relative z-20 mt-auto w-full max-w-lg">
                <blockquote
                    class="space-y-4 backdrop-blur-md bg-white/10 dark:bg-black/30 p-8 rounded-3xl border border-white/20 shadow-2xl transition-colors duration-300">
                    <p class="text-xl font-medium leading-relaxed text-white drop-shadow-sm">
                        "Empowering Sri Lankan farmers with innovative solutions, expert guidance, and a thriving
                        community for sustainable agriculture."
                    </p>
                    <footer class="mt-4 pt-4 border-t border-white/20">
                        <span class="text-sm font-bold text-lime-300 uppercase tracking-widest">Welcome to
                            LankaGro</span>
                    </footer>
                </blockquote>
            </div>
        </div>

        {{-- Right panel: auth form --}}
        <div
            class="w-full lg:p-8 bg-white dark:bg-gray-900 h-full flex items-center shadow-[-20px_0_30px_-15px_rgba(0,0,0,0.1)] dark:shadow-[-20px_0_30px_-15px_rgba(0,0,0,0.4)] z-10 transition-colors duration-300">
            <div class="mx-auto flex w-full flex-col justify-center space-y-8 sm:w-[400px] px-6 sm:px-0 py-12">
                <a href="{{ route('home') }}"
                    class="z-20 flex flex-col items-center gap-3 font-black tracking-tight text-2xl lg:hidden text-green-700 dark:text-green-400"
                    wire:navigate>
                    <img src="{{ asset('Images/LOGO.jpg') }}" alt="LankaGro Logo"
                        class="h-14 w-14 rounded-2xl object-cover shadow-md">
                    LankaGro
                </a>
                {{ $slot }}
            </div>
        </div>
    </div>
    @fluxScripts
</body>

</html>
