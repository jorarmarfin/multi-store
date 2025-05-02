<?php

namespace App\Http\Traits;

use App\Models\InventoryMovement;

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

}
