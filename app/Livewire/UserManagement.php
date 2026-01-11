<?php

namespace App\Livewire;

use Attribute;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserManagement extends Component
{

    use WithPagination;

    public $userId,$name,$email,$password;
    public $selectedRoles = [];
    public $isEditing=false;
    public $showModal=false;

    protected $rules=[
        'name'=>'required|string|max:255',
        'email'=>'required|email|unique:users,email',
        'password'=>'required|min:8',
        'selectedRoles'=>'array',
    ];

    public function create():void{
        $this->showModal=true;
    }

    public function edit($id):void
    {
        $this->authorize(ability:'$id');
        $user=User::findOrFail(id:$id);
        $this->userId=$user->id;
        $this->name=$user->name;
        $this->email=$user->email;
        $this->selectedRoles=$user->roles->pluck('name')->toArray();
        $this->isEditing=true;
        $this->showModal=true;


    }

    public function save():void
    {
        if($this->isEditing){
            $this->authorize(ability:'user.edit');
            $this->rules['email']='required|email|unique:users,email,'.$this->userId;
            $this->rules['password']='nullable|min;8';
        }else{
            $this->authorize(ability:'user.create');
        }

        $this->validate();

        $userData=[
            'name'=>$this->name,
            'email'=>$this->email,
        ];

        if(!$this->isEditing||$this->password){
            $userData['password']=Hash::make(value:$this->password);
        }
        if($this->isEditing){
            $user=User::findOrFail(id:$this->userId);
            $user->update(attributes:$userData);
        }else{
            $user=User::create(attributes:$userData);
        }

        $user->syncRoles(roles:$this->selectedRoles);

        $this->resetForm();
        $this->showModal=false;
        session()->flash(key:'message',value:'User saved successfully!');

    }

    public function delete($id):void
    {
        $this->authorize(ability:'user.delete');
        User::findOrFail(id:$id)->delete();
        session()->flash(key:'message',value:'User deleted successfully!');
    }

    public function closeModal():void
    {
        $this->showModal=false;
        $this->resetForm();
    }

    public function resetForm():void
    {
        $this->userId=null;
        $this->name='';
        $this->email='';
        $this->password='';
        $this->selectedRoles=[];
        $this->isEditing=false;
        $this->resetValidation();
    }

     public function render()
    {

        $this->authorize(ability:'user.view');
        return view('livewire.user-management',data:[
            'users'=>User::with(relations:'roles')->paginate(perPage:10),
            'roles'=>Role::all(),
        ]);
    }
}
