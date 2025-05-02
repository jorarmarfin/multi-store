<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InventoryMovement extends Model
{
    protected $guarded = ['id'];

    /**
     * Obtiene el producto asociado al movimiento de inventario
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Obtiene el tipo de movimiento
     */
    public function movementType(): BelongsTo
    {
        return $this->belongsTo(MovementType::class);
    }

    /**
     * Obtiene el almacén asociado al movimiento
     */
    public function warehouse(): BelongsTo
    {
        return $this->belongsTo(Warehouse::class);
    }

    /**
     * Obtiene el usuario que realizó el movimiento
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
