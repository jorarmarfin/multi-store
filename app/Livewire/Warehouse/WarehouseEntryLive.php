<?php

namespace App\Livewire\Warehouse;

use App\Http\Traits\InventoryMovementsTrait;
use App\Http\Traits\DdlTrait;
use App\Http\Traits\MovementTypeTrait;
use App\Livewire\Forms\InventoryMovementsForm;
use Livewire\Component;
use Livewire\WithPagination;

class WarehouseEntryLive extends Component
{
    use InventoryMovementsTrait,MovementTypeTrait, DdlTrait, WithPagination;
    public InventoryMovementsForm $form;
    public bool $isEdit = false;
    public int $category_id;
    public function render()
    {
        return view('livewire.warehouse.warehouse-entry-live',[
            'inventoryMovements' => $this->getInventoryMovements('Entrada')->paginate(50),
            'products' => $this->ddlProducts(),
            'movement_type' => $this->getMovementTypeByField('name', 'Entrada')->id,
            'warehouses' => $this->ddlWarehouses(),
        ]);
    }
    public function saveInventoryMovement():void
    {
        if($this->isEdit){
            $this->form->update($this->getInventoryMovement($this->category_id));
            $title = 'Actualizar ingreso';
            $icon = 'success';
            $message = 'Ingreso actualizado correctamente';
            $this->isEdit = false;
        }else{
            $this->form->store();
            $title = 'Guardar ingreso';
            $icon = 'success';
            $message = 'Ingreso guardado correctamente';
        }
        $this->dispatch('alert', [
            'title' => $title,
            'icon' => $icon,
            'message' => $message,
        ]);
    }
    public function editInventoryMovement($category_id):void
    {
        $this->form->show($this->getInventoryMovement($category_id));
        $this->isEdit = true;
        $this->category_id = $category_id;
    }
    public function deleteInventoryMovement($category_id):void
    {
        $this->form->delete($category_id);
    }
}
