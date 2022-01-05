<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SearchCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'is_active'
    ];

    protected $hidden = [
        'deleted_at',
    ];

    public function subCategories()
    {
        return $this->hasMany(SearchSubCategory::class);
    }

    public function subSubCategories()
    {
        return $this->hasMany(SearchSubCategory::class)->whereNotNull('search_sub_category_id');
    }

    public function NotsubSubCategories()
    {
        return $this->hasMany(SearchSubCategory::class)->whereNull('search_sub_category_id');
    }
}
