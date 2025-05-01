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
}
