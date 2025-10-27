<?php

namespace App\Livewire;
use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EventManagement extends Component
{
    use WithPagination;

    // Model properties
    public $eventId = null;
    public $title = '';
    public $description = '';
    public $startTime = ''; // Use string format for datetime-local input
    public $endTime = '';   // Use string format for datetime-local input
    public $location = '';
    public $capacity = ''; // Use string or null for optional number input

    // Component state
    public $isEditing = false;
    public $showModal = false;

    // Validation rules adjusted for events
    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // Input format validation, plus ensuring start is not past and end is after start
            'startTime' => 'required|date_format:Y-m-d\TH:i|after_or_equal:now',
            'endTime' => 'required|date_format:Y-m-d\TH:i|after:startTime',
            'location' => 'nullable|string|max:255',
            // Capacity validation: must be integer, minimum 1 if present
            'capacity' => 'nullable|integer|min:1',
        ];
    }

    // Method to show the create modal
    public function create(): void
    {
        // Optional: $this->authorize('event.create');
        $this->resetForm();
        $this->isEditing = false;
        $this->showModal = true;
    }

    // Method to show the edit modal and load event data
    public function edit($id): void
    {
        // Optional: $this->authorize('event.edit');
        $event = Event::findOrFail($id);
        $this->eventId = $event->id;
        $this->title = $event->title;
        $this->description = $event->description;
        // Format datetime values for the input field
        $this->startTime = $event->start_time->format('Y-m-d\TH:i');
        $this->endTime = $event->end_time->format('Y-m-d\TH:i');
        $this->location = $event->location;
        $this->capacity = $event->capacity; // Can be null or integer

        $this->isEditing = true;
        $this->showModal = true;
    }

    // Method to save (create or update) the event
    public function save(): void
    {
        // Optional: $this->authorize($this->isEditing ? 'event.edit' : 'event.create');

        $this->validate();

        // Prepare data, ensuring capacity is null if empty string
        $eventData = [
            'title' => $this->title,
            'description' => $this->description,
            'start_time' => $this->startTime,
            'end_time' => $this->endTime,
            'location' => $this->location ?: null, // Store null if empty
            'capacity' => $this->capacity === '' ? null : (int)$this->capacity, // Convert non-empty to int, else null
            'user_id' => Auth::id(),
        ];

        try {
            if ($this->isEditing) {
                $event = Event::findOrFail($this->eventId);

                // Optional: Add check later if capacity < current registrations
                // if ($eventData['capacity'] !== null && $event->registrations()->count() > $eventData['capacity']) {
                //     $this->addError('capacity', 'Capacity cannot be less than current registrations.');
                //     return;
                // }

                $event->update($eventData);
                session()->flash('message', 'Event updated successfully!');
            } else {
                Event::create($eventData);
                session()->flash('message', 'Event created successfully!');
            }
        } catch (\Exception $e) {
            Log::error('Error saving event: ' . $e->getMessage());
            session()->flash('error', 'Could not save event. Please check the details and try again.'); // Show generic error
            return; // Prevent modal closing on error
        }

        $this->closeModal();
    }

    // Method to delete an event
    public function delete($id): void
    {
        // Optional: $this->authorize('event.delete');
        try {
            $event = Event::findOrFail($id);
            $event->delete();
            session()->flash('message', 'Event deleted successfully!');
        } catch (\Exception $e) {
             Log::error('Error deleting event: ' . $e->getMessage());
            session()->flash('error', 'Could not delete event.');
        }
    }

    // Method to close the modal
    public function closeModal(): void
    {
        $this->showModal = false;
        $this->resetForm();
    }

    // Method to reset form properties
    public function resetForm(): void
    {
        $this->reset(['eventId', 'title', 'description', 'startTime', 'endTime', 'location', 'capacity', 'isEditing']);
        $this->resetValidation();
    }
    public function render()
    {
        return view('livewire.event-management', [
            'events' => Event::latest()->paginate(10),
        ]);
    }
}
