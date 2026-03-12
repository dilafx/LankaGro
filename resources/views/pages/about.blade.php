@extends('components.layouts.public')

@section('content')
<!-- Hero Section -->
<section class="relative bg-linear-to-br from-lime-600 via-lime-500 to-emerald-500 text-white py-32 overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_50%,rgba(255,255,255,0.1)_0%,transparent_50%)]"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_80%,rgba(255,255,255,0.1)_0%,transparent_50%)]"></div>
    
    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-6xl md:text-7xl font-black mb-6 leading-tight">About LankaGro</h1>
            <p class="text-2xl text-white/90 leading-relaxed">
                Harvesting Digital Solutions for Agriculture
            </p>
        </div>
    </div>
    
    <!-- Decorative wave -->
    <div class="absolute -bottom-1 left-0 right-0">
        <svg viewBox="0 0 1440 120" fill="none" class="w-full">
            <path d="M0 0L60 10C120 20 240 40 360 46.7C480 53 600 47 720 43.3C840 40 960 40 1080 46.7C1200 53 1320 67 1380 73.3L1440 80V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0V0Z" fill="#f9fafb"/>
        </svg>
    </div>
</section>

<!-- Introduction Section -->
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="text-center mb-12">
                <div class="inline-block bg-lime-100 text-lime-700 px-6 py-2 rounded-full text-sm font-bold mb-4">
                    Our Mission
                </div>
                <h2 class="text-5xl font-black text-gray-900 mb-6">Empowering Sri Lankan Farmers</h2>
            </div>
            
            <div class="prose prose-lg max-w-none">
                <p class="text-lg text-gray-700 mb-6 leading-relaxed">
                    LankaGro is an innovative agricultural platform developed to support and empower farmers across Sri Lanka by providing a centralized digital hub for agricultural resources. We streamline access to vital information, tools, and services, enhancing productivity and knowledge for the agricultural community.
                </p>
                <p class="text-lg text-gray-700 leading-relaxed">
                    Our platform aims to bridge the gap between fragmented agricultural resources and provide farmers with the integrated tools they need for effective farm management, financial planning, and market access.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Problem & Solution Section -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-5xl font-black text-gray-900 mb-4">Why LankaGro?</h2>
            <p class="text-gray-600 text-lg">Addressing the core challenges facing modern agriculture</p>
        </div>
        
        <div class="grid md:grid-cols-2 gap-10">
            <!-- Challenge -->
            <div class="bg-white p-10 rounded-3xl shadow-xl border-l-4 border-red-500">
                <div class="bg-red-100 w-16 h-16 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-black text-gray-900 mb-6">The Challenge</h3>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <span class="shrink-0 w-6 h-6 bg-red-100 rounded-full flex items-center justify-center mr-3 mt-0.5">
                            <span class="text-red-600 text-sm font-bold">✕</span>
                        </span>
                        <span class="text-gray-700">Fragmented agricultural information sources</span>
                    </li>
                    <li class="flex items-start">
                        <span class="shrink-0 w-6 h-6 bg-red-100 rounded-full flex items-center justify-center mr-3 mt-0.5">
                            <span class="text-red-600 text-sm font-bold">✕</span>
                        </span>
                        <span class="text-gray-700">Lack of integrated farm management tools</span>
                    </li>
                    <li class="flex items-start">
                        <span class="shrink-0 w-6 h-6 bg-red-100 rounded-full flex items-center justify-center mr-3 mt-0.5">
                            <span class="text-red-600 text-sm font-bold">✕</span>
                        </span>
                        <span class="text-gray-700">Limited access to timely expert advice</span>
                    </li>
                    <li class="flex items-start">
                        <span class="shrink-0 w-6 h-6 bg-red-100 rounded-full flex items-center justify-center mr-3 mt-0.5">
                            <span class="text-red-600 text-sm font-bold">✕</span>
                        </span>
                        <span class="text-gray-700">Absence of peer-to-peer collaboration platforms</span>
                    </li>
                </ul>
            </div>

            <!-- Solution -->
            <div class="bg-linear-to-br from-lime-50 to-emerald-50 p-10 rounded-3xl shadow-xl border-l-4 border-lime-500">
                <div class="bg-lime-500 w-16 h-16 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-black text-gray-900 mb-6">Our Solution</h3>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <span class="shrink-0 w-6 h-6 bg-lime-500 rounded-full flex items-center justify-center mr-3 mt-0.5">
                            <span class="text-white text-sm font-bold">✓</span>
                        </span>
                        <span class="text-gray-700 font-medium">Centralized digital hub for all resources</span>
                    </li>
                    <li class="flex items-start">
                        <span class="shrink-0 w-6 h-6 bg-lime-500 rounded-full flex items-center justify-center mr-3 mt-0.5">
                            <span class="text-white text-sm font-bold">✓</span>
                        </span>
                        <span class="text-gray-700 font-medium">Comprehensive farm management tools</span>
                    </li>
                    <li class="flex items-start">
                        <span class="shrink-0 w-6 h-6 bg-lime-500 rounded-full flex items-center justify-center mr-3 mt-0.5">
                            <span class="text-white text-sm font-bold">✓</span>
                        </span>
                        <span class="text-gray-700 font-medium">Real-time news and expert advice</span>
                    </li>
                    <li class="flex items-start">
                        <span class="shrink-0 w-6 h-6 bg-lime-500 rounded-full flex items-center justify-center mr-3 mt-0.5">
                            <span class="text-white text-sm font-bold">✓</span>
                        </span>
                        <span class="text-gray-700 font-medium">Community forum for collaboration</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Key Features Section -->
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="text-center mb-16">
            <div class="inline-block bg-lime-100 text-lime-700 px-6 py-2 rounded-full text-sm font-bold mb-4">
                Platform Features
            </div>
            <h2 class="text-5xl font-black text-gray-900 mb-4">Key Features</h2>
            <p class="text-gray-600 text-lg">Everything you need to succeed in modern agriculture</p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="group bg-white p-8 rounded-3xl border-2 border-gray-100 hover:border-lime-300 hover:shadow-xl transition-all transform hover:-translate-y-2">
                <div class="bg-gradient-to-br from-lime-500 to-emerald-500 w-14 h-14 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Real-Time News</h3>
                <p class="text-gray-600 leading-relaxed">Stay updated with the latest agricultural news, market trends, and industry developments.</p>
            </div>

            <div class="group bg-white p-8 rounded-3xl border-2 border-gray-100 hover:border-lime-300 hover:shadow-xl transition-all transform hover:-translate-y-2">
                <div class="bg-gradient-to-br from-lime-500 to-emerald-500 w-14 h-14 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Expert Advice</h3>
                <p class="text-gray-600 leading-relaxed">Access tutorials, research reports, and guidance from agricultural experts.</p>
            </div>

            <div class="group bg-white p-8 rounded-3xl border-2 border-gray-100 hover:border-lime-300 hover:shadow-xl transition-all transform hover:-translate-y-2">
                <div class="bg-gradient-to-br from-lime-500 to-emerald-500 w-14 h-14 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Profit Calculator</h3>
                <p class="text-gray-600 leading-relaxed">Plan your finances and optimize returns with our crop profit calculator.</p>
            </div>

            <div class="group bg-white p-8 rounded-3xl border-2 border-gray-100 hover:border-lime-300 hover:shadow-xl transition-all transform hover:-translate-y-2">
                <div class="bg-gradient-to-br from-lime-500 to-emerald-500 w-14 h-14 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Weather Forecasts</h3>
                <p class="text-gray-600 leading-relaxed">Make informed decisions with accurate weather updates and predictions.</p>
            </div>

            <div class="group bg-white p-8 rounded-3xl border-2 border-gray-100 hover:border-lime-300 hover:shadow-xl transition-all transform hover:-translate-y-2">
                <div class="bg-gradient-to-br from-lime-500 to-emerald-500 w-14 h-14 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Event Management</h3>
                <p class="text-gray-600 leading-relaxed">Register for agricultural events, workshops, and training programs.</p>
            </div>

            <div class="group bg-white p-8 rounded-3xl border-2 border-gray-100 hover:border-lime-300 hover:shadow-xl transition-all transform hover:-translate-y-2">
                <div class="bg-gradient-to-br from-lime-500 to-emerald-500 w-14 h-14 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Community Forum</h3>
                <p class="text-gray-600 leading-relaxed">Connect with fellow farmers, share experiences, and collaborate on solutions.</p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="text-center mb-16">
            <div class="inline-block bg-lime-100 text-lime-700 px-6 py-2 rounded-full text-sm font-bold mb-4">
                Meet the Team
            </div>
            <h2 class="text-5xl font-black text-gray-900 mb-4">Our Team</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                LankaGro is developed by a dedicated team of students committed to supporting Sri Lankan agriculture through innovative digital solutions.
            </p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white p-8 rounded-3xl border-2 border-gray-100 hover:border-lime-300 hover:shadow-lg transition-all text-center">
                <img src="{{ asset('images/chavidya.jpeg') }}"
                  alt="H.C Nawodani"class="w-32 h-32 mx-auto rounded-lg object-cover mb-6 border-4 border-lime-200">
                <p class="font-bold text-gray-900 text-lg mb-1">H.C Nawodani</p>
                <p class="text-gray-600">321433225</p>
            </div>
            
            <div class="bg-white p-8 rounded-3xl border-2 border-gray-100 hover:border-lime-300 hover:shadow-lg transition-all text-center">
                <img src="{{ asset('images/kavindu.jpeg') }}"
                  alt="H.C Nawodani"class="w-32 h-32 mx-auto rounded-lg object-cover mb-6 border-4 border-lime-200">
                <p class="font-bold text-gray-900 text-lg mb-1">W.D.K.I Senavirathna</p>
                <p class="text-gray-600">321428442</p>
            </div>
            <div class="bg-white p-8 rounded-3xl border-2 border-gray-100 hover:border-lime-300 hover:shadow-lg transition-all text-center">
                <img src="{{ asset('images/dilantha.jpeg') }}"
                  alt="H.C Nawodani"class="w-32 h-32 mx-auto rounded-lg object-cover mb-6 border-4 border-lime-200">
                <p class="font-bold text-gray-900 text-lg mb-1">H.M.D.R Heenkenda</p>
                <p class="text-gray-600">321434946</p>
            </div>

        </div>
        
        <div class="bg-gradient-to-br from-lime-50 to-emerald-50 p-10 rounded-3xl text-center border-2 border-lime-200">
            <p class="text-gray-800 text-lg mb-2">
                <span class="font-black">Project Supervisor:</span> W.M.M.S Karunapala
            </p>
            <p class="text-gray-600 font-semibold">EEY4189 - Software Design in Group</p>
        </div>
    </div>
</section>

@endsection