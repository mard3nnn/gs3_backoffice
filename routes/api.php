<?php

use App\Http\Controllers\Api\AuthController;

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);

    Route::group([
        'middleware' => 'auth:api',
    ], function ($router) {

        Route::post('me', [AuthController::class, 'me']);

    });

});