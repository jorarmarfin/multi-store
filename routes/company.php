<?php

use App\Http\Controllers\Warehouse\WarehouseController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','verified'])
    ->prefix('company')
    ->name('company.')
    ->group(function () {

    Route::get('products', [WarehouseController::class, 'pageProducts'])
        ->name('products');
});

