@extends('components.layouts.public')

@section('content')

<div class="py-12 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-green-900">Latest Agricultural News</h1>
            <p class="mt-4 text-lg text-gray-600">Updates and insights from LankaGro.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($news as $article)
                {{-- LINK TO SINGLE VIEW --}}
                <a href="{{ route('news.show', $article->id) }}" class="group block h-full">

                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 h-full flex flex-col">
                        {{-- Image --}}
                        <div class="h-48 w-full bg-gray-200 relative overflow-hidden">
                            @if($article->image)
                                <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="flex items-center justify-center h-full bg-green-100 text-green-600">
                                    <svg class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                </div>
                            @endif
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur text-xs font-bold px-3 py-1 rounded-full shadow text-green-800">
                                {{ $article->created_at->format('M d, Y') }}
                            </div>
                        </div>

                        {{-- Content --}}
                        <div class="p-6 flex-1 flex flex-col">
                            <h2 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-green-600 transition-colors">
                                {{ $article->title }}
                            </h2>
                            <p class="text-gray-600 mb-4 line-clamp-3 flex-1">
                                {{ Str::limit(strip_tags($article->content), 100) }}
                            </p>
                            <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between">
                                <span class="text-sm font-medium text-gray-900">{{ $article->user->name ?? 'Admin' }}</span>
                                <span class="text-green-600 text-sm font-semibold flex items-center">
                                    Read Article <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
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
@endsection
