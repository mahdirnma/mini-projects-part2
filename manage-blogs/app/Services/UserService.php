<?php

namespace App\Services;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;

class UserService
{
    public function getUsers()
    {
        return app(TryService::class)(function (){
            return User::where('is_active',1)->get();
        });
    }
    public function addUser(User $user){
        return app(TryService::class)(function () use ($user){
            return User::create($user);
        });
    }

    public function showUser(User $user)
    {
        return app(TryService::class)(function () use ($user){
            return $user;
        });
    }
    public function updateUser($data,User $user){
        return app(TryService::class)(function () use ($data,$user){
            $user->update($data);
            return $user;
        });
    }
    public function deleteUser(User $user){
        return app(TryService::class)(function () use ($user){
            $user->update(['is_active'=>0]);
            return $user;
        });
    }
}
