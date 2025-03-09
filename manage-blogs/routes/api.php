<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/auth',LoginController::class)->name('login');
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('users',UserController::class);
    Route::apiResource('tags',TagController::class)->only(['store','update','destroy']);
    Route::apiResource('categories',CategoryController::class)->only(['store','update','destroy']);
    Route::apiResource('articles',ArticleController::class)->only(['store','update','destroy']);
});
Route::apiResource('tags',TagController::class)->only(['index','show']);
Route::apiResource('categories',CategoryController::class)->only(['index','show']);
Route::apiResource('articles',ArticleController::class)->only(['index','show']);
