{{-- resources/views/pages/home.blade.php --}}

@extends('layouts.app')

@section('content')
    {{-- This is your hero image section --}}
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto">
            <img src="{{ asset('images/header.jpg') }}" alt="LankaGro Header" class="w-full h-96 object-cover">
        </div>
    </header>

    {{-- This is the main content section to update --}}
    <main class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6"> {{-- <-- Added space-y-6 for spacing between sections --}}

            {{-- Section 1: Welcome Message --}}

            {{-- Section 2: Call to Action / Features --}}


        </div>
    </main>
@endsection
