<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'guard_name',
    ];

    public function getPermissionsList(bool $withBadge): ?string
    {

        if($withBadge)
        {
            return $this->permissions->map(function ($permission){
                return '<span class="inline-flex items-center rounded-md bg-lime-300 px-3 py-2 text-xs font-medium text-gray-600 ring-1 ring-gray-500/10 ring-inset">'
                            . $permission->name .
                        '</span>';
            })->join(' ');
        }

        return $this->permissions->pluck('name')->join(', ');
    }

}
