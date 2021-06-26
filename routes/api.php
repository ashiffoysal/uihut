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

Route::middleware('auth:api')->group(function(){

    Route::get('/product/save/{id}',[App\Http\Controllers\Api\ProductController::class, 'productSave']);
    Route::get('/get/save/product',[App\Http\Controllers\Api\ProductController::class, 'getSaveProduct']);

    Route::get('/get/paddle/pay/link',[App\Http\Controllers\Api\PaddelController::class, 'showPaddlePayLink']);

    Route::post('/get/download/link',[App\Http\Controllers\Api\ProductController::class, 'getDownloadLink']);

    Route::get('/check/subcriber',[App\Http\Controllers\Api\ProductController::class, 'checkSubscriber']);

});

Route::post('/user/register',[App\Http\Controllers\Api\UserController::class, 'register']);
Route::post('/user/email/varify',[App\Http\Controllers\Api\UserController::class, 'emailVarify']);
Route::post('/login',[App\Http\Controllers\Api\UserController::class, 'login']);
// blog catgegory
Route::get('/blog/category',[App\Http\Controllers\Api\BlogController::class, 'index']);
Route::get('/allblog',[App\Http\Controllers\Api\BlogController::class, 'allblog']);
Route::get('/privacypolicy',[App\Http\Controllers\Api\PrivacyPolicyController::class, 'index']);
Route::get('/licence',[App\Http\Controllers\Api\LicenceController::class, 'index']);
Route::get('/termsandcondition',[App\Http\Controllers\Api\TremsAndConditionController::class, 'index']);

Route::get('/social',[App\Http\Controllers\Api\LogoController::class, 'social']);
Route::get('/logo',[App\Http\Controllers\Api\LogoController::class, 'Logo']);

// shwo home section route
Route::get('/banner',[App\Http\Controllers\Api\HomeController::class, 'showBanner']);
Route::get('/categores',[App\Http\Controllers\Api\HomeController::class, 'showCategores']);
Route::get('/explores',[App\Http\Controllers\Api\HomeController::class, 'showExplores']);
Route::get('/clientsay',[App\Http\Controllers\Api\HomeController::class, 'showClientReview']);
Route::get('/show/pricing',[App\Http\Controllers\Api\HomeController::class, 'showPrice']);
Route::get('/show/header/category',[App\Http\Controllers\Api\HomeController::class, 'getHeaderSubCategory']);
Route::get('/get/product/categores',[App\Http\Controllers\Api\ProductController::class, 'getCategores']);
Route::get('/product/{id}',[App\Http\Controllers\Api\ProductController::class, 'getSingleProduct']);

Route::get('/get/product/subcategores/{catID}',[App\Http\Controllers\Api\ProductController::class, 'getSubCategores']);
Route::get('/get/product/resubcategores/{catID}/{subcatID}',[App\Http\Controllers\Api\ProductController::class, 'getReSubCategores']);

Route::get('/count/item/{catID}/{subcatID}',[App\Http\Controllers\Api\ProductController::class, 'countFreeItem']);
Route::get('/get/software/type',[App\Http\Controllers\Api\ProductController::class, 'softwareType']);
Route::get('/get/resub/categores/tag',[App\Http\Controllers\Api\ProductController::class, 'getResubCategoreTag']);



Route::get('/get/filter/product/{cat}/{subcat}',[App\Http\Controllers\Api\ProductController::class, 'getFilterProduct']);

Route::get('/search/resubcat/{cat}/{subcat}',[App\Http\Controllers\Api\ProductController::class, 'searchReSubCat']);
Route::get('/similer/product/{id}',[App\Http\Controllers\Api\ProductController::class, 'similerProduct']);




Route::get('/get/product/{catID}/{subcatID}',[App\Http\Controllers\Api\ProductController::class, 'getProductByID']);


Route::middleware('auth:api')->group(function () {
    Route::post('logout',[App\Http\Controllers\Api\UserController::class, 'logout']);
    Route::get('user', 'Api\AuthController@user');
});

Route::post('/subscrive/user',[App\Http\Controllers\Api\SubcriveController::class, 'store']);