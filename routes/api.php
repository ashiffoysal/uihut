<?php

use App\Models\User;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/token', function (Request $request) {
    $user = User::find(1);
    $token = $user->createToken('Token Name')->accessToken;
    return response()->json($token);
});

Route::post('/user/register',[App\Http\Controllers\Api\UserController::class, 'register']);
Route::post('/user/email/varify',[App\Http\Controllers\Api\UserController::class, 'emailVarify']);
Route::post('/login',[App\Http\Controllers\Api\UserController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('logout',[App\Http\Controllers\Api\UserController::class, 'logout']);
    Route::get('user', 'Api\AuthController@user');
});
