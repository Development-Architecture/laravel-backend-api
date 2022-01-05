<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MediaFile extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'media_file_name',
        'media_id',
        'public_link',
        'media_file_path',
        'media_size',
        'is_active',
        'type'
    ];

    protected $hidden = [
        'deleted_at'
    ];
}
