<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserCollectionMedia extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'user_collection_id',
        'media_id',
        'media_file_id',
        'is_active'
    ];
}
