<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CreditCardController;

Route::post('auth/login', [AuthController::class, 'login']);


Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'auth'

], function ($router) {

    Route::group([
        'middleware' => 'auth:api',
    ], function ($router) {
        Route::post('me', [AuthController::class, 'me']);
    });
});


Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'credit-cards'
], function ($router) {

    Route::get('/my-cards', [CreditCardController::class, 'cards']);
    Route::get('/transactions/{id}', [CreditCardController::class, 'transactions']);

});
