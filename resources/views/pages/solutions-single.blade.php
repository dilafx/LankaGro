@extends('components.layouts.public')

@section('content')

<div class="py-12 bg-white min-h-screen">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

        {{-- Navigation --}}
        <div class="mb-6">
            <a href="{{ route('solutions') }}" class="inline-flex items-center text-green-600 hover:text-green-800 font-medium">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Solutions
            </a>
        </div>

        {{-- Main Content --}}
        <div class="bg-white overflow-hidden">

            {{-- Header Info --}}
            <div class="border-b pb-6 mb-6">
                <div class="flex items-center space-x-4 mb-4">
                    <span class="px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-800 border border-green-200">
                        {{ $solution->crop_name }}
                    </span>
                    <span class="px-3 py-1 rounded-full text-sm font-semibold bg-red-100 text-red-800 border border-red-200">
                        {{ $solution->problem_type }}
                    </span>
                </div>
                <h1 class="text-4xl font-bold text-gray-900">{{ $solution->problem_name }}</h1>
            </div>

            {{-- Image & Description Layout --}}
            <div class="md:flex md:space-x-8 mb-8">
                @if($solution->image)
                    <div class="md:w-1/2 mb-6 md:mb-0">
                        <img src="{{ asset($solution->image) }}" alt="{{ $solution->problem_name }}" class="rounded-lg shadow-lg w-full object-cover">
                    </div>
                @endif

                <div class="{{ $solution->image ? 'md:w-1/2' : 'w-full' }}">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Description / Symptoms</h3>
                    <p class="text-gray-700 leading-relaxed mb-4 text-lg">
                        {{ $solution->description }}
                    </p>
                    <div class="text-sm text-gray-500 mt-4 pt-4 border-t">
                        Posted by {{ $solution->user->name ?? 'LankaGro Expert' }} on {{ $solution->created_at->format('M d, Y') }}
                    </div>
                </div>
            </div>

            {{-- Solution Steps --}}
            <div class="bg-green-50 rounded-xl p-8 border border-green-100">
                <h3 class="text-2xl font-bold text-green-900 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Treatment & Control
                </h3>
                <div class="prose prose-lg prose-green max-w-none text-gray-800">
                    {!! nl2br(e($solution->solution_text)) !!}
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
