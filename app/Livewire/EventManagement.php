<?php

namespace App\Livewire;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class EventManagement extends Component
{
    use WithPagination, WithFileUploads;

    // Model properties
    public $eventId = null;
    public $title = '';
    public $description = '';
    public $startTime = '';
    public $endTime = '';
    public $location = '';
    public $capacity = '';
    public $image = null;
    public $existingImageUrl = null;

    // Component state
    public $isEditing = false;
    public $showModal = false;

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'startTime' => 'required|date_format:Y-m-d\TH:i',
            'endTime' => 'required|date_format:Y-m-d\TH:i|after:startTime',
            'location' => 'nullable|string|max:255',
            'capacity' => 'nullable|integer|min:1',
            'image' => 'nullable|image|max:2048', // Max 2MB
        ];
    }

    // --- MISSING METHOD RESTORED ---
    public function create(): void
    {
        $this->authorize('event.create');
        $this->resetForm();
        $this->isEditing = false;
        $this->showModal = true;
    }

    public function edit($id): void
    {
        $this->authorize('event.edit');
        $event = Event::findOrFail($id);
        $this->eventId = $event->id;
        $this->title = $event->title;
        $this->description = $event->description;

        // Format dates for HTML datetime-local input
        $this->startTime = $event->start_time->format('Y-m-d\TH:i');
        $this->endTime = $event->end_time->format('Y-m-d\TH:i');

        $this->location = $event->location;
        $this->capacity = $event->capacity;
        $this->existingImageUrl = $event->image;
        $this->image = null;

        $this->isEditing = true;
        $this->showModal = true;
    }

    public function save(): void
    {
        $this->authorize($this->isEditing ? 'event.edit' : 'event.create');
        $this->validate();

        $eventData = [
            'title' => $this->title,
            'description' => $this->description,
            'start_time' => $this->startTime,
            'end_time' => $this->endTime,
            'location' => $this->location ?: null,
            'capacity' => $this->capacity === '' ? null : (int)$this->capacity,
            'user_id' => Auth::id(),
        ];

        // Handle Image Upload
        if ($this->image) {
            // Delete old image if editing
            if ($this->isEditing && $this->existingImageUrl) {
                $oldPath = str_replace('/storage/', '', $this->existingImageUrl);
                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
            }

            // Store new image
            $path = $this->image->store('event_images', 'public');
            $eventData['image'] = Storage::url($path);
        }

        try {
            if ($this->isEditing) {
                $event = Event::findOrFail($this->eventId);
                $event->update($eventData);
                session()->flash('message', 'Event updated successfully!');
            } else {
                Event::create($eventData);
                session()->flash('message', 'Event created successfully!');
            }
        } catch (\Exception $e) {
            Log::error('Error saving event: ' . $e->getMessage());
            session()->flash('error', 'Could not save event.');
            return;
        }

        $this->closeModal();
    }

    public function delete($id): void
    {
        $this->authorize('event.delete');

        try {
            $event = Event::findOrFail($id);

            // Delete image if exists
            if ($event->image) {
                $path = str_replace('/storage/', '', $event->image);
                if (Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }
            }

            $event->delete();
            session()->flash('message', 'Event deleted successfully!');
        } catch (\Exception $e) {
             Log::error('Error deleting event: ' . $e->getMessage());
            session()->flash('error', 'Could not delete event.');
        }
    }

    public function closeModal(): void
    {
        $this->showModal = false;
        $this->resetForm();
    }

    public function resetForm(): void
    {
        $this->reset(['eventId', 'title', 'description', 'startTime', 'endTime', 'location', 'capacity', 'isEditing', 'image', 'existingImageUrl']);
        $this->resetValidation();
    }

    public function render()
    {
        $this->authorize(ability: 'event.view');
        return view('livewire.event-management', [
            'events' => Event::latest()->paginate(10),
        ]);
    }
}
