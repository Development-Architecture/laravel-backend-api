<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public static function store($data) : User
    {
        return User::create($data);
    }

    public static function update($data, $request) : User
    {
        $data->update($request);
        return $data;
    }
}