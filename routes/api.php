<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/orders', [OrderController::class,'index']);
Route::post('/orders', [OrderController::class,'store']);

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/signin', [AuthController::class,'signin']);
    Route::post('/signup', [AuthController::class,'signup']);
    Route::get('/logout', [AuthController::class,'logout']);
    Route::get('/me', [AuthController::class,'me']);
    Route::get('/refresh', [AuthController::class,'refresh']);
});