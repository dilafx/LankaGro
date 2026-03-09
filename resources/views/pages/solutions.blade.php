@extends('components.layouts.public')

@section('content')
    <section
        class="relative bg-linear-to-br from-lime-600 via-lime-500 to-emerald-500 text-white py-24 md:py-32 overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_50%,rgba(255,255,255,0.1)_0%,transparent_50%)]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_80%,rgba(255,255,255,0.1)_0%,transparent_50%)]"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <span
                    class="inline-block py-1 px-3 rounded-full bg-white/20 text-white/90 text-sm font-semibold tracking-wider mb-4 border border-white/20 backdrop-blur-sm">
                    CROP CARE
                </span>
                <h1 class="text-5xl md:text-6xl font-black mb-6 leading-tight drop-shadow-sm">Solutions</h1>
                <p class="text-xl md:text-2xl text-white/90 leading-relaxed max-w-2xl mx-auto font-medium">
                    Practical guidance to solve real agricultural challenges.
                </p>
            </div>
        </div>

        <div class="absolute -bottom-1 left-0 right-0">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="w-full text-gray-50 drop-shadow-sm">
                <path
                    d="M0 0L60 10C120 20 240 40 360 46.7C480 53 600 47 720 43.3C840 40 960 40 1080 46.7C1200 53 1320 67 1380 73.3L1440 80V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0V0Z"
                    fill="currentColor" />
            </svg>
        </div>
    </section>

    <div class="bg-gray-50 pt-12 pb-24 min-h-screen">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">

            {{-- Header --}}
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">Crop Health & Solutions</h2>
                <div class="w-24 h-1.5 bg-lime-500 mx-auto mt-6 rounded-full"></div>
                <p class="mt-6 text-lg text-gray-600 max-w-2xl mx-auto">Identify pests, diseases, and nutrient deficiencies
                    to protect your harvest.</p>
            </div>

            {{-- Premium Filter & Search Bar --}}
            <div class="bg-white p-6 md:p-8 rounded-3xl shadow-sm border border-gray-100 mb-12 relative z-20">
                <form action="{{ route('solutions') }}" method="GET" class="flex flex-col md:flex-row gap-5 items-end">

                    {{-- Filter by Crop --}}
                    <div class="w-full md:w-1/4">
                        <label for="crop" class="block text-sm font-semibold text-gray-700 mb-2">Filter by Crop</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <select name="crop" id="crop"
                                class="w-full pl-11 pr-10 py-3 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-lime-500 focus:ring-2 focus:ring-lime-200 transition-colors text-sm appearance-none cursor-pointer">
                                <option value="">All Crops</option>
                                @foreach ($crops as $crop)
                                    <option value="{{ $crop }}" {{ request('crop') == $crop ? 'selected' : '' }}>
                                        {{ ucfirst($crop) }}
                                    </option>
                                @endforeach
                            </select>
                            {{-- Custom Dropdown Arrow --}}
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- Filter by Problem Type --}}
                    <div class="w-full md:w-1/4">
                        <label for="type" class="block text-sm font-semibold text-gray-700 mb-2">Problem Type</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                    </path>
                                </svg>
                            </div>
                            <select name="type" id="type"
                                class="w-full pl-11 pr-10 py-3 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-lime-500 focus:ring-2 focus:ring-lime-200 transition-colors text-sm appearance-none cursor-pointer">
                                <option value="">All Types</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>
                                        {{ ucfirst($type) }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- Search Box --}}
                    <div class="w-full md:w-2/4">
                        <label for="search" class="block text-sm font-semibold text-gray-700 mb-2">Search Keywords</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" name="search" id="search" value="{{ request('search') }}"
                                placeholder="e.g. Yellow leaves on rice..."
                                class="w-full pl-11 pr-4 py-3 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-lime-500 focus:ring-2 focus:ring-lime-200 transition-colors text-sm">
                        </div>
                    </div>

                    {{-- Submit Buttons --}}
                    <div class="w-full md:w-auto flex flex-row gap-3 shrink-0">
                        <button type="submit"
                            class="flex-1 md:flex-none flex items-center justify-center gap-2 bg-lime-600 text-white px-6 py-3 rounded-xl hover:bg-lime-700 hover:shadow-md shadow-lime-500/30 text-sm font-bold transition-all focus:ring-2 focus:ring-offset-2 focus:ring-lime-500">
                            Search
                        </button>

                        @if (request()->anyFilled(['crop', 'type', 'search']))
                            <a href="{{ route('solutions') }}"
                                class="flex items-center justify-center bg-gray-100 text-gray-600 px-5 py-3 rounded-xl hover:bg-gray-200 text-sm font-bold transition-all">
                                Clear
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            {{-- Solutions Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($solutions as $solution)
                    <div
                        class="group bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:border-lime-200 transition-all duration-300 flex flex-col h-full transform hover:-translate-y-1">

                        {{-- Image Section --}}
                        <div class="h-52 w-full bg-gray-100 relative overflow-hidden">
                            @if ($solution->image)
                                <img src="{{ asset($solution->image) }}" alt="{{ $solution->problem_name }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            @else
                                {{-- Fallback Icon --}}
                                <div
                                    class="w-full h-full flex items-center justify-center bg-lime-50 text-lime-300 group-hover:scale-105 transition-transform duration-700">
                                    <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                                        </path>
                                    </svg>
                                </div>
                            @endif

                            {{-- Badges --}}
                            <div class="absolute top-4 right-4 flex flex-col space-y-2 items-end z-10">
                                <span
                                    class="bg-lime-600/95 backdrop-blur-sm text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-sm">
                                    {{ $solution->crop_name }}
                                </span>
                                <span
                                    class="bg-white/95 backdrop-blur-sm text-gray-800 text-xs font-bold px-3 py-1.5 rounded-full shadow-sm border border-white/20">
                                    {{ $solution->problem_type }}
                                </span>
                            </div>

                            {{-- Dark Gradient Overlay for better contrast --}}
                            <div class="absolute inset-0 bg-linear-to-t from-black/20 to-transparent"></div>
                        </div>

                        {{-- Content Section --}}
                        <div class="p-6 flex-1 flex flex-col">
                            <h2
                                class="text-xl font-bold text-gray-900 mb-3 group-hover:text-lime-700 transition-colors leading-tight">
                                {{ $solution->problem_name }}
                            </h2>

                            <p class="text-gray-600 mb-6 line-clamp-3 text-sm flex-1 leading-relaxed">
                                {{ $solution->description }}
                            </p>

                            <a href="{{ route('solutions.show', $solution->id) }}"
                                class="mt-auto inline-flex justify-center items-center gap-2 w-full px-4 py-2.5 border border-transparent text-sm font-bold rounded-xl text-lime-700 bg-lime-50 hover:bg-lime-100 group-hover:bg-lime-600 group-hover:text-white transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500">
                                View Solution
                                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @empty
                    {{-- Empty State --}}
                    <div
                        class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-20 bg-white rounded-3xl border border-dashed border-gray-300">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 mb-4">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">No solutions found</h3>
                        <p class="text-gray-500 max-w-sm mx-auto">We couldn't find any crop solutions matching your search
                            criteria. Try adjusting your filters.</p>

                        @if (request()->anyFilled(['crop', 'type', 'search']))
                            <a href="{{ route('solutions') }}"
                                class="mt-6 inline-flex text-lime-600 font-semibold hover:text-lime-700">
                                Clear all filters
                            </a>
                        @endif
                    </div>
                @endforelse
            </div>

        </div>
    </div>
@endsection
