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

Route::group(['prefix' => 'v1', 'as' => 'v1.'], function () {
    Route::group(['prefix' => 'webhook', 'as' => 'webhook.'], function () {
        Route::group(['prefix' => 'google', 'as' => 'google.'], function () {
            Route::group(['prefix' => 'dialogflow', 'as' => 'dialogflow.'], function () {
                Route::post('restaurant', [\App\Http\Controllers\Api\V1\Webhook\Google\DialogFlow\RestaurantController::class, 'index'])->name('index');
                Route::post('menu', [\App\Http\Controllers\Api\V1\Webhook\Google\DialogFlow\MenuController::class, 'index'])->name('index');
            });
        });
    });
});
