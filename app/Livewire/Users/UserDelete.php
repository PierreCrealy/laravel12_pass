<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class UserDelete extends Component
{
    public User $user;

    public function mount(User $user)
    {
        $user->delete();

        return to_route('users.index');
        // return view('livewire.users.user-delete');
    }


}
