@extends('components.layouts.public')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-lime-600 via-lime-500 to-emerald-500 text-white py-24 overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_50%,rgba(255,255,255,0.1)_0%,transparent_50%)]"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_80%,rgba(255,255,255,0.1)_0%,transparent_50%)]"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-5xl md:text-6xl font-black mb-6 leading-tight">Events</h1>
            <p class="text-xl text-white/90 leading-relaxed max-w-2xl mx-auto">
                Learn, connect, and grow through agricultural events.
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

        {{-- Header --}}
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-green-900">Upcoming Agricultural Events</h1>
            <p class="mt-4 text-lg text-gray-600">Workshops, training sessions, and community gatherings.</p>
        </div>

        {{-- Events List --}}
        <div class="space-y-8">
            @forelse ($events as $event)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 flex flex-col md:flex-row">

                    {{-- Date Box (Left Side) --}}
                    <div class="md:w-48 bg-green-600 text-white flex flex-col items-center justify-center p-6 text-center shrink-0">
                        <span class="text-3xl font-bold">{{ $event->start_time->format('d') }}</span>
                        <span class="text-xl font-medium uppercase">{{ $event->start_time->format('M') }}</span>
                        <span class="text-green-200 mt-1">{{ $event->start_time->format('Y') }}</span>
                    </div>

                    {{-- Image (Optional Middle) --}}
                    @if($event->image)
                        <div class="md:w-64 h-48 md:h-auto relative">
                             <img src="{{ asset($event->image) }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
                        </div>
                    @endif

                    {{-- Content (Right Side) --}}
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center text-sm text-gray-500 mb-2 space-x-4">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    {{ $event->start_time->format('h:i A') }} - {{ $event->end_time->format('h:i A') }}
                                </span>
                                @if($event->location)
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        {{ $event->location }}
                                    </span>
                                @endif
                            </div>

                            <h2 class="text-2xl font-bold text-gray-900 mb-2">
                                <a href="{{ route('events.show', $event->id) }}" class="hover:text-green-600 transition-colors">
                                    {{ $event->title }}
                                </a>
                            </h2>
                            <p class="text-gray-600 line-clamp-2">{{ $event->description }}</p>
                        </div>

                        <div class="mt-4 pt-4 border-t border-gray-100 flex justify-between items-center">
                            <span class="text-sm text-gray-500">
                                {{ $event->capacity ? $event->capacity . ' seats available' : 'Open for all' }}
                            </span>
                            <a href="{{ route('events.show', $event->id) }}" class="text-green-600 font-semibold hover:text-green-800 text-sm">
                                View Details &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-12">
                    <p class="text-gray-500 text-lg">No upcoming events scheduled at the moment.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

@endsection
