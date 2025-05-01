<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index()
    {
        dd(111);
    }
    public function pageCategories()
    {
        return view('warehouse.category.index');

    }
    public function pageUnits()
    {
        return view('warehouse.unit.index');
    }
    public function pageEntries()
    {
        return view('warehouse.entry.index');
    }
    public function pageOutputs()
    {
        return view('warehouse.output.index');
    }
    public function pageProducts()
    {
        return view('warehouse.product.index');
    }
    public function pageSuppliers()
    {
        return view('warehouse.supplier.index');
    }
}
