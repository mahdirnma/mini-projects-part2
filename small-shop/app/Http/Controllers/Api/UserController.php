<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\ApiResponseBuilder;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(Private UserService $userService)
    {
    }

    public function index()
    {
        $result = $this->userService->getUsers();
        return (new ApiResponseBuilder())->data([$result])->get()->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $result=$this->userService->storeUser($request->validated());
        return (new ApiResponseBuilder())->message('user added successfully')->data([$result])->get()->response();
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $result=$this->userService->showUser($user);
        return (new ApiResponseBuilder())->message('user showed successfully')->data([$result])->get()->response();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $result=$this->userService->updateUser($request->validated(), $user);
        return (new ApiResponseBuilder())->message('user updated successfully')->data([$result])->get()->response();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->userService->deleteUser($user);
        return (new ApiResponseBuilder())->message('user deleted successfully')->get()->response();
    }
}
