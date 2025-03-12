<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(StoreLoginRequest $request)
    {
        if (!Auth::attempt($request->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $token = Auth::user()->createToken('authToken')->plainTextToken;
        return response()->json([
            'user'=>Auth::user(),
            'token' => $token
        ]);
    }
}
