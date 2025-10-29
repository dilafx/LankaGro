<?php

namespace App\Livewire;
use App\Models\News;
use App\Models\User;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use Livewire\Component;

class NewsManagement extends Component
{
    use WithPagination, WithFileUploads;

    protected $layout = 'components.layouts.app';

    // Model properties
    public $newsId = null;
    public $title = '';
    public $content = '';
    public $status = 'draft';
    public $image = null;
    public $existingImageUrl = null;

    // Component state
    public $isEditing = false;
    public $showModal = false;

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|in:draft,published',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function create(): void
    {

        $this->authorize('news.create');
        $this->resetForm();
        $this->isEditing = false;
        $this->showModal = true;
    }

    public function edit($id): void
    {
        $this->authorize('news.edit');
        $newsItem = News::findOrFail($id);
        $this->newsId = $newsItem->id;
        $this->title = $newsItem->title;
        $this->content = $newsItem->content;
        $this->status = $newsItem->status;
        $this->existingImageUrl = $newsItem->image;
        $this->image = null;

        $this->isEditing = true;
        $this->showModal = true;
    }

    public function save(): void
    {

        $this->authorize($this->isEditing ? 'news.edit' : 'news.create');
        $this->validate();

        $newsData = [
            'title' => $this->title,
            'content' => $this->content,
            'status' => $this->status,
            'user_id' => Auth::id(),
        ];

        // Handle file upload
        if ($this->image) {

            if ($this->isEditing && $this->existingImageUrl) {
                $oldPath = Str::replace('/storage', 'public', $this->existingImageUrl);
                if (Storage::exists($oldPath)) {
                    Storage::delete($oldPath);
                }
            }

            $path = $this->image->store('public/news_images');
            $newsData['image'] = Storage::url($path);
        }

        // Update or Create
        if ($this->isEditing) {
            $newsItem = News::findOrFail($this->newsId);
            $newsItem->update($newsData);
            session()->flash('message', 'News article updated successfully!');
        } else {
            News::create($newsData);
            session()->flash('message', 'News article created successfully!');
        }

        $this->closeModal();
    }

    public function delete($id): void
    {

         $this->authorize('news.delete');
        $newsItem = News::findOrFail($id);


        if ($newsItem->image) {
            $path = Str::replace('/storage', 'public', $newsItem->image);
             if (Storage::exists($path)) {
                Storage::delete($path);
            }
        }

        $newsItem->delete();
        session()->flash('message', 'News article deleted successfully!');
    }

    public function closeModal(): void
    {
        $this->showModal = false;
        $this->resetForm();
    }

    public function resetForm(): void
    {
        $this->reset(['newsId', 'title', 'content', 'status', 'image', 'existingImageUrl', 'isEditing']);
        $this->resetValidation();
    }
    public function render()
    {

         $this->authorize(ability:'news.view');
        return view('livewire.news-management', [
            'newsItems' => News::with('user')->latest()->paginate(10),

        ]);
    }
}
