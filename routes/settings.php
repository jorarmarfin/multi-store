<?php

use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('settings', [SettingController::class, 'index'])
            ->name('settings');
    });

