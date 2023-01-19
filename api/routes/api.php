<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HobbyController;
use App\Http\Controllers\Api\ProfileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::apiResource('hobby', HobbyController::class);
Route::post('/hobby/search', [HobbyController::class, 'search']);
Route::get('/hobby/types', [HobbyController::class, '']);
Route::post('/register', [AuthController::class, 'register' ]);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/profile/index', [ProfileController::class, 'index']);
    Route::post('/profile/store', [ProfileController::class, 'store']);
    Route::delete('/profile/delete', [ProfileController::class, 'delete']);
});
