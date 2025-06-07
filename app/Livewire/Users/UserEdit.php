<?php

namespace App\Livewire\Users;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserEdit extends Component
{
    public User $user;
    public $allRoles = [];
    public $name, $email, $password, $confirm_password, $role;

    public function mount(User $user)
    {
        $this->user  = $user;
        $this->name  = $user->name;
        $this->email = $user->email;
        $this->role  = $user->roles?->first()->name ?? '';

        $this->allRoles = Role::all();
    }

    public function render()
    {
        return view('livewire.users.user-edit');
    }

    public function submit()
    {
        $this->validate([
            'name'     => 'required',
            'email'    => 'required|email',
            'password' => 'same:confirm_password',
        ]);

        $this->user
            ->fill([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ])
            ->save();

        $this->user->assignRole($this->role);

        return to_route('users.index')
            ->with('success', 'User has edited.');
    }
}
