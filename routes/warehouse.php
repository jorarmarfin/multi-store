<?php

use App\Http\Controllers\Warehouse\WarehouseController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','verified'])
    ->prefix('warehouse')
    ->name('warehouse.')
    ->group(function () {
    Route::get('products', [WarehouseController::class, 'pageProducts'])
        ->name('products');

    Route::get('entries', [WarehouseController::class, 'pageEntries'])
        ->name('entries');
    Route::get('outputs', [WarehouseController::class, 'pageOutputs'])
        ->name('outputs');
    Route::get('suppliers', [WarehouseController::class, 'pageSuppliers'])
        ->name('suppliers');
    Route::get('categories', [WarehouseController::class, 'pageCategories'])
        ->name('categories');
    Route::get('units', [WarehouseController::class, 'pageUnits'])
        ->name('units');
});

