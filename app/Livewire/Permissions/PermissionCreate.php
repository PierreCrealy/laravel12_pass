<?php

namespace App\Livewire\Permissions;

use App\Models\Permission;
use Livewire\Component;

class PermissionCreate extends Component
{
    public $name, $guard_name;

    public function render()
    {
        return view('livewire.permissions.permission-create');
    }

    public function submit()
    {
        $this->validate([
            'name'       => 'required|unique:permissions,name' ,
            'guard_name' => 'required',
        ]);

        $newPermission = new Permission;
        $newPermission
            ->fill([
                'name'       => $this->name,
                'guard_name' => $this->guard_name,
            ])
            ->save();

        return to_route('permissions.index')
                ->with('success', 'Permission has been created.');
    }
}
