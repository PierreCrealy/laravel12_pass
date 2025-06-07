<?php

namespace App\Livewire\Roles;

use App\Models\Role;
use Livewire\Component;

class RoleDelete extends Component
{

    public function mount(Role $role)
    {
        $role->delete();

        return to_route('roles.index')->with('succes', 'Role "' . $role->name . '" has been deleted.');
    }
}
