<?php

namespace App\Http\Traits;

use App\Models\Product;
use App\Models\ProductSupplier;

trait ProductTrait
{
    public function getProducts()
    {
        $product = Product::query();
        if ($this->search) {
            $searchTerm = $this->normalizeString($this->search);
            $product->whereRaw('LOWER(name) LIKE ?', ['%' . $searchTerm . '%']);
        }
        return $product;
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
    private function normalizeString($string)
    {
        // Convertir a minúsculas
        $string = mb_strtolower($string, 'UTF-8');

        // Eliminar acentos y caracteres especiales
        $string = str_replace(
            ['á', 'é', 'í', 'ó', 'ú', 'ü', 'ñ', 'à', 'è', 'ì', 'ò', 'ù'],
            ['a', 'e', 'i', 'o', 'u', 'u', 'n', 'a', 'e', 'i', 'o', 'u'],
            $string
        );

        return trim($string);
    }

}
