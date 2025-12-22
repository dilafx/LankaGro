@extends('components.layouts.public')

@section('content')

<div class="py-12 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

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
