<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function getUsers()
    {
        try {
            return new ResultService(true,User::where('is_active',1)->get());
        }
        catch (\Throwable $exception) {
            return new ResultService(false,$exception->getMessage());
        }
    }
    public function storeUser($user){
        try {
            return new ResultService(true,User::create($user));
        }
        catch (\Throwable $exception) {
            return new ResultService(false,$exception->getMessage());
        }
    }

    public function showUser($user)
    {
        try {
            return new ResultService(true,$user);
        }
        catch (\Throwable $exception) {
            return new ResultService(false,$exception->getMessage());
        }
    }
    public function updateUser($data,$user){
        try {
            return new ResultService(true,$user->update($data));
        }
        catch (\Throwable $exception) {
            return new ResultService(false,$exception->getMessage());
        }
    }
    public function deleteUser($user){
        try {
            return new ResultService(true,$user->update(['is_active'=>0]));
        }
        catch (\Throwable $exception) {
            return new ResultService(false,$exception->getMessage());
        }
    }
}
