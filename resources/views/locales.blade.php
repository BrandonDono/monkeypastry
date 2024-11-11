{{-- resources/views/locales.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locales</title>
</head>
<body>
    <h1>Locales</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('locales_crear') }}" class="btn btn-primary mb-3">Crear Nuevo Local</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>RUC</th>
                <th>Administrador</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($locales as $local)
                <tr>
                    <td>{{ $local->nombre }}</td>
                    <td>{{ $local->direccion }}</td>
                    <td>{{ $local->telefono }}</td>
                    <td>{{ $local->email }}</td>
                    <td>{{ $local->ruc }}</td>
                    <td>{{ $local->administrador->nombre ?? 'No asignado' }}</td>
                    <td>{{ $local->estado ? 'Activo' : 'Inactivo' }}</td>
                    <td>
                        <a href="{{ route('locales_show', $local) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('locales_edit', $local) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('locales_destroy', $local) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
