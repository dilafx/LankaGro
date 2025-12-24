@extends('components.layouts.public')

@section('content')

<div class="bg-white">

    {{-- 1. Hero Section --}}
    <div class="relative bg-green-900 py-24 sm:py-32">
        <div class="absolute inset-0 overflow-hidden">
            <img src="{{ asset('images/Tea.png') }}" alt="Tea Plantation" class="w-full h-full object-cover opacity-20">
        </div>
        <div class="relative max-w-7xl mx-auto px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">Empowering Sri Lankan Agriculture</h1>
            <p class="mt-6 text-lg leading-8 text-green-100 max-w-2xl mx-auto">
                LankaGro is more than a platform; it's a movement to modernize farming, share knowledge, and secure the future of our nation's food production.
            </p>
        </div>
    </div>

    {{-- 2. Our Mission & Vision --}}
    <div class="py-24 sm:py-32 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                {{-- Text Content --}}
                <div>
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl mb-6">Our Mission</h2>
                    <p class="text-lg text-gray-600 mb-8">
                        To provide every farmer in Sri Lanka with accessible, accurate, and timely agricultural information. We bridge the gap between traditional wisdom and modern technology, ensuring better yields and sustainable livelihoods.
                    </p>

                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl mb-6">Our Vision</h2>
                    <p class="text-lg text-gray-600">
                        A self-sufficient Sri Lanka where technology and nature work in harmony, creating a thriving agricultural ecosystem that supports farmers and consumers alike.
                    </p>
                </div>

                {{-- Image --}}
                <div class="relative rounded-2xl overflow-hidden shadow-xl">
                    {{-- Using existing farmer image --}}
                    <img src="{{ asset('images/farmer.png') }}" alt="Sri Lankan Farmer" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </div>

    {{-- 3. What We Offer (Three Pillars) --}}
    <div class="py-24 sm:py-32">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center mb-16">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Why Choose LankaGro?</h2>
                <p class="mt-4 text-lg text-gray-600">We provide comprehensive tools tailored for local needs.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">

                {{-- Card 1 --}}
                <div class="p-8 bg-green-50 rounded-2xl border border-green-100 hover:shadow-lg transition-shadow">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-green-600 text-white mb-6">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Expert Knowledge</h3>
                    <p class="text-gray-600">Access verified tutorials and guides on paddy, tea, coconut, and vegetable cultivation.</p>
                </div>

                {{-- Card 2 --}}
                <div class="p-8 bg-green-50 rounded-2xl border border-green-100 hover:shadow-lg transition-shadow">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-green-600 text-white mb-6">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Problem Solving</h3>
                    <p class="text-gray-600">Identify pests and diseases quickly with our visual database and find immediate organic or chemical solutions.</p>
                </div>

                {{-- Card 3 --}}
                <div class="p-8 bg-green-50 rounded-2xl border border-green-100 hover:shadow-lg transition-shadow">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-green-600 text-white mb-6">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" /></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Smart Tools</h3>
                    <p class="text-gray-600">Use our fertilizer calculators and yield estimators to plan your season effectively and maximize profit.</p>
                </div>

            </div>
        </div>
    </div>

    {{-- 4. CTA Section --}}
    <div class="bg-green-900">
        <div class="px-6 py-24 sm:px-6 sm:py-32 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Ready to grow better?</h2>
                <p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-green-100">
                    Join the LankaGro community today. Access resources, stay updated with news, and connect with experts.
                </p>
                <div class="mt-10 flex items-center justify-center gap-x-6">

                    <a href="{{ route('contact') }}" class="text-sm font-semibold leading-6 text-white">Contact support <span aria-hidden="true">→</span></a>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
