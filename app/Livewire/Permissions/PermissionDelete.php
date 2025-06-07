<?php

namespace App\Livewire\Permissions;

use App\Models\Permission;
use Livewire\Component;

class PermissionDelete extends Component
{
    public function mount(Permission $permission)
    {
        $permission->delete();

        return to_route('permissions.index')->with('succes', 'Permission "' . $permission->name . '" has been deleted.');
    }
}
