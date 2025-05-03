<?php

namespace App\Http\Traits;

use App\Models\InventoryMovement;
use App\Models\Stock;

trait InventoryMovementsTrait
{
    public function getInventoryMovements($type)
    {
        $movement_type_id = $this->getMovementTypeByField('name', $type)->id;
        return InventoryMovement::where('movement_type_id', $movement_type_id)
            ->with(['product', 'warehouse'])
            ->orderBy('created_at', 'desc')
            ;
    }
    public function getInventoryMovement($inventory_movement_id)
    {
        return InventoryMovement::find($inventory_movement_id);
    }
    public function validarStockDisponible($movement_type,$product_id,$warehouse_id): bool
    {
        // Entradas siempre son válidas
        if ($movement_type === 'Entrada') {
            return true;
        }

        // Para salidas: verificar el stock
        $stock = Stock::where('product_id', $product_id)
            ->where('warehouse_id', $warehouse_id)
            ->first();

        if (!$stock || $this->form->quantity > $stock->quantity) {
            return false;
        }

        return true;
    }

}
