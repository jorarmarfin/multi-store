<div>
    <div class="table-container">
        <table>
            <thead>
            <tr>
                <th>Log</th>
                <th>Descripción</th>
                <th>Modelo</th>
                <th>Evento</th>
                <th>Modelo ejecutor</th>
                <th>Propiedades</th>
                <th>Fecha</th>

            </tr>
            </thead>
            <tbody>
            @foreach ($audits as $audit)
                <tr>
                    <td>{{ $audit->log_name }}</td>
                    <td>
                        @if ($audit->description)
                            {{ $audit->description }}
                        @else
                            {{ $audit->properties['attributes']['description'] ?? 'No description available' }}
                        @endif
                    </td>
                    <td>{{ $audit->subject_type }}</td>
                    <td>{{ $audit->event }}</td>
                    <td>{{ $audit->causer_type }}</td>
                    <td>{{ $audit->properties }}</td>
                    <td>{{ $audit->created_at->format('Y-m-d H:i:s') }}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $audits->links() }}
        </div>
    </div>
</div>

