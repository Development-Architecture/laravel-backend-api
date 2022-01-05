<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MediaCategory extends Pivot
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'media_id',
        'category_id',
        'is_active'
    ];

    protected $hidden = [
        'deleted_at'
    ];

    public function media()
    {
        return $this->belongsTo(Media::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
