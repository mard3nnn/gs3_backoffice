<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Middleware\ApiAuthMiddleware;

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);

    Route::group([
        'middleware' => 'auth',
    ], function ($router) {

        Route::post('me', [AuthController::class, 'me']);

    });

});