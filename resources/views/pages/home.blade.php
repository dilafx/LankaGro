{{-- resources/views/pages/home.blade.php --}}

@extends('components.layouts.public')

@section('content')
    {{-- Hero Section with Image Slider --}}
    <section class="relative h-[700px] overflow-hidden">
        <!-- Image Slider -->
        <div class="absolute inset-0 hero-slider">
            <div class="slide active">
                <img src="{{ asset('images/home1.avif') }}" alt="Rice farming" class="w-full h-full object-cover">
            </div>
            <div class="slide">
                <img src="{{ asset('images/home2.jpg') }}" alt="Tea plantation" class="w-full h-full object-cover">
            </div>
            <div class="slide">
                <img src="{{ asset('images/home3.jpg') }}" alt="Coconut farming" class="w-full h-full object-cover">
            </div>
            <div class="slide">
                <img src="{{ asset('images/home4.jpg') }}" alt="Farmer" class="w-full h-full object-cover">
            </div>
        </div>
        
        <!-- Gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-lime-900/80 via-lime-800/50 to-emerald-900/60"></div>
        
        <!-- Content -->
        <div class="absolute inset-0 flex items-center justify-center z-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-5xl md:text-7xl font-black mb-8 leading-tight text-white drop-shadow-2xl">
                    Harvesting Digital Solutions<br>for Agriculture
                </h1>
                <p class="text-xl md:text-2xl mb-12 text-white max-w-3xl mx-auto leading-relaxed drop-shadow-lg">
                    Empowering Sri Lankan farmers with centralized resources, expert advice, and modern tools for smarter farming
                </p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center">
                    <a href="{{ route('about') }}" class="group bg-white text-lime-700 px-10 py-5 rounded-2xl font-bold text-lg hover:bg-gray-50 transition-all shadow-2xl hover:shadow-3xl transform hover:-translate-y-2 inline-flex items-center justify-center">
                        <span>Explore Platform</span>
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                    <a href="{{ route('tutorial') }}" class="group bg-lime-600 text-white px-10 py-5 rounded-2xl font-bold text-lg hover:bg-lime-700 transition-all shadow-2xl hover:shadow-3xl transform hover:-translate-y-2 border-2 border-white/30 inline-flex items-center justify-center backdrop-blur-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>View Tutorials</span>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Slider Navigation Dots -->
        <div class="absolute bottom-12 left-1/2 transform -translate-x-1/2 z-20 flex gap-3">
            <button class="slider-dot active" data-slide="0"></button>
            <button class="slider-dot" data-slide="1"></button>
            <button class="slider-dot" data-slide="2"></button>
            <button class="slider-dot" data-slide="3"></button>
        </div>
    </section>

    <style>
        .hero-slider .slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
        }
        
        .hero-slider .slide.active {
            opacity: 1;
        }
        
        .slider-dot {
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            border: 2px solid rgba(255,255,255,0.5);
            cursor: pointer;
            transition: all 0.4s ease;
        }
        
        .slider-dot.active {
            background: white;
            width: 48px;
            border-radius: 8px;
            border-color: white;
            box-shadow: 0 4px 16px rgba(255,255,255,0.4);
        }
        
        .slider-dot:hover {
            background: rgba(255,255,255,0.7);
            transform: scale(1.1);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.hero-slider .slide');
            const dots = document.querySelectorAll('.slider-dot');
            let currentSlide = 0;
            
            function showSlide(index) {
                slides.forEach(slide => slide.classList.remove('active'));
                dots.forEach(dot => dot.classList.remove('active'));
                
                slides[index].classList.add('active');
                dots[index].classList.add('active');
                currentSlide = index;
            }
            
            // Auto-advance slides every 5 seconds
            setInterval(() => {
                currentSlide = (currentSlide + 1) % slides.length;
                showSlide(currentSlide);
            }, 5000);
            
            // Manual navigation with dots
            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    showSlide(index);
                });
            });
        });
    </script>

    {{-- Main Content --}}
    <main class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-24">

            {{-- Section 1: Welcome Message --}}
            <section class="text-center">
                <h2 class="text-5xl font-black mb-8 bg-gradient-to-r from-lime-600 to-emerald-600 bg-clip-text text-lime">
                    Welcome to LankaGro
                </h2>
                <p class="text-gray-700 text-xl max-w-4xl mx-auto leading-relaxed">
                    LankaGro is a comprehensive digital platform designed to empower Sri Lankan farmers with tutorials,
                    crop management advice, real-time news, weather forecasts, and powerful tools to maximize productivity and profitability.
                </p>
            </section>

            {{-- Quick Stats Section --}}
            <section class="bg-gradient-to-br from-lime-50 to-emerald-50 rounded-3xl p-12 md:p-16 border border-lime-100 shadow-xl">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-10 text-center">
                    <div class="group">
                        <img src="{{ asset('images/farmer.jpg') }}"alt="Farmers"class="w-32 h-32 mx-auto rounded-lg object-cover mb-6 border-4 border-lime-200">
                        <div class="text-5xl font-black bg-gradient-to-br from-lime-600 to-emerald-600 bg-clip-text text-transparent mb-3 group-hover:scale-110 transition-transform">1000+</div>
                        <div class="text-gray-700 font-semibold">Farmers Connected</div>
                    </div>
                    <div class="group">
                        <img src="{{ asset('images/tutorial.jpg') }}"alt="Farmers"class="w-32 h-32 mx-auto rounded-lg object-cover mb-6 border-4 border-lime-200">
                        <div class="text-5xl font-black bg-gradient-to-br from-lime-600 to-emerald-600 bg-clip-text text-transparent mb-3 group-hover:scale-110 transition-transform">50+</div>
                        <div class="text-gray-700 font-semibold">Expert Tutorials</div>
                    </div>
                    <div class="group">
                        <img src="{{ asset('images/access.webp') }}"alt="Farmers"class="w-32 h-32 mx-auto rounded-lg object-cover mb-6 border-4 border-lime-200">
                        <div class="text-5xl font-black bg-gradient-to-br from-lime-600 to-emerald-600 bg-clip-text text-transparent mb-3 group-hover:scale-110 transition-transform">24/7</div>
                        <div class="text-gray-700 font-semibold">Platform Access</div>
                    </div>
                    <div class="group">
                        <img src="{{ asset('images/free.png') }}"alt="Farmers"class="w-32 h-32 mx-auto rounded-lg object-cover mb-6 border-4 border-lime-200">
                        <div class="text-5xl font-black bg-gradient-to-br from-lime-600 to-emerald-600 bg-clip-text text-transparent mb-3 group-hover:scale-110 transition-transform">100%</div>
                        <div class="text-gray-700 font-semibold">Free to Use</div>
                    </div>
                </div>
            </section>

            {{-- Section 2: Key Features --}}
            <section id="features">
                <div class="text-center mb-16">
    
                    <h2 class="text-5xl font-black mb-6 bg-gradient-to-r from-lime-600 to-emerald-600 bg-clip-text text-black">
                        Platform Features
                    </h2>
                    <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                        Comprehensive tools and resources to transform your agricultural journey
                    </p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    
                    <div class="group bg-white p-10 shadow-xl rounded-3xl hover:shadow-2xl transition-all border-2 border-gray-100 hover:border-lime-300 transform hover:-translate-y-2">
                        <div class="bg-gradient-to-br from-lime-100 to-emerald-100 w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8 text-lime-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <h3 class="font-black text-2xl mb-4 text-gray-900">Expert Tutorials</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">Access comprehensive guides and video tutorials from agricultural experts</p>
                        <a href="{{ route('tutorial') }}" class="text-lime-600 font-bold hover:text-lime-700 inline-flex items-center group">
                            <span>Learn More</span>
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>

                    <div class="group bg-white p-10 shadow-xl rounded-3xl hover:shadow-2xl transition-all border-2 border-gray-100 hover:border-blue-300 transform hover:-translate-y-2">
                        <div class="bg-gradient-to-br from-blue-100 to-blue-200 w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                        </div>
                        <h3 class="font-black text-2xl mb-4 text-gray-900">Latest News</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">Stay updated with agricultural news, market trends, and industry developments</p>
                        <a href="{{ route('news') }}" class="text-blue-600 font-bold hover:text-blue-700 inline-flex items-center group">
                            <span>Read News</span>
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>

                    <div class="group bg-white p-10 shadow-xl rounded-3xl hover:shadow-2xl transition-all border-2 border-gray-100 hover:border-yellow-300 transform hover:-translate-y-2">
                        <div class="bg-gradient-to-br from-yellow-100 to-yellow-200 w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="font-black text-2xl mb-4 text-gray-900">Profit Calculator</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">Calculate potential profits and plan your crops with our smart calculator</p>
                        <a href="{{ route('calculator') }}" class="text-yellow-600 font-bold hover:text-yellow-700 inline-flex items-center group">
                            <span>Calculate Now</span>
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>

                    <div class="group bg-white p-10 shadow-xl rounded-3xl hover:shadow-2xl transition-all border-2 border-gray-100 hover:border-purple-300 transform hover:-translate-y-2">
                        <div class="bg-gradient-to-br from-purple-100 to-purple-200 w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="font-black text-2xl mb-4 text-gray-900">Events & Workshops</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">Register for agricultural events, training programs, and workshops</p>
                        <a href="{{ route('events') }}" class="text-purple-600 font-bold hover:text-purple-700 inline-flex items-center group">
                            <span>View Events</span>
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>

                    <div class="group bg-white p-10 shadow-xl rounded-3xl hover:shadow-2xl transition-all border-2 border-gray-100 hover:border-orange-300 transform hover:-translate-y-2">
                        <div class="bg-gradient-to-br from-orange-100 to-orange-200 w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                        </div>
                        <h3 class="font-black text-2xl mb-4 text-gray-900">Crop Solutions</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">Find solutions for pest control, disease management, and crop optimization</p>
                        <a href="{{ route('solutions') }}" class="text-orange-600 font-bold hover:text-orange-700 inline-flex items-center group">
                            <span>Get Solutions</span>
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>

                    <div class="group bg-white p-10 shadow-xl rounded-3xl hover:shadow-2xl transition-all border-2 border-gray-100 hover:border-teal-300 transform hover:-translate-y-2">
                        <div class="bg-gradient-to-br from-teal-100 to-teal-200 w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 class="font-black text-2xl mb-4 text-gray-900">Community Forum</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">Connect with fellow farmers, share experiences, and collaborate</p>
                        <span class="text-teal-600 font-bold">Coming Soon</span>
                    </div>

                </div>
            </section>

            {{-- Section 3: Featured Crops --}}
            <section>
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-black mb-6 bg-gradient-to-r from-lime-600 to-emerald-600 bg-clip-text text-blaack">
                        Featured Crops
                    </h2>
                    <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                        Specialized guidance for Sri Lanka's most important agricultural products
                    </p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    <div class="group bg-white shadow-2xl rounded-3xl overflow-hidden hover:shadow-3xl transition-all transform hover:-translate-y-2 border-2 border-gray-100">
                        <div class="relative h-72 overflow-hidden">
                            <img src="{{ asset('images/Rice.webp') }}" alt="Rice" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute top-6 right-6 bg-lime-600 text-white px-5 py-2 rounded-full text-sm font-bold shadow-lg">
                                Popular
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        </div>
                        <div class="p-8">
                            <h3 class="font-black text-3xl mb-4 text-gray-900">Rice</h3>
                            <p class="text-gray-600 mb-6 leading-relaxed">Learn the best techniques to improve yield efficiently with modern cultivation methods.</p>
                            <a href="{{ route('solutions') }}" class="inline-block bg-gradient-to-r from-lime-600 to-emerald-600 text-white px-8 py-4 rounded-2xl font-bold hover:from-lime-700 hover:to-emerald-700 transition-all transform hover:-translate-y-1 hover:shadow-xl">
                                Learn More
                            </a>
                        </div>
                    </div>

                    <div class="group bg-white shadow-2xl rounded-3xl overflow-hidden hover:shadow-3xl transition-all transform hover:-translate-y-2 border-2 border-gray-100">
                        <div class="relative h-72 overflow-hidden">
                            <img src="{{ asset('images/Tea.jpg') }}" alt="Tea" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute top-6 right-6 bg-emerald-600 text-white px-5 py-2 rounded-full text-sm font-bold shadow-lg">
                                Export Crop
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        </div>
                        <div class="p-8">
                            <h3 class="font-black text-3xl mb-4 text-gray-900">Tea</h3>
                            <p class="text-gray-600 mb-6 leading-relaxed">Discover tips for premium quality tea cultivation and enhance your export potential.</p>
                            <a href="{{ route('solutions') }}" class="inline-block bg-gradient-to-r from-lime-600 to-emerald-600 text-white px-8 py-4 rounded-2xl font-bold hover:from-lime-700 hover:to-emerald-700 transition-all transform hover:-translate-y-1 hover:shadow-xl">
                                Learn More
                            </a>
                        </div>
                    </div>

                    <div class="group bg-white shadow-2xl rounded-3xl overflow-hidden hover:shadow-3xl transition-all transform hover:-translate-y-2 border-2 border-gray-100">
                        <div class="relative h-72 overflow-hidden">
                            <img src="{{ asset('images/coconut.jpg') }}" alt="Coconut" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute top-6 right-6 bg-yellow-600 text-white px-5 py-2 rounded-full text-sm font-bold shadow-lg">
                                High Value
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        </div>
                        <div class="p-8">
                            <h3 class="font-black text-3xl mb-4 text-gray-900">Coconut</h3>
                            <p class="text-gray-600 mb-6 leading-relaxed">Optimize your coconut farming practices for better profit and sustainable growth.</p>
                            <a href="{{ route('solutions') }}" class="inline-block bg-gradient-to-r from-lime-600 to-emerald-600 text-white px-8 py-4 rounded-2xl font-bold hover:from-lime-700 hover:to-emerald-700 transition-all transform hover:-translate-y-1 hover:shadow-xl">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Section 4: About Section --}}
            <section class="bg-white rounded-3xl shadow-2xl overflow-hidden border-2 border-gray-100">
                <div class="lg:flex lg:items-center">
                    <div class="lg:w-1/2">
                        <img src="{{ asset('images/paddy.jpg') }}" alt="Farmer" class="w-full h-full object-cover" style="min-height: 500px;">
                    </div>
                    <div class="lg:w-1/2 p-10 lg:p-16">
                        <h2 class="text-4xl font-black mb-6 bg-gradient-to-r from-lime-600 to-emerald-600 bg-clip-text text-black">
                            Empowering Sri Lankan Farmers
                        </h2>
                        <p class="text-gray-700 mb-6 text-lg leading-relaxed">
                            LankaGro consolidates valuable agricultural information and resources into one accessible platform,
                            helping farmers make informed decisions and improve productivity sustainably.
                        </p>
                        <p class="text-gray-700 mb-8 leading-relaxed">
                            Our mission is to bridge the gap between traditional farming knowledge and modern agricultural technology,
                            creating a thriving community of informed and successful farmers.
                        </p>
                        <div class="flex flex-wrap gap-4">
                            <a href="{{ route('about') }}" class="bg-white text-lime-700 px-8 py-4 rounded-2xl hover:bg-lime-50 transition-all font-bold border-2 border-lime-600 hover:border-lime-700 transform hover:-translate-y-1 hover:shadow-xl">
                                Learn More About Us
                            </a>
                            <a href="{{ route('contact') }}" class="bg-white text-lime-700 px-8 py-4 rounded-2xl hover:bg-lime-50 transition-all font-bold border-2 border-lime-600 hover:border-lime-700 transform hover:-translate-y-1 hover:shadow-xl">
                                Contact Us
                            </a>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>

@endsection