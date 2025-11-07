{{-- resources/views/pages/home.blade.php --}}

@extends('components.layouts.public')

@section('content')
    {{-- Main Content  --}}
<main class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-16">

            {{-- Section 1: Welcome Message--}}
            <section class="text-center">
                <h2 class="text-3xl font-bold mb-4 text-green-900">Welcome to LankaGro</h2>
                <p class="text-gray-700 max-w-2xl mx-auto">
                    LankaGro is a centralized platform designed to empower Sri Lankan farmers with tutorials,
                    crop management advice, news, and tools to maximize productivity.
                </p>
            </section>

            {{-- Section 2: Featured Crops --}}
            <section id="features">
                <h2 class="text-3xl font-bold mb-8 text-green-900 text-center">Featured Crops</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 shadow rounded-lg text-center">
                        <img src="{{ asset('images/Rice.png') }}" alt="Rice" class="rounded-lg mb-4 mx-auto h-48 w-full object-cover">
                        <h3 class="font-bold text-xl mb-2">Rice</h3>
                        <p>Learn the best techniques to improve yield efficiently.</p>
                    </div>
                    <div class="bg-white p-6 shadow rounded-lg text-center">
                        <img src="{{ asset('images/Tea.png') }}" alt="Tea" class="rounded-lg mb-4 mx-auto h-48 w-full object-cover">
                        <h3 class="font-bold text-xl mb-2">Tea</h3>
                        <p>Discover tips for premium quality tea cultivation.</p>
                    </div>
                    <div class="bg-white p-6 shadow rounded-lg text-center">
                        <img src="{{ asset('images/coconut.png') }}" alt="Coconut" class="rounded-lg mb-4 mx-auto h-48 w-full object-cover">
                        <h3 class="font-bold text-xl mb-2">Coconut</h3>
                        <p>Optimize your coconut farming practices for better profit.</p>
                    </div>
                </div>
            </section>

            {{-- Section 3: Call to Action --}}
            <section class="bg-green-50 py-12 text-center rounded-lg">
                <h2 class="text-3xl font-bold mb-4 text-green-900">Join LankaGro Today</h2>
                <p class="text-gray-700 mb-6 max-w-xl mx-auto">
                    Sign up to access expert advice, tutorials, and a community of farmers sharing best practices.
                </p>
                <a href="" class="bg-green-600 text-white py-3 px-6 rounded-lg hover:bg-green-700 transition-colors">
                    Sign Up Now
                </a>
            </section>

            {{-- Section 4: About / Info --}}
            <section class="md:flex md:items-center md:space-x-12">
                <div class="md:w-2/3 mb-5 md:mb-0">
                    <img src="{{ asset('images/farmer.png') }}" alt="Farmer" class="rounded-lg shadow" style = "width:1200px; height:500px">
                </div>
                <div class="md:w-1/2">
                    <h2 class="text-3xl font-bold mb-4 text-green-900">About LankaGro</h2>
                    <p class="text-gray-700 mb-4">
                        LankaGro consolidates valuable agricultural information and resources into one accessible platform,
                        helping farmers make informed decisions and improve productivity sustainably.
                    </p>
                    <a href="#features" class="bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 transition-colors">
                        Learn More
                    </a>
                </div>
            </section>

        </div>
    </main>

@endsection
