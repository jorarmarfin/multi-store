<div>
    <div class="table-container">
        <table>
            <thead>
            <tr>
                <th>Producto</th>
                <th>Almacén</th>
                <th>Cantidad</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($stocks as $stock)
                <tr>
                    <td>{{ $stock->product->name }}</td>
                    <td>{{ $stock->warehouse->name }}</td>
                    <td>{{ $stock->quantity }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $stocks->links() }}
        </div>
    </div>
</div>
