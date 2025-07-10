<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Associate extends Model
{
    use HasFactory;

    protected $fillable = [
        'credential_id',
        'tag_id',
    ];
}
