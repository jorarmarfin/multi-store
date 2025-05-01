<?php

namespace App\Http\Traits;

use App\Models\Product;

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

}
