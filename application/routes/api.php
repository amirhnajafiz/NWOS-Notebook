<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('user', [\App\Http\Controllers\API\UserController::class, 'create_user']);

Route::delete('user', [\App\Http\Controllers\API\UserController::class, 'remove_user']);

Route::post('notify', [\App\Http\Controllers\API\UserController::class, 'call_user']);
