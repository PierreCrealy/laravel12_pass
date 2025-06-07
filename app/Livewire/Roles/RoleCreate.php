<?php

namespace App\Livewire\Roles;

use App\Models\Permission;
use App\Models\Role;
use Livewire\Component;

class RoleCreate extends Component
{
    public Role $role;
    public $allPermissions = [];
    public $permissions = [];

    public $name, $guard_name;

    public function mount()
    {
        $this->allPermissions = Permission::all();
    }

    public function render()
    {
        return view('livewire.roles.role-create');
    }

    public function submit()
    {
        $this->validate([
            'name'        => 'required|unique:roles,name',
            'guard_name'  => 'required',
            'permissions' => 'required',
        ]);

        $newRole = new Role;
        $newRole
            ->fill([
                'name'       => $this->name,
                'guard_name' => $this->guard_name,
            ])
            ->save();

        $newRole->syncPermissions($this->permissions);

        return to_route('roles.index')
            ->with('success', 'Role has been edited.');
    }
}
