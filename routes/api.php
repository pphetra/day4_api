<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyUserController;



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

Route::get('/allusers', [MyUserController::class, 'indexAll']);

Route::get('/users', [MyUserController::class, 'index']);

Route::get('/users/{id}', [MyUserController::class, 'show']);

Route::post('/users',[MyUserController::class, 'store']);

Route::put('/users/{id}', [MyUserController::class, 'update']);

Route::delete('/users/{id}', [MyUserController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
