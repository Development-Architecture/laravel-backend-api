<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public static function store($request) : Category
    {
        return Category::create($request);
    }

    public static function update($data, $request) : Category
    {
        $data->update($request);
        return $data;
    }
}