<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
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
class Tag extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
    ];



    // Relations

    public function credentials(): BelongsToMany
    {
        return $this->belongsToMany(
            Credential::class,
            Associate::class,
            'tag_id',
            'credential_id'
        );
    }

}
