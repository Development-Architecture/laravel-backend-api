<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubMediaType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'media_type_id',
        'is_active'
    ];

    protected $hidden = [
        'deleted_at',
    ];
}
