<footer class="bg-green-900 text-white mt-auto">
    {{-- Main Footer Content --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">

            {{-- Column 1: Brand & Mission --}}
            <div class="space-y-4">
                <div class="flex items-center space-x-2">
                    {{-- Logo Placeholder or Icon --}}
                    <svg class="w-8 h-8 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="text-2xl font-bold tracking-wide">LankaGro</span>
                </div>
                <p class="text-green-100 text-sm leading-relaxed">
                    Empowering Sri Lankan farmers with modern technology, expert knowledge, and community support for a sustainable agricultural future.
                </p>
                <div class="flex space-x-4 pt-2">
                    {{-- Social Icons --}}
                    <a href="#" class="text-green-300 hover:text-white transition"><span class="sr-only">Facebook</span><svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg></a>
                    <a href="#" class="text-green-300 hover:text-white transition"><span class="sr-only">Twitter</span><svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg></a>
                </div>
            </div>

            {{-- Column 2: Quick Links --}}
            <div>
                <h3 class="text-lg font-semibold mb-4 border-b border-green-700 pb-2 inline-block">Quick Links</h3>
                <ul class="space-y-2 text-sm text-green-100">
                    <li><a href="{{ route('home') }}" class="hover:text-white hover:underline transition">Home</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-white hover:underline transition">About Us</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white hover:underline transition">Contact Support</a></li>
                    <li><a href="" class="hover:text-white hover:underline transition">Join Community</a></li>
                </ul>
            </div>

            {{-- Column 3: Knowledge Hub --}}
            <div>
                <h3 class="text-lg font-semibold mb-4 border-b border-green-700 pb-2 inline-block">Knowledge Hub</h3>
                <ul class="space-y-2 text-sm text-green-100">
                    <li><a href="{{ route('news') }}" class="hover:text-white hover:underline transition">Agriculture News</a></li>
                    <li><a href="{{ route('tutorial') }}" class="hover:text-white hover:underline transition">Video Tutorials</a></li>
                    <li><a href="{{ route('solutions') }}" class="hover:text-white hover:underline transition">Crop Solutions</a></li>
                    <li><a href="{{ route('events') }}" class="hover:text-white hover:underline transition">Upcoming Events</a></li>
                    <li><a href="{{ route('calculator') }}" class="hover:text-white hover:underline transition">Fertilizer Calculator</a></li>
                </ul>
            </div>

            {{-- Column 4: Contact Info --}}
            <div>
                <h3 class="text-lg font-semibold mb-4 border-b border-green-700 pb-2 inline-block">Contact Us</h3>
                <ul class="space-y-4 text-sm text-green-100">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 mr-2 text-green-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span>No. 123, Gannoruwa Road,<br>Peradeniya, Sri Lanka</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        <span>+94 11 234 5678</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <span>info@lankagro.lk</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Copyright Section --}}
    <div class="bg-green-950 py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center text-xs text-green-400">
            <p>&copy; {{ date('Y') }} LankaGro. All rights reserved.</p>
            <div class="flex space-x-6 mt-2 md:mt-0">
                <a href="#" class="hover:text-white transition">Privacy Policy</a>
                <a href="#" class="hover:text-white transition">Terms of Service</a>
                <a href="#" class="hover:text-white transition">Cookie Policy</a>
            </div>
        </div>
    </div>
</footer>
