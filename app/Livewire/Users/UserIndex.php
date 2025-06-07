<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;
use function Laravel\Prompts\alert;

class UserIndex extends Component
{

    public $selectedUser = null;
    public $showAlert = false;


    public function render()
    {
        return view('livewire.users.user-index');
    }

}
