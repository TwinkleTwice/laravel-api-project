<?php


use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Resources\AuthUserResource;
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

Route::group(['prefix' => 'auth'], function () {
    Route::post('register', [AuthController::class, 'createUser']);
    Route::post('login', [AuthController::class, 'loginUser']);
});

Route::group(['prefix' => 'categories'], function () {
    Route::get('list', [CategoryController::class, 'list']);
    Route::post('add', [CategoryController::class, 'add']);
});

Route::group(['prefix' => 'products'], function () {
    Route::get('lower-price', [ProductController::class, 'lowerPrice']);
    Route::get('higher-price', [ProductController::class, 'higherPrice']);
    Route::get('catalog/{slug?}', [ProductController::class, 'catalog']);
    Route::get('{product:slug}', [ProductController::class, 'getProduct']);
});

Route::group(['prefix' => 'cart'], function () {
    Route::post('add', [CartController::class, 'add']);
    Route::post('remove', [CartController::class, 'remove']);
    Route::post('quantity', [CartController::class, 'quantity']);
    Route::get('total', [CartController::class, 'total']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return new AuthUserResource($request->user());
    });
});
