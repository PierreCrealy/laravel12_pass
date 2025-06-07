<?php

namespace App\Livewire\Roles;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class RoleEdit extends Component
{
    public Role $role;
    public $allPermissions = [];
    public $permissions = [];

    public $name, $guard_name;

    public function mount(Role $role)
    {
        $this->role       = $role;
        $this->name       = $role->name;
        $this->guard_name = $role->guard_name;

        $this->allPermissions = Permission::all();
        $this->permissions = $role->permissions->pluck('name')->toArray();
    }

    public function render()
    {
        return view('livewire.roles.role-edit');
    }

    public function submit()
    {
        $this->validate([
            'name'        => 'required|unique:roles,name,'.$this->role->id,
            'guard_name'  => 'required',
            'permissions' => 'required',
        ]);

        $this->role
            ->fill([
                'name'       => $this->name,
                'guard_name' => $this->guard_name,
            ])
            ->save();

        $this->role->syncPermissions($this->permissions);

        return to_route('roles.index')
            ->with('success', 'Role has been edited.');
    }
}
