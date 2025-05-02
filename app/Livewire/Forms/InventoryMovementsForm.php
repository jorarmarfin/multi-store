<?php

namespace App\Livewire\Forms;

use App\Models\InventoryMovement;
use Livewire\Attributes\Validate;
use Livewire\Form;

class InventoryMovementsForm extends Form
{
    #[Validate('required')]
    public int $product_id = 0;
    #[Validate('required')]
    public int $movement_type_id = 0;
    #[Validate('required')]
    public int $warehouse_id = 0;
    #[Validate('required')]
    public int $quantity = 0;
    public int $user_id = 0;
    #[Validate('required')]
    public $movement_date = '';
    #[Validate('required')]
    public $reference = '';
    #[Validate('required')]
    public $notes = '';

    public function store()
    {
        $this->validate();

        InventoryMovement::create(
            $this->only([
                'product_id',
                'movement_type_id',
                'warehouse_id',
                'quantity',
                'user_id',
                'movement_date',
                'reference',
                'notes'
            ])
        );
        $this->reset();
    }
    public function show(InventoryMovement $category): void
    {
        $this->fill([
            'name' => $category->name,
            'description' => $category->description,
            'active' => (bool)$category->active,
        ]);
    }
    public function update(InventoryMovement $category): void
    {
        $this->validate();

        $category->update(
            $this->only(['name', 'description', 'active'])
        );
        $this->reset();
    }
    public function delete($category_id): void
    {
        $category = InventoryMovement::find($category_id);
        $category->delete();
    }
}
