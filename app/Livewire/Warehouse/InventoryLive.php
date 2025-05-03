<?php

namespace App\Livewire\Warehouse;

use App\Http\Traits\StockTrait;
use Livewire\Component;
use Livewire\WithPagination;

class InventoryLive extends Component
{
    use StockTrait, WithPagination;
    public function render()
    {
        return view('livewire.warehouse.inventory-live',[
            'stocks' => $this->getStocks()->paginate(50)
        ]);
    }
}
