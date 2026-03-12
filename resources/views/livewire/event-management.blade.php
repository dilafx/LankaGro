<div class="p-6 min-h-screen w-full">
    {{-- Header Section --}}
    <div class="flex justify-between items-center mb-6 p-6 rounded bg-gray-100 dark:bg-gray-800 shadow">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Event Management</h2>
        {{-- @can('event.create') --}}
        <button wire:click="create"
            class="bg-blue-500 hover:bg-blue-600 dark:bg-blue-700 dark:hover:bg-blue-800 text-white px-4 py-2 rounded text-sm font-medium">
            Add Event
        </button>
        {{-- @endcan --}}
    </div>

    {{-- Flash Messages --}}
    @if (session()->has('message'))
        <div
            class="bg-green-100 dark:bg-green-800 border border-green-400 dark:border-green-600 text-green-700 dark:text-green-200 px-4 py-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div
            class="bg-red-100 dark:bg-red-800 border border-red-400 dark:border-red-600 text-red-700 dark:text-red-200 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif


    {{-- Table Section --}}
    <div class="bg-white dark:bg-gray-800 shadow overflow-x-auto sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        Image</th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        Title</th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        Start Time</th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        End Time</th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        Location</th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        Capacity</th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @forelse ($events as $event)
                    <tr wire:key="{{ $event->id }}">
                        {{-- Image Column --}}
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if ($event->image)
                                <img src="{{ asset($event->image) }}" alt="Event Image"
                                    class="h-10 w-10 rounded-full object-cover">
                            @else
                                <div
                                    class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 text-xs">
                                    No Img
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                            {{ Str::limit($event->title, 40) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                            {{ $event->start_time->format('Y-m-d H:i') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                            {{ $event->end_time->format('Y-m-d H:i') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                            {{ $event->location ?? 'N/A' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                            {{ $event->capacity ?? 'Unlimited' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button wire:click="edit({{ $event->id }})"
                                class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-200 mr-2">
                                Edit
                            </button>
                            <button wire:click="delete({{ $event->id }})"
                                wire:confirm="Are you sure you want to delete this event?"
                                class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-200">
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7"
                            class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500 dark:text-gray-400">
                            No events found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination Links --}}
    <div class="mt-4 text-gray-900 dark:text-white">
        {{ $events->links() }}
    </div>

    {{-- Modal --}}
    @if ($showModal)
        <div
            class="fixed inset-0 backdrop-blur-md overflow-y-auto h-full w-full z-50 flex items-center justify-center p-4">
            <div class="relative mx-auto p-5 border w-full max-w-2xl shadow-lg rounded-md bg-white dark:bg-gray-800">
                <div class="mt-3">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4 text-center">
                        {{ $isEditing ? 'Edit Event' : 'Add Event' }}
                    </h3>

                    <form wire:submit.prevent="save">
                        <div class="space-y-4">

                            {{-- Image Upload Section --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Event
                                    Image</label>

                                <div class="mt-2 flex items-center space-x-4">
                                    {{-- Preview Logic --}}
                                    @if ($image)
                                        {{-- 1. New Upload Preview --}}
                                        <div class="relative">
                                            <img src="{{ $image->temporaryUrl() }}"
                                                class="h-20 w-20 object-cover rounded-lg border border-gray-300">
                                            <span
                                                class="absolute top-0 right-0 -mt-2 -mr-2 bg-green-500 text-white text-xs px-1 rounded">New</span>
                                        </div>
                                    @elseif ($existingImageUrl)
                                        {{-- 2. Existing Image Preview --}}
                                        <div class="relative">
                                            <img src="{{ asset($existingImageUrl) }}"
                                                class="h-20 w-20 object-cover rounded-lg border border-gray-300">
                                            <span
                                                class="absolute top-0 right-0 -mt-2 -mr-2 bg-gray-500 text-white text-xs px-1 rounded">Current</span>
                                        </div>
                                    @else
                                        {{-- 3. Placeholder --}}
                                        <div
                                            class="h-20 w-20 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400 border border-dashed border-gray-300">
                                            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">

                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />

                                            </svg>
                                        </div>
                                    @endif

                                    {{-- Input Field --}}
                                    <div class="flex-1">
                                        <input type="file" wire:model="image" accept="image/*"
                                            class="block w-full text-sm text-gray-500 dark:text-gray-400
                                             file:mr-4 file:py-2 file:px-4
                                            file:rounded-full file:border-0
                                            file:text-sm file:font-semibold
                                             file:bg-blue-50 file:text-blue-700
                                             hover:file:bg-blue-100">

                                        <div wire:loading wire:target="image" class="text-sm text-blue-500 mt-1">
                                            Uploading...
                                        </div>
                                        @error('image')
                                            <span class="text-red-500 text-sm block mt-1">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                            </div>

                            {{-- Title --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                                <input type="text" wire:model="title"
                                    class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                                @error('title')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror

                            </div>

                            {{-- Description --}}
                            <div>
                                <label
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>

                                <textarea wire:model="description" rows="4"                                          
                                    class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white"></textarea>
                                @error('description')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror

                            </div>

                            {{-- Start Time --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Start
                                    Time</label>
                                <input type="datetime-local" wire:model="startTime"
                                    class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                                @error('startTime')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror

                            </div>

                            {{-- End Time --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">End
                                    Time</label>
                                <input type="datetime-local" wire:model="endTime"
                                    class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                                @error('endTime')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror

                            </div>

                            {{-- Location --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Location
                                    (Optional)</label>
                                <input type="text" wire:model="location" placeholder="e.g., Main Hall or Zoom Link"
                                    class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                                @error('location')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror

                            </div>

                            {{-- Capacity --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Capacity
                                    (Optional)</label>
                                <input type="number" wire:model="capacity" min="1"
                                    placeholder="Leave blank for unlimited"
                                    class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                                @error('capacity')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror

                            </div>

                            {{-- Buttons --}}
                            <div class="flex justify-end space-x-2 pt-4">
                                <button type="button" wire:click="closeModal"
                                    class="bg-gray-500 hover:bg-gray-600 dark:bg-gray-600 dark:hover:bg-gray-700 text-white px-4 py-2 rounded">
                                    Cancel
                                </button>
                                <button type="submit" wire:loading.attr="disabled"
                                    class="bg-blue-500 hover:bg-blue-600 dark:bg-blue-700 dark:hover:bg-blue-800 text-white px-4 py-2 rounded disabled:opacity-50">
                                    <span wire:loading wire:target="save">Saving...</span>
                                    <span wire:loading.remove wire:target="save">Save</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
