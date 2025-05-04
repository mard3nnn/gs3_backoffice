<?php

use App\Http\Controllers\Admin\CreditCardController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'admin'], function () {

    Route::resource('users', UserController::class)
        ->names('admin.users');

    Route::resource('credit-cards', CreditCardController::class)
        ->only(['index', 'create', 'edit', 'destroy'])
        ->names('admin.credit-cards');

});

require __DIR__ . '/auth.php';
