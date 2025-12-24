@extends('components.layouts.public')

@section('content')

<div class="py-12 bg-white min-h-screen">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

        {{-- Back Link --}}
        <div class="mb-6">
            <a href="{{ route('tutorial') }}" class="inline-flex items-center text-green-600 hover:text-green-800">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Tutorials
            </a>
        </div>

        {{-- Title --}}
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ $tutorial->title }}</h1>
        <p class="text-gray-600 text-lg mb-8">{{ $tutorial->description }}</p>

        {{-- Content Display --}}
        <div class="bg-gray-50 rounded-xl overflow-hidden shadow-sm p-1">

            @if($tutorial->content_type === 'video')
                {{-- Video Player --}}
                <div class="aspect-w-16 aspect-h-9 bg-black rounded-lg overflow-hidden relative" style="padding-top: 56.25%;">
                   @if($tutorial->content_link)
                       <iframe
                           src="{{ str_replace('youtu.be/', 'www.youtube.com/embed/', str_replace('watch?v=', 'embed/', $tutorial->content_link)) }}"
                           class="absolute top-0 left-0 w-full h-full"
                           frameborder="0"
                           allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                           allowfullscreen>
                       </iframe>
                   @else
                       <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center text-white">
                           No video link provided.
                       </div>
                   @endif
                </div>

            @else
                {{-- Text Guide --}}
                <div class="p-6 md:p-8 bg-white rounded-lg">
                    @if($tutorial->image)
                        <img src="{{ asset($tutorial->image) }}" alt="{{ $tutorial->title }}" class="w-full h-64 object-cover rounded-lg mb-8">
                    @endif

                    <div class="prose prose-green max-w-none">
                        {!! nl2br(e($tutorial->content_text)) !!}
                    </div>
                </div>
            @endif

        </div>

        {{-- Metadata --}}
        <div class="mt-8 pt-6 border-t text-sm text-gray-500 flex justify-between">
            <span>By {{ $tutorial->user->name ?? 'LankaGro Team' }}</span>
            <span>{{ $tutorial->created_at->format('F d, Y') }}</span>
        </div>

    </div>
</div>

@endsection
