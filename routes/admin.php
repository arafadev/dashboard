<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;

Route::group(['prefix' => 'admin', 'middleware' => 'guest:admin', 'as' => 'admin.'], function () {
    Route::get('login', [AdminLoginController::class, 'getLogin'])->name('login.form');
    Route::post('login', [AdminLoginController::class, 'login'])->name('login');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin', 'as' => 'admin.'], function () {

    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

});
