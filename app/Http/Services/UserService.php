<?php

namespace App\Http\Services;

use App\Models\User;

class UserService
{
    public function userCount(){
        return $showCounts = User::count();
    }

    public function addUser($data)
    {
        return User::create($data);
    }

    public function userListing()
    {
        $data = User::select('name','email','status')->get();
    }
}
