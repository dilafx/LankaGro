@extends('components.layouts.public')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-lime-600 via-lime-500 to-emerald-500 text-white py-24 overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_50%,rgba(255,255,255,0.1)_0%,transparent_50%)]"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_80%,rgba(255,255,255,0.1)_0%,transparent_50%)]"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-5xl md:text-6xl font-black mb-6 leading-tight">Contact Us</h1>
            <p class="text-xl text-white/90 leading-relaxed max-w-2xl mx-auto">
                We're here to help you grow. Get in touch with the LankaGro team and let's cultivate success together.
            </p>
        </div>
    </div>
    
    <!-- Decorative elements -->
    <div class="absolute -bottom-1 left-0 right-0">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
            <path d="M0 0L60 10C120 20 240 40 360 46.7C480 53 600 47 720 43.3C840 40 960 40 1080 46.7C1200 53 1320 67 1380 73.3L1440 80V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0V0Z" fill="#f9fafb"/>
        </svg>
    </div>
</section>
<section>
    <!-- Contact Information -->
    <section class="flex justify-center py-16">
        <div class="w-full max-w-4xl px-4">
                <div class="space-y-6">
                    <!-- Contact Details Card -->
                    <div class="bg-white p-10 rounded-2xl shadow-xl border border-gray-100">
                        <h2 class="text-3xl font-black mb-8 bg-gradient-to-r from-lime-600 to-emerald-600 bg-clip-text text-grey-600">
                            Get in Touch
                        </h2>
                        
                        <!-- Email -->
                        <div class="flex items-start mb-8 group cursor-pointer">
                            <div class="bg-gradient-to-br from-lime-50 to-emerald-50 p-4 rounded-xl mr-5 group-hover:from-lime-600 group-hover:to-emerald-600 transition-all">
                                <svg class="w-6 h-6 text-lime-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800 mb-2 text-lg">Email</h3>
                                <p class="text-gray-600 mb-1">info@lankagro.lk</p>
                                <p class="text-gray-600">support@lankagro.lk</p>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="flex items-start mb-8 group cursor-pointer">
                            <div class="bg-gradient-to-br from-lime-50 to-emerald-50 p-4 rounded-xl mr-5 group-hover:from-lime-600 group-hover:to-emerald-600 transition-all">
                                <svg class="w-6 h-6 text-lime-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800 mb-2 text-lg">Phone</h3>
                                <p class="text-gray-600 mb-1">+94 XX XXX XXXX</p>
                                <p class="text-gray-500 text-sm">(Mon-Fri, 8AM-5PM)</p>
                            </div>
                        </div>

                        <!-- Location -->
                        <div class="flex items-start group cursor-pointer">
                            <div class="bg-gradient-to-br from-lime-50 to-emerald-50 p-4 rounded-xl mr-5 group-hover:from-lime-600 group-hover:to-emerald-600 transition-all">
                                <svg class="w-6 h-6 text-lime-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800 mb-2 text-lg">Location</h3>
                                <p class="text-gray-600">Colombo, Sri Lanka</p>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Links Card -->
                    <div class="bg-gradient-to-br from-lime-50 to-emerald-50 p-10 rounded-2xl border border-lime-100">
                        <h3 class="text-2xl font-black text-gray-800 mb-4">Need Help?</h3>
                        <p class="text-gray-700 mb-6 leading-relaxed">Check out these resources:</p>
                        <ul class="space-y-4">
                            <li>
                                <a href="{{ route('tutorial') }}" class="text-lime-700 hover:text-lime-800 flex items-center font-semibold group">
                                    <span class="mr-3 text-2xl group-hover:translate-x-1 transition-transform">→</span>
                                    Tutorials & Guides
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('news') }}" class="text-lime-700 hover:text-lime-800 flex items-center font-semibold group">
                                    <span class="mr-3 text-2xl group-hover:translate-x-1 transition-transform">→</span>
                                    Latest News & Updates
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('events') }}" class="text-lime-700 hover:text-lime-800 flex items-center font-semibold group">
                                    <span class="mr-3 text-2xl group-hover:translate-x-1 transition-transform">→</span>
                                    Upcoming Events
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('about') }}" class="text-lime-700 hover:text-lime-800 flex items-center font-semibold group">
                                    <span class="mr-3 text-2xl group-hover:translate-x-1 transition-transform">→</span>
                                    About LankaGro
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-black mb-4 text-gray-900">Frequently Asked Questions</h2>
                <p class="text-gray-600 text-lg">Quick answers to common questions about LankaGro</p>
            </div>
            
            <div class="space-y-6">
                <!-- FAQ 1 -->
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-8 rounded-2xl border border-gray-200 hover:border-lime-300 transition-all hover:shadow-lg">
                    <h3 class="font-bold text-gray-800 mb-3 text-lg">How to join with the events?</h3>
                    <p class="text-gray-600 leading-relaxed">Visit our platform and click on the event button. Fill in your details to join with the events.</p>
                </div>

                <!-- FAQ 2 -->
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-8 rounded-2xl border border-gray-200 hover:border-lime-300 transition-all hover:shadow-lg">
                    <h3 class="font-bold text-gray-800 mb-3 text-lg">Is LankaGro free to use?</h3>
                    <p class="text-gray-600 leading-relaxed">Yes! LankaGro is completely free for farmers across Sri Lanka. Our mission is to empower the agricultural community with accessible digital tools.</p>
                </div>

                <!-- FAQ 3 -->
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-8 rounded-2xl border border-gray-200 hover:border-lime-300 transition-all hover:shadow-lg">
                    <h3 class="font-bold text-gray-800 mb-3 text-lg">What features are available on the platform?</h3>
                    <p class="text-gray-600 leading-relaxed">LankaGro offers real-time agricultural news, expert advice, tutorials, weather forecasts, a profit calculator, event registration, and a community forum for farmers to connect and share knowledge.</p>
                </div>

                <!-- FAQ 4 -->
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-8 rounded-2xl border border-gray-200 hover:border-lime-300 transition-all hover:shadow-lg">
                    <h3 class="font-bold text-gray-800 mb-3 text-lg">How can I provide feedback or report an issue?</h3>
                    <p class="text-gray-600 leading-relaxed">You can use the contact form above or email us directly at support@lankagro.lk. We value your feedback and aim to respond within 24-48 hours.</p>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection