<?php

namespace App\Livewire;

use Spatie\Permission\Models\Permission;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class RoleManagement extends Component
{

    use WithPagination;
    public $showModal=false;
    public $roleId;
    public $name;
    public $selectedPermissions=[];
    public $isEditing=false;

    protected $rules=[
        'name'=>'required|string|max:255|unique:roles,name',
        'selectedPermissions'=>'array',
    ];

    public function create():void{
        $this->authorize(ability:'role.create');
        $this->resetForm();
        $this->showModal=true;
    }

    public function edit($id):void{
        $this->authorize(ability:'role.edit');
        $role=Role::with('permissions')->findOrFail(id:$id);
        $this->roleId=$role->id;
        $this->name=$role->name;
        $this->selectedPermissions=$role->permissions->pluck('name')->toArray();
        $this->isEditing=true;
        $this->showModal=true;
    }

     public function save()
    {
        if ($this->isEditing) {
            $this->authorize('role.edit');
            $this->rules['name'] = 'required|string|max:255|unique:roles,name,' . $this->roleId;
        } else {
            $this->authorize('role.create');
        }

        $this->validate();

        if ($this->isEditing) {
            $role = Role::findOrFail($this->roleId);
            $role->update(['name' => $this->name]);
        } else {
            $role = Role::create(['name' => $this->name]);
        }

        $role->syncPermissions($this->selectedPermissions);

        $this->resetForm();
        $this->showModal = false;
        session()->flash('message', 'Role saved successfully!');
    }

    public function delete($id)
    {
        $this->authorize('role.delete');
        Role::findOrFail($id)->delete();
        session()->flash('message', 'Role deleted successfully!');
    }

    public function resetForm():void{
        $this->roleId=null;
        $this->name='';
        $this->selectedPermissions=[];
        $this->isEditing=false;
        $this->resetValidation();

    }

    public function closeModal():void{
        $this->showModal=false;
        $this->resetForm();
    }
    public function render()
    {
        $this->authorize(ability:'role.view');
        return view('livewire.role-management',data:[
            'roles'=>Role::with(relations:'permissions')->paginate(perPage:10),
            'permissions'=>Permission::all()->groupBy(function (Permission $permission): string {
                return explode('.', $permission->name)[0];
            }),
        ]);
    }
}
