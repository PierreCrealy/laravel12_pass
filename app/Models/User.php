<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory,
        Notifiable,
        HasRoles,
        SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->map(fn (string $name) => Str::of($name)->substr(0, 1))
            ->implode('');
    }

    public function getRolesList(bool $withBadge): ?string
    {

        if($withBadge)
        {
            return $this->roles->map(function ($role){
                return '<span class="inline-flex items-center rounded-md bg-lime-300 px-3 py-2 text-xs font-medium text-gray-600 ring-1 ring-gray-500/10 ring-inset">'
                    . $role->name .
                    '</span>';
            })->join(' ');
        }

        return $this->roles->pluck('name')->join(', ');
    }
}
