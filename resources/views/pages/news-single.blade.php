@extends('components.layouts.public')

@section('content')

<div class="py-12 bg-white min-h-screen">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

        {{-- Back Button --}}
        <div class="mb-6">
            <a href="{{ route('news') }}" class="inline-flex items-center text-green-600 hover:text-green-800 font-medium transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to News
            </a>
        </div>

        {{-- Article Header --}}
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-4 leading-tight">{{ $article->title }}</h1>

            <div class="flex items-center text-gray-600 space-x-4 border-b pb-6">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <span>{{ $article->user->name ?? 'LankaGro Team' }}</span>
                </div>
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span>{{ $article->created_at->format('F d, Y') }}</span>
                </div>
            </div>
        </div>

        {{-- Featured Image --}}
        @if($article->image)
            <div class="mb-10 rounded-xl overflow-hidden shadow-lg">
                <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" class="w-full h-auto object-cover max-h-[500px]">
            </div>
        @endif

        {{-- Article Content --}}
        <div class="prose prose-lg prose-green max-w-none text-gray-800">
            {!! nl2br(e($article->content)) !!}
        </div>

    </div>
</div>

@endsection
