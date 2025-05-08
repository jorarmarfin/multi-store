<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Product extends Model
{
    protected $guarded = ['id'];
    use LogsActivity;

    // Otros atributos y métodos del modelo...

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'category_id', 'price'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->useLogName('product')
            ->setDescriptionForEvent(fn(string $eventName) => "Producto {$eventName}");
    }
    /**
     * Obtiene la categoría a la que pertenece el producto
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Obtiene el proveedor del producto
     */
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    /**
     * Obtiene la unidad de medida del producto
     */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }
    protected static function booted()
    {
        static::created(function ($product) {
            $prefix = mb_strtoupper(substr($product->name, 0, 3));
            $suffix = str_pad($product->id, 5, '0', STR_PAD_LEFT); // LAP00001
            $product->code = $prefix . $suffix;
            $product->saveQuietly(); // evita recursividad
        });
    }

}
