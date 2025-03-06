<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function getUsers()
    {
        return app(TryService::class)(function(){
            return User::where('is_active',1)->get();
        });
    }

    public function addUser($user)
    {
        return app(TryService::class)(function() use ($user){
            return User::create($user);
        });
    }
    public function getUser($userId)
    {
        return app(TryService::class)(function() use ($userId) {
            return $userId;
        });
    }
    public function updateUser($data,User $user){
        return app(TryService::class)(function () use ($data,$user){
            $user->update($data);
            return $user;
        });
    }
    public function deleteUser($userId){
        return app(TryService::class)(function() use ($userId) {
            return $userId->update(['is_active'=>0]);
        });
    }
}
