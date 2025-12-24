@extends('components.layouts.public')

@section('content')

<div class="py-12 bg-white min-h-screen">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

        {{-- Back Link --}}
        <div class="mb-8">
            <a href="{{ route('events') }}" class="inline-flex items-center text-green-600 hover:text-green-800">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to All Events
            </a>
        </div>

        {{-- Hero Image --}}
        @if($event->image)
            <div class="rounded-2xl overflow-hidden shadow-lg mb-10 h-64 md:h-96 w-full">
                <img src="{{ asset($event->image) }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
            </div>
        @endif

        <div class="flex flex-col md:flex-row gap-8">
            {{-- Main Content --}}
            <div class="md:w-2/3">
                <h1 class="text-4xl font-bold text-gray-900 mb-6">{{ $event->title }}</h1>
                <div class="prose prose-lg prose-green text-gray-700">
                    {!! nl2br(e($event->description)) !!}
                </div>
            </div>

            {{-- Sidebar Info --}}
            <div class="md:w-1/3">
                <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 sticky top-8">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 border-b pb-2">Event Details</h3>

                    <div class="space-y-4">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-green-600 mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <div>
                                <p class="text-sm font-semibold text-gray-500">Date</p>
                                <p class="text-gray-900">{{ $event->start_time->format('l, F j, Y') }}</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-green-600 mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <div>
                                <p class="text-sm font-semibold text-gray-500">Time</p>
                                <p class="text-gray-900">{{ $event->start_time->format('h:i A') }} - {{ $event->end_time->format('h:i A') }}</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-green-600 mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <div>
                                <p class="text-sm font-semibold text-gray-500">Location</p>
                                <p class="text-gray-900">{{ $event->location ?? 'Online / TBD' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <button class="w-full bg-green-600 text-white font-bold py-3 px-4 rounded-lg hover:bg-green-700 transition shadow-lg">
                            Register Now
                        </button>
                        <p class="text-xs text-center text-gray-500 mt-2">
                            {{ $event->capacity ? "Limited to $event->capacity seats" : "Registration required" }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
