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
// blog catgegory
Route::get('/blog/category',[App\Http\Controllers\Api\BlogController::class, 'index']);
Route::get('/allblog',[App\Http\Controllers\Api\BlogController::class, 'allblog']);
Route::get('/privacypolicy',[App\Http\Controllers\Api\PrivacyPolicyController::class, 'index']);
Route::get('/licence',[App\Http\Controllers\Api\LicenceController::class, 'index']);

// shwo home section route
Route::get('/banner',[App\Http\Controllers\Api\HomeController::class, 'showBanner']);
Route::get('/categores',[App\Http\Controllers\Api\HomeController::class, 'showCategores']);
Route::get('/explores',[App\Http\Controllers\Api\HomeController::class, 'showExplores']);
Route::get('/clientsay',[App\Http\Controllers\Api\HomeController::class, 'showClientReview']);
Route::get('/show/pricing',[App\Http\Controllers\Api\HomeController::class, 'showPrice']);
Route::get('/show/header/category',[App\Http\Controllers\Api\HomeController::class, 'getHeaderSubCategory']);
Route::get('/get/product/categores',[App\Http\Controllers\Api\ProductController::class, 'getCategores']);
Route::get('/get/product/subcategores/{catID}',[App\Http\Controllers\Api\ProductController::class, 'getSubCategores']);
Route::get('/get/product/resubcategores/{catID}/{subcatID}',[App\Http\Controllers\Api\ProductController::class, 'getReSubCategores']);

Route::get('/get/product/{catID}/{subcatID}',[App\Http\Controllers\Api\ProductController::class, 'getProductByID']);


Route::middleware('auth:api')->group(function () {
    Route::post('logout',[App\Http\Controllers\Api\UserController::class, 'logout']);
    Route::get('user', 'Api\AuthController@user');
});
