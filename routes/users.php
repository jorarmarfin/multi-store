<?php

use App\Http\Controllers\Users\UsersController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','verified'])
    ->prefix('users')
    ->name('users.')
    ->group(function () {

        Route::get('users', [UsersController::class, 'pageUsers'])
            ->name('users');
        Route::get('roles', [UsersController::class, 'pageRoles'])
            ->name('roles');
        Route::get('permissions', [UsersController::class, 'pagePermissions'])
            ->name('permissions');
    });

