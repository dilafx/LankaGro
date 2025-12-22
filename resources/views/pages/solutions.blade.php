@extends('components.layouts.public')

@section('content')

<div class="py-12 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-green-900">Crop Health & Solutions</h1>
            <p class="mt-4 text-lg text-gray-600">Identify pests, diseases, and nutrient deficiencies to protect your harvest.</p>
        </div>
        {{-- Filter & Search Bar --}}
        <div class="bg-white p-4 rounded-lg shadow-sm mb-8 border border-gray-100">
            <form action="{{ route('solutions') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">

                {{-- Filter by Crop --}}
                <div>
                    <label for="crop" class="block text-sm font-medium text-gray-700 mb-1">Filter by Crop</label>
                    <select name="crop" id="crop" class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 text-sm">
                        <option value="">All Crops</option>
                        @foreach($crops as $crop)
                            <option value="{{ $crop }}" {{ request('crop') == $crop ? 'selected' : '' }}>
                                {{ ucfirst($crop) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Filter by Problem Type --}}
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Problem Type</label>
                    <select name="type" id="type" class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 text-sm">
                        <option value="">All Types</option>
                        @foreach($types as $type)
                            <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>
                                {{ ucfirst($type) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Search Box --}}
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search Keywords</label>
                    <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="e.g. Yellow leaves..." class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 text-sm">
                </div>

                {{-- Submit Buttons --}}
                <div class="flex space-x-2">
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 text-sm font-medium flex-1">
                        Filter
                    </button>
                    @if(request()->anyFilled(['crop', 'type', 'search']))
                        <a href="{{ route('solutions') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 text-sm font-medium">
                            Clear
                        </a>
                    @endif
                </div>
            </form>
        </div>
        {{-- Solutions Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($solutions as $solution)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 flex flex-col h-full">

                    {{-- Image Section --}}
                    <div class="h-48 w-full bg-gray-200 relative">
                        @if($solution->image)
                            <img src="{{ asset($solution->image) }}" alt="{{ $solution->problem_name }}" class="w-full h-full object-cover">
                        @else
                            {{-- Fallback Icon --}}
                            <div class="w-full h-full flex items-center justify-center bg-green-50 text-green-400">
                                <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                            </div>
                        @endif

                        {{-- Badges --}}
                        <div class="absolute top-4 right-4 flex flex-col space-y-2 items-end">
                            <span class="bg-green-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow">
                                {{ $solution->crop_name }}
                            </span>
                            <span class="bg-white/90 backdrop-blur text-gray-800 text-xs font-bold px-3 py-1 rounded-full shadow border border-gray-200">
                                {{ $solution->problem_type }}
                            </span>
                        </div>
                    </div>

                    {{-- Content Section --}}
                    <div class="p-6 flex-1 flex flex-col">
                        <h2 class="text-xl font-bold text-gray-900 mb-2">
                            {{ $solution->problem_name }}
                        </h2>

                        <p class="text-gray-600 mb-4 line-clamp-3 text-sm flex-1">
                            {{ $solution->description }}
                        </p>

                        <a href="{{ route('solutions.show', $solution->id) }}" class="mt-4 inline-flex justify-center items-center w-full px-4 py-2 border border-transparent text-sm font-medium rounded-md text-green-700 bg-green-100 hover:bg-green-200 focus:outline-none transition-colors">
                            View Solution
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-1 md:col-span-3 text-center py-12">
                    <p class="text-gray-500">No crop solutions found yet.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

@endsection
