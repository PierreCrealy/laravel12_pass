<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Collection\Collection;


/**
 * App\Models\Tag
 *
 * @property int                           $id
 * @property string                        $name
 * @property string                        $value
 * @property int                           $repertory_id
 * @property object|Repertory              $repertory
 * @property Collection|Tag[]              $tags
 *
 */
class Credential extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'value',
        'repertory_id'
    ];



    // Relations

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(
            Tag::class,
            Associate::class,
            'credential_id',
            'tag_id'
        );
    }

    public function repertory(): BelongsTo
    {
        return $this->belongsTo(Repertory::class);
    }



    // Methods

    public function getTagsList(bool $withBadge): ?string
    {

        if($withBadge)
        {
            return $this->tags->map(function ($tag){
                return '<span class="inline-flex items-center rounded-md bg-lime-300 px-3 py-2 text-xs font-medium text-gray-600 ring-1 ring-gray-500/10 ring-inset">'
                    . $tag->name .
                    '</span>';
            })->join(' ');
        }

        return $this->tags->pluck('name')->join(', ');
    }

}
