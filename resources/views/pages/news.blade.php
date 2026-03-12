@extends('components.layouts.public')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-lime-600 via-lime-500 to-emerald-500 text-white py-24 overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_50%,rgba(255,255,255,0.1)_0%,transparent_50%)]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_80%,rgba(255,255,255,0.1)_0%,transparent_50%)]"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-5xl md:text-6xl font-black mb-6 leading-tight">Latest Agricultural News</h1>
                <p class="text-xl text-white/90 leading-relaxed max-w-2xl mx-auto">
                    Updates and insights from LankaGro.
                </p>
            </div>
        </div>

        <!-- Decorative elements -->
        <div class="absolute -bottom-1 left-0 right-0">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
                <path
                    d="M0 0L60 10C120 20 240 40 360 46.7C480 53 600 47 720 43.3C840 40 960 40 1080 46.7C1200 53 1320 67 1380 73.3L1440 80V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0V0Z"
                    fill="#f9fafb" />
            </svg>
        </div>
    </section>
    <section>
        <div class="py-12 bg-gray-50 min-h-screen">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse ($news as $article)
                        {{-- LINK TO SINGLE VIEW --}}
                        <a href="{{ route('news.show', $article->id) }}" class="group block h-full">

                            <div
                                class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 h-full flex flex-col">
                                {{-- Image --}}
                                <div class="h-48 w-full bg-gray-200 relative overflow-hidden">
                                    @if ($article->image)
                                        <img src="{{ asset($article->image) }}" alt="{{ $article->title }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    @else
                                        <div class="flex items-center justify-center h-full bg-green-100 text-green-600">
                                            <svg class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    @endif
                                    <div
                                        class="absolute top-4 right-4 bg-white/90 backdrop-blur text-xs font-bold px-3 py-1 rounded-full shadow text-green-800">
                                        {{ $article->created_at->format('M d, Y') }}
                                    </div>
                                </div>

                                {{-- Content --}}
                                <div class="p-6 flex-1 flex flex-col">
                                    <h2
                                        class="text-xl font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-green-600 transition-colors">
                                        {{ $article->title }}
                                    </h2>
                                    <p class="text-gray-600 mb-4 line-clamp-3 flex-1">
                                        {{ Str::limit(strip_tags($article->content), 100) }}
                                    </p>
                                    <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between">
                                        <span
                                            class="text-sm font-medium text-gray-900">{{ $article->user->name ?? 'Admin' }}</span>
                                        <span class="text-green-600 text-sm font-semibold flex items-center">
                                            Read Article <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="col-span-3 text-center py-12">
                            <p class="text-gray-500">No news available at the moment.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection
