<div class="p-6 min-h-screen w-full">
    {{-- Header Section --}}
    <div class="flex justify-between items-center mb-6 p-6 rounded bg-gray-100 dark:bg-gray-800 shadow">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">News Management</h2>
        {{-- Permission check example from user management --}}
        {{-- @can('news.create') --}}
        <button wire:click="create"
                class="bg-blue-500 hover:bg-blue-600 dark:bg-blue-700 dark:hover:bg-blue-800 text-white px-4 py-2 rounded text-sm font-medium">
            Add News Article
        </button>
        {{-- @endcan --}}
    </div>

    {{-- Flash Message --}}
    @if (session()->has('message'))
        <div
            class="bg-green-100 dark:bg-green-800 border border-green-400 dark:border-green-600 text-green-700 dark:text-green-200 px-4 py-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    {{-- Table Section --}}
    <div class="bg-white dark:bg-gray-800 shadow overflow-x-auto sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Author</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Created At</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @forelse ($newsItems as $item)
                    <tr wire:key="{{ $item->id }}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ Str::limit($item->title, 50) }}</td> {{-- Limit title length --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ $item->user->name ?? 'N/A' }}</td> {{-- Show author name --}}
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{-- Status Badge --}}
                            <span class="inline-flex px-2 py-1 text-xs rounded-full {{ $item->status == 'published' ? 'bg-green-100 dark:bg-green-700 text-green-800 dark:text-green-100' : 'bg-yellow-100 dark:bg-yellow-700 text-yellow-800 dark:text-yellow-100' }}">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ $item->created_at->format('Y-m-d H:i') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            {{-- @can('news.edit') --}}
                            <button wire:click="edit({{ $item->id }})"
                                    class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-200 mr-2">
                                Edit
                            </button>
                            {{-- @endcan --}}
                            {{-- @can('news.delete') --}}
                            <button wire:click="delete({{ $item->id }})" wire:confirm="Are you sure you want to delete this news article?"
                                    class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-200">
                                Delete
                            </button>
                            {{-- @endcan --}}
                        </td>
                    </tr>
                @empty
                     <tr>
                        <td colspan="5" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500 dark:text-gray-400">
                            No news articles found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination Links --}}
    <div class="mt-4 text-gray-900 dark:text-white">
        {{ $newsItems->links() }}
    </div>

    {{-- Modal --}}
    @if($showModal)
        <div class="fixed inset-0 backdrop-blur-md overflow-y-auto h-full w-full z-50 flex items-center justify-center p-4">
            {{-- Modal Content (copied structure from user-management.blade.php) --}}
            <div class="relative mx-auto p-5 border w-full max-w-2xl shadow-lg rounded-md bg-white dark:bg-gray-800">
                <div class="mt-3">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4 text-center">
                        {{ $isEditing ? 'Edit News Article' : 'Add News Article' }}
                    </h3>

                    <form wire:submit.prevent="save">
                        <div class="space-y-4">
                            {{-- Title --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                                <input type="text" wire:model="title"
                                       class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                                @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            {{-- Content --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Content</label>
                                <textarea wire:model="content" rows="6"
                                          class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white"></textarea>
                                @error('content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            {{-- Image Upload --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Featured Image</label>
                                {{-- Preview Existing Image --}}
                                @if ($isEditing && $existingImageUrl && !$image)
                                     <img src="{{ $existingImageUrl }}" alt="Current Image" class="h-20 w-auto rounded my-2 border border-gray-300 dark:border-gray-600">
                                     <p class="text-xs text-gray-500 dark:text-gray-400">Current image. Upload a new file to replace it.</p>
                                @endif
                                {{-- Preview New Image --}}
                                @if ($image)
                                    <img src="{{ $image->temporaryUrl() }}" alt="Image Preview" class="h-20 w-auto rounded my-2 border border-gray-300 dark:border-gray-600">
                                @endif
                                <input type="file" wire:model="image" id="image-{{ $this->getId() }}" {{-- Unique ID for file input --}}
                                       class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 dark:file:bg-gray-700 dark:file:text-gray-300 dark:hover:file:bg-gray-600">
                                <div wire:loading wire:target="image" class="text-sm text-gray-500 dark:text-gray-400 mt-1">Uploading...</div>
                                @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>


                            {{-- Status --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                                <select wire:model="status"
                                        class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                                    <option value="draft">Draft</option>
                                    <option value="published">Published</option>
                                </select>
                                @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            {{-- Buttons --}}
                            <div class="flex justify-end space-x-2 pt-4">
                                <button type="button" wire:click="closeModal"
                                        class="bg-gray-500 hover:bg-gray-600 dark:bg-gray-600 dark:hover:bg-gray-700 text-white px-4 py-2 rounded">
                                    Cancel
                                </button>
                                <button type="submit" wire:loading.attr="disabled"
                                        class="bg-blue-500 hover:bg-blue-600 dark:bg-blue-700 dark:hover:bg-blue-800 text-white px-4 py-2 rounded disabled:opacity-50">
                                    {{-- Show loading state text --}}
                                    <span wire:loading wire:target="save">Saving...</span>
                                    {{-- Show normal text --}}
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
