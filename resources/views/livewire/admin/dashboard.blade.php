<div class="p-4 sm:p-6 min-h-screen w-full bg-gray-50/50 dark:bg-gray-900">

    {{-- Page Header --}}
    <div class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white tracking-tight">Dashboard Overview</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Welcome back. Here is what is happening with
                LankaGro today.</p>
        </div>
    </div>

    {{-- 1. Key Metrics Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6 mb-8">

        {{-- Users --}}
        <div
            class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 flex flex-col justify-between group hover:border-blue-500 transition-colors">
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Total
                        Users</h3>
                    <p class="text-3xl font-black text-gray-900 dark:text-white"></p>
                </div>
                <div class="p-2 bg-blue-50 dark:bg-blue-900/30 rounded-lg text-blue-600 dark:text-blue-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                </div>
            </div>
            <a href="{{ route('user.index') }}" wire:navigate
                class="text-sm text-blue-600 dark:text-blue-400 hover:text-blue-700 mt-4 font-semibold flex items-center gap-1 group-hover:gap-2 transition-all">
                Manage Users &rarr;
            </a>
        </div>

        {{-- News --}}
        <div
            class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 flex flex-col justify-between group hover:border-indigo-500 transition-colors">
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">
                        Articles</h3>
                    <p class="text-3xl font-black text-gray-900 dark:text-white">{{ $newsCount }}</p>
                </div>
                <div class="p-2 bg-indigo-50 dark:bg-indigo-900/30 rounded-lg text-indigo-600 dark:text-indigo-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                        </path>
                    </svg>
                </div>
            </div>
            <a href="{{ route('news.manager') }}" wire:navigate
                class="text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 mt-4 font-semibold flex items-center gap-1 group-hover:gap-2 transition-all">
                Manage News &rarr;
            </a>
        </div>

        {{-- Events --}}
        <div
            class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 flex flex-col justify-between group hover:border-emerald-500 transition-colors">
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Total
                        Events</h3>
                    <p class="text-3xl font-black text-gray-900 dark:text-white">{{ $eventCount }}</p>
                </div>
                <div class="p-2 bg-emerald-50 dark:bg-emerald-900/30 rounded-lg text-emerald-600 dark:text-emerald-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
            </div>
            <a href="{{ route('event.manager') }}" wire:navigate
                class="text-sm text-emerald-600 dark:text-emerald-400 hover:text-emerald-700 mt-4 font-semibold flex items-center gap-1 group-hover:gap-2 transition-all">
                Manage Events &rarr;
            </a>
        </div>

        {{-- Tutorials --}}
        <div
            class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 flex flex-col justify-between group hover:border-purple-500 transition-colors">
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">
                        Tutorials</h3>
                    <p class="text-3xl font-black text-gray-900 dark:text-white">{{ $tutorialCount }}</p>
                </div>
                <div class="p-2 bg-purple-50 dark:bg-purple-900/30 rounded-lg text-purple-600 dark:text-purple-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
            <a href="{{ route('tutorial.manager') }}" wire:navigate
                class="text-sm text-purple-600 dark:text-purple-400 hover:text-purple-700 mt-4 font-semibold flex items-center gap-1 group-hover:gap-2 transition-all">
                Manage Tutorials &rarr;
            </a>
        </div>

        {{-- Crop Solutions --}}
        <div
            class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 flex flex-col justify-between group hover:border-lime-500 transition-colors">
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">
                        Solutions</h3>
                    <p class="text-3xl font-black text-gray-900 dark:text-white">{{ $cropSolutionCount }}</p>
                </div>
                <div class="p-2 bg-lime-50 dark:bg-lime-900/30 rounded-lg text-lime-600 dark:text-lime-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                        </path>
                    </svg>
                </div>
            </div>
            <a href="{{ route('crop.solution.manager') }}" wire:navigate
                class="text-sm text-lime-600 dark:text-lime-400 hover:text-lime-700 mt-4 font-semibold flex items-center gap-1 group-hover:gap-2 transition-all">
                Manage Solutions &rarr;
            </a>
        </div>

    </div>

    {{-- Main Content Grid --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- Left Column: Actions & Analytics Placeholder --}}
        <div class="space-y-8">
            {{-- Quick Actions --}}
            <div
                class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700">
                <h3 class="text-lg font-bold mb-4 text-gray-900 dark:text-white">Quick Creation</h3>
                <div class="grid grid-cols-2 gap-3">
                    <a href="{{ route('news.manager') }}" wire:navigate
                        class="flex flex-col items-center justify-center p-4 bg-gray-50 dark:bg-gray-700/50 hover:bg-indigo-50 dark:hover:bg-indigo-900/30 rounded-xl transition-colors text-center group">
                        <svg class="w-6 h-6 text-indigo-500 mb-2 group-hover:scale-110 transition-transform"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                            </path>
                        </svg>
                        <span class="text-xs font-semibold text-gray-700 dark:text-gray-300">Add News</span>
                    </a>
                    <a href="{{ route('event.manager') }}" wire:navigate
                        class="flex flex-col items-center justify-center p-4 bg-gray-50 dark:bg-gray-700/50 hover:bg-emerald-50 dark:hover:bg-emerald-900/30 rounded-xl transition-colors text-center group">
                        <svg class="w-6 h-6 text-emerald-500 mb-2 group-hover:scale-110 transition-transform"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        <span class="text-xs font-semibold text-gray-700 dark:text-gray-300">Add Event</span>
                    </a>
                    <a href="{{ route('tutorial.manager') }}" wire:navigate
                        class="flex flex-col items-center justify-center p-4 bg-gray-50 dark:bg-gray-700/50 hover:bg-purple-50 dark:hover:bg-purple-900/30 rounded-xl transition-colors text-center group">
                        <svg class="w-6 h-6 text-purple-500 mb-2 group-hover:scale-110 transition-transform"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
                            </path>
                        </svg>
                        <span class="text-xs font-semibold text-gray-700 dark:text-gray-300">Add Tutorial</span>
                    </a>
                    <a href="{{ route('crop.solution.manager') }}" wire:navigate
                        class="flex flex-col items-center justify-center p-4 bg-gray-50 dark:bg-gray-700/50 hover:bg-lime-50 dark:hover:bg-lime-900/30 rounded-xl transition-colors text-center group">
                        <svg class="w-6 h-6 text-lime-500 mb-2 group-hover:scale-110 transition-transform"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        <span class="text-xs font-semibold text-gray-700 dark:text-gray-300">Add Solution</span>
                    </a>
                </div>
            </div>

            {{-- Analytics Placeholder --}}
            <div
                class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 h-64 flex flex-col items-center justify-center relative overflow-hidden">
                <div
                    class="absolute inset-0 bg-linear-to-br from-gray-50 to-white dark:from-gray-800 dark:to-gray-800 opacity-50">
                </div>
                <svg class="w-12 h-12 text-gray-300 dark:text-gray-600 mb-3 relative z-10" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                    </path>
                </svg>
                <h3 class="text-sm font-bold text-gray-500 dark:text-gray-400 relative z-10">Advanced Analytics</h3>
                <p class="text-xs text-gray-400 dark:text-gray-500 mt-1 relative z-10">Traffic and engagement charts
                    coming soon.</p>
            </div>
        </div>

        {{-- Right Column: Activity Feeds --}}
        <div class="lg:col-span-2 space-y-8">

            {{-- Latest News Feed --}}
            <div
                class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700">
                <div class="flex items-center justify-between mb-6 border-b border-gray-100 dark:border-gray-700 pb-4">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white flex items-center gap-2">
                        <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                            </path>
                        </svg>
                        Recently Published News
                    </h3>
                    <a href="{{ route('news.manager') }}" wire:navigate
                        class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline font-medium">View All</a>
                </div>

                <ul class="space-y-4">
                    @forelse($recentNews as $news)
                        <li
                            class="flex items-start gap-4 p-3 hover:bg-gray-50 dark:hover:bg-gray-700/50 rounded-xl transition-colors">
                            <div
                                class="mt-1 bg-indigo-100 dark:bg-indigo-900/50 p-2 rounded-lg text-indigo-600 dark:text-indigo-400 shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <a href="{{ route('news.manager') }}" wire:navigate
                                    class="text-sm font-bold text-gray-900 dark:text-white hover:text-indigo-600 transition-colors line-clamp-1">{{ $news->title }}</a>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 flex items-center gap-2">
                                    <span
                                        class="font-medium text-gray-700 dark:text-gray-300">{{ $news->user->name ?? 'Admin' }}</span>
                                    <span>&bull;</span>
                                    <span>{{ $news->created_at->diffForHumans() }}</span>
                                </p>
                            </div>
                        </li>
                    @empty
                        <li
                            class="py-6 text-center text-sm text-gray-500 dark:text-gray-400 bg-gray-50 dark:bg-gray-700/30 rounded-xl border border-dashed border-gray-200 dark:border-gray-600">
                            No recent news articles published yet.
                        </li>
                    @endforelse
                </ul>
            </div>

            {{-- Upcoming Events Feed --}}
            <div
                class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700">
                <div class="flex items-center justify-between mb-6 border-b border-gray-100 dark:border-gray-700 pb-4">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white flex items-center gap-2">
                        <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        Upcoming Events
                    </h3>
                    <a href="{{ route('event.manager') }}" wire:navigate
                        class="text-sm text-emerald-600 dark:text-emerald-400 hover:underline font-medium">View
                        Calendar</a>
                </div>

                <ul class="space-y-4">
                    @forelse($upcomingEvents as $event)
                        <li
                            class="flex items-start gap-4 p-3 hover:bg-gray-50 dark:hover:bg-gray-700/50 rounded-xl transition-colors">
                            <div
                                class="flex flex-col items-center justify-center bg-emerald-50 dark:bg-emerald-900/30 border border-emerald-100 dark:border-emerald-800 rounded-lg min-w-12 p-1.5 shrink-0">
                                <span
                                    class="text-[10px] font-bold text-emerald-600 dark:text-emerald-400 uppercase tracking-wider">{{ $event->start_time->format('M') }}</span>
                                <span
                                    class="text-lg font-black text-gray-900 dark:text-white leading-none mt-0.5">{{ $event->start_time->format('d') }}</span>
                            </div>
                            <div class="mt-0.5">
                                <a href="{{ route('event.manager') }}" wire:navigate
                                    class="text-sm font-bold text-gray-900 dark:text-white hover:text-emerald-600 transition-colors line-clamp-1">{{ $event->title }}</a>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $event->start_time->format('g:i A') }}
                                </p>
                            </div>
                        </li>
                    @empty
                        <li
                            class="py-6 text-center text-sm text-gray-500 dark:text-gray-400 bg-gray-50 dark:bg-gray-700/30 rounded-xl border border-dashed border-gray-200 dark:border-gray-600">
                            No upcoming events scheduled.
                        </li>
                    @endforelse
                </ul>
            </div>

        </div>
    </div>
</div>
