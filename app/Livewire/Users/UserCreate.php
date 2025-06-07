<?php

namespace App\Livewire\Users;

use App\Models\Role;
use App\Models\User;
use Flux\Flux;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use function Laravel\Prompts\alert;

class UserCreate extends Component
{
    public $allRoles = [];
    public $name, $email, $password, $confirm_password, $role;


    public function mount()
    {
        $this->allRoles = Role::all();
    }

    public function render()
    {
        return view('livewire.users.user-create');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|same:confirm_password',
        ]);

        $newUser = new User;
        $newUser
            ->fill([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ])
            ->save();

        $newUser->assignRole($this->role);

        return to_route('users.index')
            ->with('success', 'User has created.');
    }

}
