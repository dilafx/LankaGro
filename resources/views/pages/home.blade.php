@extends('components.layouts.public')

@section('content')

    {{-- 1. Hero Section --}}
    <div class="relative bg-green-900 overflow-hidden">
        <div class="absolute inset-0">
            {{-- Background Image with Overlay --}}
            <img src="{{ asset('images/Homepage.png') }}" alt="Sri Lankan Agriculture" class="w-full h-full object-cover opacity-30">
            <div class="absolute inset-0 bg-green-900/40 mix-blend-multiply"></div>
        </div>

        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
                The Future of <span class="text-green-300">Sri Lankan Farming</span>
            </h1>
            <p class="mt-6 text-xl text-green-100 max-w-3xl">
                LankaGro connects you with expert cultivation advice, smart tools, and the latest agricultural news. Join thousands of farmers maximizing their harvest today.
            </p>
            <div class="mt-10 flex space-x-4">
                <a href="" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-green-900 bg-white hover:bg-green-50 shadow-lg transition">
                    Get Started
                </a>
                <a href="{{ route('about') }}" class="inline-flex items-center px-6 py-3 border border-white text-base font-medium rounded-md text-white hover:bg-white/10 transition">
                    Learn More
                </a>
            </div>
        </div>
    </div>

    {{-- 2. Smart Tools Section (Quick Access) --}}
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-green-900">Smart Agricultural Tools</h2>
                <p class="mt-2 text-gray-600">Everything you need to manage your cultivation in one place.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                {{-- Tool 1: Calculator --}}
                <a href="{{ route('calculator') }}" class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-shadow border-t-4 border-green-500 group">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4 text-green-600 group-hover:bg-green-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Fertilizer Calculator</h3>
                    <p class="text-sm text-gray-600">Calculate exact NPK requirements for your land size and crop type.</p>
                </a>

                {{-- Tool 2: Solutions --}}
                <a href="{{ route('solutions') }}" class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-shadow border-t-4 border-red-500 group">
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-4 text-red-600 group-hover:bg-red-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Pest & Disease ID</h3>
                    <p class="text-sm text-gray-600">Identify crop issues visually and find immediate chemical or organic solutions.</p>
                </a>

                {{-- Tool 3: Tutorials --}}
                <a href="{{ route('tutorial') }}" class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-shadow border-t-4 border-yellow-500 group">
                    <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mb-4 text-yellow-600 group-hover:bg-yellow-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Video Tutorials</h3>
                    <p class="text-sm text-gray-600">Step-by-step guides on modern farming techniques and harvesting.</p>
                </a>

                {{-- Tool 4: News --}}
                <a href="{{ route('news') }}" class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-shadow border-t-4 border-blue-500 group">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4 text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Agro News</h3>
                    <p class="text-sm text-gray-600">Stay updated with market prices, export data, and government announcements.</p>
                </a>
            </div>
        </div>
    </div>

    {{-- 3. Featured Crops Section --}}
    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold mb-8 text-green-900 text-center">Featured Crop Categories</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                {{-- Rice --}}
                <div class="relative group rounded-xl overflow-hidden shadow-lg h-80">
                    <img src="{{ asset('images/Rice.png') }}" alt="Rice Cultivation" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-linear-to-t from-black/80 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6">
                        <h3 class="text-2xl font-bold text-white">Paddy (Rice)</h3>
                        <p class="text-gray-200 text-sm mt-2 mb-4">Master the staple crop of the nation.</p>
                        <a href="{{ route('solutions', ['crop' => 'Rice (Paddy)']) }}" class="text-green-300 font-semibold hover:text-white flex items-center">
                            View Solutions <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>

                {{-- Tea --}}
                <div class="relative group rounded-xl overflow-hidden shadow-lg h-80">
                    <img src="{{ asset('images/Tea.png') }}" alt="Tea Cultivation" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-linear-to-t from-black/80 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6">
                        <h3 class="text-2xl font-bold text-white">Tea</h3>
                        <p class="text-gray-200 text-sm mt-2 mb-4">Optimize yield for the "Green Gold".</p>
                        <a href="{{ route('solutions', ['crop' => 'Tea']) }}" class="text-green-300 font-semibold hover:text-white flex items-center">
                            View Solutions <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>

                {{-- Coconut --}}
                <div class="relative group rounded-xl overflow-hidden shadow-lg h-80">
                    <img src="{{ asset('images/coconut.png') }}" alt="Coconut Cultivation" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-linear-to-t from-black/80 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6">
                        <h3 class="text-2xl font-bold text-white">Coconut</h3>
                        <p class="text-gray-200 text-sm mt-2 mb-4">Protect and nourish your plantation.</p>
                        <a href="{{ route('solutions', ['crop' => 'Coconut']) }}" class="text-green-300 font-semibold hover:text-white flex items-center">
                            View Solutions <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- 4. About / Trust Section --}}
    <div class="py-16 bg-green-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-8 md:mb-0">
                <img src="{{ asset('images/farmer.png') }}" alt="Happy Farmer" class="rounded-2xl shadow-xl w-full object-cover">
            </div>
            <div class="md:w-1/2 md:pl-16">
                <h2 class="text-3xl font-bold text-green-900 mb-6">Why LankaGro?</h2>
                <div class="space-y-4">
                    <div class="flex">
                        <div class="shrink-0">
                            <div class="flex items-center justify-center h-10 w-10 rounded-md bg-green-600 text-white">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Expert-Backed Content</h3>
                            <p class="mt-1 text-gray-500">All tutorials and solutions are verified by agricultural officers.</p>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="shrink-0">
                            <div class="flex items-center justify-center h-10 w-10 rounded-md bg-green-600 text-white">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Community Support</h3>
                            <p class="mt-1 text-gray-500">Join a network of farmers sharing real-world experiences and events.</p>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <a href="{{ route('about') }}" class="text-green-600 font-semibold hover:text-green-800">
                        Read our full story &rarr;
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- 5. Upcoming Events Preview --}}
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900">Don't Miss Out</h2>
            <p class="mt-4 text-lg text-gray-500 mb-8">Join workshops, training sessions, and agricultural fairs near you.</p>
            <a href="{{ route('events') }}" class="inline-block bg-green-100 text-green-700 px-8 py-3 rounded-full font-bold hover:bg-green-200 transition">
                View All Upcoming Events
            </a>
        </div>
    </div>

@endsection
