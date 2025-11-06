
<div class="p-6 min-h-screen w-full">


    <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-white">Admin Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6 mb-8">

        <div class="bg-white dark:bg-gray-800 p-5 rounded-lg shadow-md flex flex-col justify-between">
            <div>
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">User Management</h3>

            </div>
            <a href="{{ route('user.index') }}" wire:navigate class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline mt-4 font-semibold">
                Manage Users &rarr;
            </a>
        </div>

        <div class="bg-white dark:bg-gray-800 p-5 rounded-lg shadow-md flex items-center justify-between">
            <div>
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">News Articles</h3>
                <p class="mt-1 text-3xl font-semibold text-gray-900 dark:text-white">{{ $newsCount }}</p>
            </div>

        </div>

        <div class="bg-white dark:bg-gray-800 p-5 rounded-lg shadow-md flex items-center justify-between">
            <div>
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">Upcoming Events</h3>
                <p class="mt-1 text-3xl font-semibold text-gray-900 dark:text-white">{{ $eventCount }}</p>
            </div>

        </div>

        <div class="bg-white dark:bg-gray-800 p-5 rounded-lg shadow-md flex items-center justify-between">
            <div>
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">Tutorials</h3>
                <p class="mt-1 text-3xl font-semibold text-gray-900 dark:text-white">{{ $tutorialCount }}</p>
            </div>

        </div>

        <div class="bg-white dark:bg-gray-800 p-5 rounded-lg shadow-md flex items-center justify-between">
            <div>
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">Crop Solutions</h3>
                <p class="mt-1 text-3xl font-semibold text-gray-900 dark:text-white">{{ $cropSolutionCount }}</p>
            </div>

        </div>

    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <div class="lg:col-span-1 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-white">Quick Actions</h3>
            <div class="space-y-3">
                <a href="{{ route('news.manager') }}" wire:navigate class="flex items-center justify-center w-full px-4 py-2 bg-blue-500 hover:bg-blue-600 dark:bg-blue-700 dark:hover:bg-blue-800 text-white rounded-md text-sm font-medium">
                    Add New News Article
                </a>
                <a href="{{ route('event.manager') }}" wire:navigate class="flex items-center justify-center w-full px-4 py-2 bg-blue-500 hover:bg-blue-600 dark:bg-blue-700 dark:hover:bg-blue-800 text-white rounded-md text-sm font-medium">
                    Add New Event
                </a>
                <a href="{{ route('tutorial.manager') }}" wire:navigate class="flex items-center justify-center w-full px-4 py-2 bg-blue-500 hover:bg-blue-600 dark:bg-blue-700 dark:hover:bg-blue-800 text-white rounded-md text-sm font-medium">
                    Add New Tutorial
                </a>
                 <a href="{{ route('crop.solution.manager') }}" wire:navigate class="flex items-center justify-center w-full px-4 py-2 bg-blue-500 hover:bg-blue-600 dark:bg-blue-700 dark:hover:bg-blue-800 text-white rounded-md text-sm font-medium">
                    Add Crop Solution
                </a>
            </div>
        </div>

        <div class="lg:col-span-2 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-white">Recent Activity</h3>

            <h4 class="text-md font-semibold mb-2 text-gray-800 dark:text-gray-300">Latest News</h4>
            <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                @forelse($recentNews as $news)
                    <li class="py-3">
                        <a href="{{ route('news.manager') }}" wire:navigate class="text-sm font-medium text-gray-900 dark:text-white hover:underline">{{ Str::limit($news->title, 60) }}</a>
                        <p class="text-xs text-gray-500 dark:text-gray-400">
                            By {{ $news->user->name ?? 'N/A' }} on {{ $news->created_at->format('M d, Y') }}
                        </p>
                    </li>
                @empty
                    <li class="py-3 text-sm text-gray-500 dark:text-gray-400">No recent news articles.</li>
                @endforelse
            </ul>

            <h4 class="text-md font-semibold mb-2 mt-6 text-gray-800 dark:text-gray-300">Upcoming Events</h4>
             <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                @forelse($upcomingEvents as $event)
                    <li class="py-3">
                        <a href="{{ route('event.manager') }}" wire:navigate class="text-sm font-medium text-gray-900 dark:text-white hover:underline">{{ $event->title }}</a>
                        <p class="text-xs text-gray-500 dark:text-gray-400">
                            Starts: {{ $event->start_time->format('M d, Y \a\t g:i A') }}
                        </p>
                    </li>
                @empty
                    <li class="py-3 text-sm text-gray-500 dark:text-gray-400">No upcoming events.</li>
                @endforelse
            </ul>
        </div>
    </div>

    <div class="mt-8 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-white">Analytics</h3>
        <div class="text-center text-gray-500 dark:text-gray-400">
            Charts and reports will be displayed here .
        </div>
    </div>

</div>

