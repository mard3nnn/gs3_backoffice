<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'admin'], function () {

    Route::resource('credit-cards', \App\Http\Controllers\Admin\CreditCardController::class)->names('admin.credit-cards');

});

require __DIR__ . '/auth.php';
