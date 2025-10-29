<?php

namespace App\Livewire;

use App\Models\Tutorial;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
class TutorialManagement extends Component
{
    use WithPagination, WithFileUploads;

    // Model properties
    public $tutorialId = null;
    public $title = '';
    public $description = '';
    public $contentType = 'text_guide';
    public $contentLink = '';
    public $contentText = '';
    public $image = null;
    public $existingImageUrl = null;

    // Component state
    public $isEditing = false;
    public $showModal = false;

    protected function rules()
    {
        // Base rules
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'contentType' => ['required', Rule::in(['video', 'text_guide'])],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ];

        // Conditional rules based on content type
        if ($this->contentType === 'video') {
            $rules['contentLink'] = 'required|url';
            $rules['contentText'] = 'nullable|string';
        } elseif ($this->contentType === 'text_guide') {
            $rules['contentText'] = 'required|string';
            $rules['contentLink'] = 'nullable|url';
        }

        return $rules;
    }

        public function updatedContentType($value): void
    {
        // Reset fields that are not relevant to the new type
        if ($value === 'video') {
            $this->contentText = '';
        } elseif ($value === 'text_guide') {
            $this->contentLink = '';
        }
        // Reset validation specific to the previous type
        $this->resetValidation(['contentLink', 'contentText']);
    }


    public function create(): void
    {

         $this->authorize('tutorial.create');
        $this->resetForm();
        $this->isEditing = false;
        $this->showModal = true;
    }

    public function edit($id): void
    {

        $this->authorize('tutorial.edit');
        $tutorial = Tutorial::findOrFail($id);
        $this->tutorialId = $tutorial->id;
        $this->title = $tutorial->title;
        $this->description = $tutorial->description;
        $this->contentType = $tutorial->content_type;
        $this->contentLink = $tutorial->content_link;
        $this->contentText = $tutorial->content_text;
        $this->existingImageUrl = $tutorial->image;
        $this->image = null; // Clear file input

        $this->isEditing = true;
        $this->showModal = true;
    }

    public function save(): void
    {

        $this->authorize($this->isEditing ? 'tutorial.edit' : 'tutorial.create');

        $this->validate();

        $tutorialData = [
            'title' => $this->title,
            'description' => $this->description,
            'content_type' => $this->contentType,
            'content_link' => $this->contentType === 'video' ? $this->contentLink : null,
            'content_text' => $this->contentType === 'text_guide' ? $this->contentText : null,
            'user_id' => Auth::id(),
        ];

        // Handle image upload
        if ($this->image) {
            // Delete old image if editing & new one uploaded
            if ($this->isEditing && $this->existingImageUrl) {
                $oldPath = Str::replace('/storage', 'public', $this->existingImageUrl);
                if (Storage::exists($oldPath)) {
                    Storage::delete($oldPath);
                }
            }
            // Store new image in 'public/tutorial_images'
            $path = $this->image->store('public/tutorial_images');
            $tutorialData['image'] = Storage::url($path);
        }

        // Update or Create
        if ($this->isEditing) {
            $tutorial = Tutorial::findOrFail($this->tutorialId);
            $tutorial->update($tutorialData);
            session()->flash('message', 'Tutorial updated successfully!');
        } else {
            Tutorial::create($tutorialData);
            session()->flash('message', 'Tutorial created successfully!');
        }

        $this->closeModal();
    }

    public function delete($id): void
    {

        $this->authorize('tutorial.delete');
        $tutorial = Tutorial::findOrFail($id);

        // Delete image from storage
        if ($tutorial->image) {
            $path = Str::replace('/storage', 'public', $tutorial->image);
             if (Storage::exists($path)) {
                Storage::delete($path);
            }
        }

        $tutorial->delete();
        session()->flash('message', 'Tutorial deleted successfully!');
    }

    public function closeModal(): void
    {
        $this->showModal = false;
        $this->resetForm();
    }

    public function resetForm(): void
    {
        $this->reset(['tutorialId', 'title', 'description', 'contentType', 'contentLink', 'contentText', 'image', 'existingImageUrl', 'isEditing']);
        $this->contentType = 'text_guide'; // Reset to default
        $this->resetValidation();
    }
    public function render()
    {
        $this->authorize(ability:'tutorial.view');
        return view('livewire.tutorial-management', [
            'tutorials' => Tutorial::with('user')->latest()->paginate(10),
        ]);
    }
}
