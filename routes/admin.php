<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;

Route::redirect('/', '/admin/login');

Route::group(['prefix' => 'admin', 'middleware' => 'guest:admin', 'as' => 'admin.'], function () {
    Route::get('login', [AdminLoginController::class, 'getLogin'])->name('login.form');
    Route::post('login', [AdminLoginController::class, 'login'])->name('login');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin', 'as' => 'admin.'], function () {

    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('logout', [AdminLoginController::class, 'logout'])->name('logout');

    // Users
    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('users/index', [UserController::class, 'index'])->name('index');
        Route::get('user/create', [UserController::class, 'create'])->name('create');
    });
    //  Route::post('user/store', [UserController::class, 'store'])->name('admins.user.store');
    //  Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('admins.user.edit');
    //  Route::post('user/update/{id}', [UserController::class, 'update'])->name('admins.user.update');
    //  Route::get('user/delete/{id}', [UserController::class, 'delete'])->name('admins.user.delete');
    //  Route::get('user/active/{id}', [UserController::class, 'active'])->name('admins.user.active');
    //  Route::get('user/inactive/{id}', [UserController::class, 'inactive'])->name('admins.user.inactive');

});
