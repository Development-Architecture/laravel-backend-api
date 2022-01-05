<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public static function index()
    {
        return Category::where('is_active', true)->get();
    }
}