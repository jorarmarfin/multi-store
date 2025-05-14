<?php

use App\Http\Controllers\Reports\ReportProductController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','verified'])
    ->prefix('reports')
    ->name('reports.')
    ->group(function () {

        Route::get('products', [ReportProductController::class, 'pdf'])
            ->name('products');
    });

