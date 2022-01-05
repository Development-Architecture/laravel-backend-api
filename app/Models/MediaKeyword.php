<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MediaKeyword extends Pivot
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'media_id',
        'is_active'
    ];

    protected $hidden = [
        'deleted_at'
    ];
}
