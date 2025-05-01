<?php

use App\Http\Controllers\Warehouse\WarehouseController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','verified'])
    ->prefix('warehouse')
    ->name('warehouse.')
    ->group(function () {
    Route::get('/', [WarehouseController::class, 'index'])
        ->name('index');
    Route::get('categories', [WarehouseController::class, 'pageCategories'])
        ->name('categories');
    //unidades
    Route::get('units', [WarehouseController::class, 'pageUnits'])
        ->name('units');
});

