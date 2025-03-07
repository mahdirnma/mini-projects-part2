<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Services\ApiResponseBuilder;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(public UserService $userService)
    {
    }

    public function index()
    {
        $result=$this->userService->getUsers();
        return (new ApiResponseBuilder())->data($result->data)->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $result=$this->userService->addUser($request->validated());
        $apiResponse=$result->success?
            (new ApiResponseBuilder())->message('user added successfully'):
            (new ApiResponseBuilder())->message('user added unsuccessfully');
        return $apiResponse->data($result->data)->response();

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $result=$this->userService->showUser($user);
        $apiResponse=$result->success?
            (new ApiResponseBuilder())->message('user showed successfully'):
            (new ApiResponseBuilder())->message('user showed unsuccessfully');
        return $apiResponse->data($result->data)->response();

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
