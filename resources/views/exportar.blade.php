<!-- resources/views/clientes/export.blade.php -->
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Teléfono</th>
            <th>Correo</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach($clientes as $cliente)
            <tr>
                <td>{{ $cliente->nombre }}</td>
                <td>{{ $cliente->a_paterno }}</td>
                <td>{{ $cliente->a_materno }}</td>
                <td>{{ $cliente->telefono }}</td>
                <td>{{ $cliente->correo }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
