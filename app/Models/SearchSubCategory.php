<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SearchSubCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'search_category_id',
        'search_sub_category_id',
        'has_category',
        'is_active'
    ];

    protected $hidden = [
        'deleted_at',
    ];

    public function mainCategories()
    {
        return $this->hasMany(SearchSubCategoryMainCategory::class);
    }
}
