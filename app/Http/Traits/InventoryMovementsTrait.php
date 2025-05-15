<?php

namespace App\Http\Traits;

use App\Exports\DispatchExport;
use App\Exports\EntryExport;
use App\Exports\InventoryExport;
use App\Models\InventoryMovement;
use App\Models\Stock;
use Maatwebsite\Excel\Facades\Excel;

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
    public function exportFileEntry()
    {
        return Excel::download(new EntryExport(), $this->getNameFileToExport('entradas'));
    }
    public function exportFileDispatch()
    {
        return Excel::download(new DispatchExport, $this->getNameFileToExport('salidas'));
    }
    public function exportInventory()
    {
        return Excel::download(new InventoryExport, $this->getNameFileToExport('inventario') );
    }
    public function dataExportMovement($id)
    {
        return InventoryMovement::join('products', 'inventory_movements.product_id', '=', 'products.id')
            ->join('warehouses', 'inventory_movements.warehouse_id', '=', 'warehouses.id')
            ->join('users', 'inventory_movements.user_id', '=', 'users.id')
            ->select(
                'products.name as product_name',
                'warehouses.name as warehouse_name',
                'inventory_movements.quantity',
                'inventory_movements.movement_date',
                'inventory_movements.reference',
                'inventory_movements.notes',
                'users.name as user_name',
            )
            ->where('movement_type_id', $id)
            ->get();
    }
    public function dataExportInventory()
    {
        return Stock::join('products', 'stocks.product_id', '=', 'products.id')
            ->join('warehouses', 'stocks.warehouse_id', '=', 'warehouses.id')
            ->select(
                'products.name as product_name',
                'warehouses.name as warehouse_name',
                'stocks.quantity',
                'stocks.created_at',
                'stocks.updated_at',
            )
            ->get();
    }
    private function getNameFileToExport($type)
    {
        return date('Y-m-d_His') . '_' . $type . '.xlsx';
    }

}
