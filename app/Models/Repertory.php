<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Ramsey\Collection\Collection;


/**
 * App\Models\Tag
 *
 * @property int                           $id
 * @property string                        $name
 * @property string                        $slug
 * @property Collection|Credential[]       $credentials
 *
 */
class Repertory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function credentials(): HasMany
    {
        return $this->hasMany(Credential::class);
    }
}
