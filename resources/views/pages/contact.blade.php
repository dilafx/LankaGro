@extends('components.layouts.public')

@section('content')

<div class="bg-gray-50 min-h-screen">

    {{-- Hero / Header Section --}}
    <div class="bg-green-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-bold mb-4">Get in Touch</h1>
            <p class="text-green-100 text-lg max-w-2xl mx-auto">
                Have questions about crop management or need technical support?
                The LankaGro team is here to help you grow.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 -mt-8">
        <div class="bg-white rounded-xl shadow-xl overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2">

                {{-- Left Column: Contact Information --}}
                <div class="bg-green-800 p-10 text-white flex flex-col justify-between">
                    <div>
                        <h2 class="text-2xl font-bold mb-6">Contact Information</h2>
                        <p class="text-green-100 mb-8 leading-relaxed">
                            Fill out the form and our agricultural support team will get back to you within 24 hours.
                        </p>

                        <div class="space-y-6">
                            {{-- Phone --}}
                            <div class="flex items-start space-x-4">
                                <svg class="w-6 h-6 text-green-300 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                <div>
                                    <h3 class="font-semibold text-lg">Phone</h3>
                                    <p class="text-green-100">+94 11 234 5678</p>
                                    <p class="text-green-100">+94 77 123 4567</p>
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="flex items-start space-x-4">
                                <svg class="w-6 h-6 text-green-300 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                <div>
                                    <h3 class="font-semibold text-lg">Email</h3>
                                    <p class="text-green-100">support@lankagro.lk</p>
                                    <p class="text-green-100">info@lankagro.lk</p>
                                </div>
                            </div>

                            {{-- Address --}}
                            <div class="flex items-start space-x-4">
                                <svg class="w-6 h-6 text-green-300 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <div>
                                    <h3 class="font-semibold text-lg">Office</h3>
                                    <p class="text-green-100">
                                        No. 123, Gannoruwa Road,<br>
                                        Peradeniya, Kandy,<br>
                                        Sri Lanka.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Social Media Icons --}}
                    <div class="mt-12 flex space-x-4">
                        <a href="#" class="text-green-300 hover:text-white transition-colors">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                        </a>
                        <a href="#" class="text-green-300 hover:text-white transition-colors">
                            <span class="sr-only">Twitter</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                        </a>
                    </div>
                </div>

                {{-- Right Column: Contact Form --}}
                <div class="bg-white p-10">
                    <form action="#" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                            <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 py-3 px-4 border" placeholder="Your Name">
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                            <input type="email" name="email" id="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 py-3 px-4 border" placeholder="you@example.com">
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                            <select id="subject" name="subject" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 py-3 px-4 border bg-white">
                                <option>General Inquiry</option>
                                <option>Crop Support</option>
                                <option>Technical Issue</option>
                                <option>Partnership</option>
                            </select>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                            <textarea id="message" name="message" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 py-3 px-4 border" placeholder="How can we help you?"></textarea>
                        </div>

                        <button type="button" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors">
                            Send Message
                        </button>
                    </form>
                </div>

            </div>
        </div>

        {{-- Map Section --}}
        <div class="mt-12 bg-white rounded-xl shadow-md p-4 h-96 overflow-hidden relative">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63320.43002226296!2d80.58432368305364!3d7.290571523417743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae366266498acd3%3A0x411a3818a1e03c35!2sKandy!5e0!3m2!1sen!2slk!4v1625633842426!5m2!1sen!2slk"
                width="100%"
                height="100%"
                style="border:0;"
                allowfullscreen=""
                loading="lazy">
            </iframe>
        </div>

    </div>
</div>

@endsection
