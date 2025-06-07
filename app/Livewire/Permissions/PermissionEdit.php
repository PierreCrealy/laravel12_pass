<?php

namespace App\Livewire\Permissions;

use App\Models\Permission;
use Livewire\Component;

class PermissionEdit extends Component
{
    public Permission $permission;
    public $name, $guard_name;

    public function mount(Permission $permission)
    {
        $this->permission = $permission;
        $this->name       = $permission->name;
        $this->guard_name = $permission->guard_name;
    }

    public function render()
    {
        return view('livewire.permissions.permission-edit');
    }

    public function submit()
    {
        $this->validate([
            'name'       => 'required|unique:permissions,name,'.$this->permission->id ,
            'guard_name' => 'required',
        ]);

        $this->permission
            ->fill([
                'name'       => $this->name,
                'guard_name' => $this->guard_name,
            ])
            ->save();

        return to_route('permissions.index')
            ->with('success', 'Permission has been edited.');
    }
}
