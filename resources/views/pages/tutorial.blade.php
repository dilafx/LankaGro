@extends('components.layouts.public')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-lime-600 via-lime-500 to-emerald-500 text-white py-24 overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_50%,rgba(255,255,255,0.1)_0%,transparent_50%)]"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_80%,rgba(255,255,255,0.1)_0%,transparent_50%)]"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-5xl md:text-6xl font-black mb-6 leading-tight">Tutorial</h1>
            <p class="text-xl text-white/90 leading-relaxed max-w-2xl mx-auto">
                Step-by-step learning for better farming.
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
            <h1 class="text-4xl font-bold text-green-900">Agricultural Tutorials</h1>
            <p class="mt-4 text-lg text-gray-600">Master farming techniques with our video lessons and step-by-step guides.</p>
        </div>

        {{-- Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($tutorials as $tutorial)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">

                    {{-- Image Thumb --}}
                    <div class="relative h-48 w-full bg-gray-200 group">
                        @if($tutorial->image)
                            <img src="{{ asset($tutorial->image) }}" alt="{{ $tutorial->title }}" class="w-full h-full object-cover">
                        @else
                            {{-- Fallback Pattern --}}
                            <div class="w-full h-full flex items-center justify-center bg-green-100 text-green-600">
                                <svg class="w-16 h-16 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            </div>
                        @endif

                        {{-- Type Badge (Video vs Text) --}}
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full shadow flex items-center space-x-1">
                            @if($tutorial->content_type === 'video')
                                <svg class="w-4 h-4 text-red-600" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" /></svg>
                                <span class="text-xs font-bold text-gray-800">Video</span>
                            @else
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                <span class="text-xs font-bold text-gray-800">Guide</span>
                            @endif
                        </div>
                    </div>

                    {{-- Content --}}
                    <div class="p-6 flex-1 flex flex-col">
                        <h2 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2">
                            {{ $tutorial->title }}
                        </h2>
                        <p class="text-gray-600 mb-4 line-clamp-3 text-sm flex-1">
                            {{ $tutorial->description }}
                        </p>

                        <a href="{{ route('tutorial.show', $tutorial->id) }}" class="mt-4 block w-full text-center bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition-colors font-semibold">
                            @if($tutorial->content_type === 'video')
                                Watch Video
                            @else
                                Read Guide
                            @endif
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-1 md:col-span-3 text-center py-12">
                    <p class="text-gray-500">No tutorials available yet.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

@endsection
