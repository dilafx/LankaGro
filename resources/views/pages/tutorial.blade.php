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
                    LEARNING CENTER
                </span>
                <h1 class="text-5xl md:text-6xl font-black mb-6 leading-tight drop-shadow-sm">Tutorials</h1>
                <p class="text-xl md:text-2xl text-white/90 leading-relaxed max-w-2xl mx-auto font-medium">
                    Step-by-step learning for better, more sustainable farming.
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

    <div class="bg-gray-50 pt-16 pb-24 min-h-screen">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">

            {{-- Header --}}
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">Agricultural Tutorials</h2>
                <div class="w-24 h-1.5 bg-lime-500 mx-auto mt-6 rounded-full"></div>
                <p class="mt-6 text-lg text-gray-600 max-w-2xl mx-auto">Master farming techniques with our expert video
                    lessons and detailed step-by-step guides.</p>
            </div>

            {{-- Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($tutorials as $tutorial)
                    <div
                        class="group bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:border-lime-200 transition-all duration-300 flex flex-col h-full transform hover:-translate-y-1">

                        {{-- Image Thumb --}}
                        <div class="relative h-52 w-full bg-gray-200 overflow-hidden">
                            @if ($tutorial->image)
                                <img src="{{ asset($tutorial->image) }}" alt="{{ $tutorial->title }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            @else
                                {{-- Fallback Pattern --}}
                                <div
                                    class="w-full h-full flex items-center justify-center bg-lime-50 text-lime-300 group-hover:scale-105 transition-transform duration-700">
                                    <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                        </path>
                                    </svg>
                                </div>
                            @endif

                            {{-- Dark Gradient Overlay --}}
                            <div
                                class="absolute inset-0 bg-linear-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            </div>

                            {{-- Type Badge (Video vs Text) --}}
                            <div
                                class="absolute top-4 right-4 bg-white/95 backdrop-blur-sm px-3 py-1.5 rounded-full shadow-sm flex items-center space-x-1.5 border border-white/20 z-10">
                                @if ($tutorial->content_type === 'video')
                                    <svg class="w-4 h-4 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" />
                                    </svg>
                                    <span class="text-xs font-bold text-gray-800 uppercase tracking-wide">Video</span>
                                @else
                                    <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                    <span class="text-xs font-bold text-gray-800 uppercase tracking-wide">Guide</span>
                                @endif
                            </div>
                        </div>

                        {{-- Content --}}
                        <div class="p-6 flex-1 flex flex-col">
                            <h2
                                class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 group-hover:text-lime-700 transition-colors leading-tight">
                                {{ $tutorial->title }}
                            </h2>

                            <p class="text-gray-600 mb-6 line-clamp-3 text-sm flex-1 leading-relaxed">
                                {{ $tutorial->description }}
                            </p>

                            <a href="{{ route('tutorial.show', $tutorial->id) }}"
                                class="mt-auto flex justify-center items-center gap-2 w-full px-4 py-2.5 border border-transparent text-sm font-bold rounded-xl text-lime-700 bg-lime-50 hover:bg-lime-100 group-hover:bg-lime-600 group-hover:text-white transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500">
                                @if ($tutorial->content_type === 'video')
                                    Watch Video
                                    <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                @else
                                    Read Guide
                                    <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                @endif
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
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">No tutorials available</h3>
                        <p class="text-gray-500 max-w-sm mx-auto">We are currently preparing new educational content. Please
                            check back later!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
