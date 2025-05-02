<div>
    <form class="grid grid-cols-4 gap-3" wire:submit="saveInventoryMovement">
        <div class="form-group">
            <label for="product_id" class="form-label
                @error('product_id') is-invalid @enderror">
                Producto
            </label>
            <select id="product_id" class="form-select" wire:model="form.product_id">
                <option value="">Seleccione un producto</option>
                @foreach($products as $key => $product)
                    <option value="{{ $key }}">{{ $product }}</option>
                @endforeach
            </select>
            @error('form.product_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="warehouse_id" class="form-label
                @error('warehouse_id') is-invalid @enderror">
                Almacén
            </label>
            <select id="warehouse_id" class="form-select" wire:model="form.warehouse_id">
                <option value="">Seleccione un almacén</option>
                @foreach($warehouses as $key => $warehouse)
                    <option value="{{ $key }}">{{ $warehouse }}</option>
                @endforeach
            </select>
            @error('form.warehouse_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="quantity" class="form-label
                @error('quantity') is-invalid @enderror">
                Cantidad
            </label>
            <input type="number" id="quantity" class="form-text" wire:model="form.quantity">
            @error('form.quantity')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="movement_date" class="form-label
                @error('movement_date') is-invalid @enderror">
                Fecha de movimiento
            </label>
            <input type="date" id="movement_date" class="form-text" wire:model="form.movement_date">
            @error('form.movement_date')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="reference" class="form-label
                @error('reference') is-invalid @enderror">
                Referencia
            </label>
            <input type="text" id="reference" class="form-text" wire:model="form.reference">
            @error('form.reference')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="notes" class="form-label
                @error('notes') is-invalid @enderror">
                Notas
            </label>
            <textarea id="notes" class="form-textarea" wire:model="form.notes"></textarea>
            @error('form.notes')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>




        <div class="pt-12">
            <button type="submit" class="btn-primary">
                @if($isEdit)
                    Actualizar
                @else
                    Guardar
                @endif
            </button>
        </div>

    </form>
    <div class="table-container">
        <table>
            <thead>
            <tr>
                <th>Producto</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($inventoryMovements as $inventoryMovement)
                <tr>
                    <td>{{ $inventoryMovement->name }}</td>
                    <td>
                        <button wire:click="editInventoryMovement({{ $inventoryMovement->id }})" class="btn-secondary">
                            Editar
                        </button>
                        <button @click="$dispatch('alert-delete',{{$inventoryMovement->id}})" class="btn-danger">
                            Eliminar
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $inventoryMovements->links() }}
        </div>
    </div>
</div>
@script
<script>
    $wire.on('alert-delete', (category_id) => {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminarlo'
        }).then((result) => {
            if (result.isConfirmed) {
                $wire.deleteInventoryMovement(category_id);
                Swal.fire(
                    'Eliminado!',
                    'La categoría ha sido eliminada.',
                    'success'
                )
            }
        })
    });
</script>
@endscript
