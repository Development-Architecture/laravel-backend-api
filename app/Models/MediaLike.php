<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MediaLike extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'media_id',
        'user_id',
        'is_like',
        'is_active'
    ];
}
