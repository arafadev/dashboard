<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Provider\ProviderDashboardController;
use App\Http\Controllers\Provider\Auth\ProviderLoginController;



Route::group(['prefix' => 'provider', 'middleware' => 'guest:provider', 'as' => 'provider.'], function () {
    Route::get('login', [ProviderLoginController::class, 'getLogin'])->name('login.form');
    Route::post('login', [ProviderLoginController::class, 'login'])->name('login');
});

Route::group(['prefix' => 'provider', 'middleware' => 'auth:provider', 'as' => 'provider.'], function () {

    Route::get('dashboard', [ProviderDashboardController::class, 'index'])->name('dashboard');
});
