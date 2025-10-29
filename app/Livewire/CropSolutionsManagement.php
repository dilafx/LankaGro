<?php

namespace App\Livewire;

use App\Models\CropSolution;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CropSolutionsManagement extends Component
{
    use WithPagination, WithFileUploads;

    // Model properties
    public $cropSolutionId = null;
    public $crop_name = '';
    public $problem_type = '';
    public $problem_name = '';
    public $description = '';
    public $solution_text = '';
    public $image = null;
    public $existingImageUrl = null;

    // Component state
    public $isEditing = false;
    public $showModal = false;

    protected function rules()
    {
        return [
            'crop_name' => 'required|string|max:100',
            'problem_type' => 'required|string|max:100',
            'problem_name' => 'required|string|max:150',
            'description' => 'nullable|string|max:2000',
            'solution_text' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function create(): void
    {

         $this->authorize('cropsolution.create');
        $this->resetForm();
        $this->isEditing = false;
        $this->showModal = true;
    }

    public function edit($id): void
    {

        $this->authorize('cropsolution.edit');
        $solution = CropSolution::findOrFail($id);
        $this->cropSolutionId = $solution->id;
        $this->crop_name = $solution->crop_name;
        $this->problem_type = $solution->problem_type;
        $this->problem_name = $solution->problem_name;
        $this->description = $solution->description;
        $this->solution_text = $solution->solution_text;
        $this->existingImageUrl = $solution->image;
        $this->image = null;

        $this->isEditing = true;
        $this->showModal = true;
    }

    public function save(): void
    {

        $this->authorize($this->isEditing ? 'cropsolution.edit' : 'cropsolution.create');
        $this->validate();

        $solutionData = [
            'crop_name' => $this->crop_name,
            'problem_type' => $this->problem_type,
            'problem_name' => $this->problem_name,
            'description' => $this->description,
            'solution_text' => $this->solution_text,
            'user_id' => Auth::id(),
        ];

        // Handle image upload
        if ($this->image) {

            if ($this->isEditing && $this->existingImageUrl) {
                $oldPath = Str::replace('/storage', 'public', $this->existingImageUrl);
                if (Storage::exists($oldPath)) {
                    Storage::delete($oldPath);
                }
            }
            // Store new image in 'public/crop_solution_images'
            $path = $this->image->store('public/crop_solution_images');
            $solutionData['image'] = Storage::url($path);
        }

        // Update or Create
        if ($this->isEditing) {
            $solution = CropSolution::findOrFail($this->cropSolutionId);
            $solution->update($solutionData);
            session()->flash('message', 'Crop solution updated successfully!');
        } else {
            CropSolution::create($solutionData);
            session()->flash('message', 'Crop solution created successfully!');
        }

        $this->closeModal();
    }

    public function delete($id): void
    {
        // Optional: $this->authorize('cropsolution.delete');
        $this->authorize('cropsolution.delete');
        $solution = CropSolution::findOrFail($id);

        // Delete image from storage
        if ($solution->image) {
            $path = Str::replace('/storage', 'public', $solution->image);
             if (Storage::exists($path)) {
                Storage::delete($path);
            }
        }

        $solution->delete();
        session()->flash('message', 'Crop solution deleted successfully!');
    }

    public function closeModal(): void
    {
        $this->showModal = false;
        $this->resetForm();
    }

    public function resetForm(): void
    {
        $this->reset(['cropSolutionId', 'crop_name', 'problem_type', 'problem_name', 'description', 'solution_text', 'image', 'existingImageUrl', 'isEditing']);
        $this->resetValidation();
    }
    public function render()
    {
        $this->authorize(ability:'cropsolution.view');
        return view('livewire.crop-solutions-management', [

            'solutions' => CropSolution::with('user')->latest()->paginate(10),
        ]);
    }
}
