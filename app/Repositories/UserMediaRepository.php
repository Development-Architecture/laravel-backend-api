<?php

namespace App\Repositories;

use App\Models\Category;

class UserMediaRepository
{
    public static function groupCategoryMedia()
    {
        $data = Category::with(['medias', 'medias.mediaFile'])->whereHas('medias', function($q){
            return $q;
        })->get()->take(6);
        return $data;
    }
}