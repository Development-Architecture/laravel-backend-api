<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SearchSubCategoryMainCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sub_search_categories';

    protected $fillable = [
        'category_id',
        'search_sub_category_id',
        'is_all',
        'is_active'
    ];

    protected $hidden = [
        'deleted_at',
    ];
}
