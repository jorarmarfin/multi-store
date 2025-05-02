<?php

namespace App\Http\Traits;

use App\Models\Product;
use App\Models\ProductSupplier;

trait ProductTrait
{
    public function getProducts()
    {
        return Product::query();
    }
    public function getProduct($product_id)
    {
        return Product::find($product_id);
    }
    public function getSuppliersByProduct($product_id)
    {
        return ProductSupplier::where('product_id', $product_id)->get();
    }
    public function getProductSupplier($product_supplier_id)
    {
        return ProductSupplier::find($product_supplier_id);
    }

}
