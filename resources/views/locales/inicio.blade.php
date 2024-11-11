<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locales</title>
    <!-- Asegúrate de incluir tus CSS, como Bootstrap, aquí -->
</head>
<body>
    <div class="container">
        <h1>Locales</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('locales.alta') }}" class="btn btn-primary">Crear Nuevo Local</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Administrador</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($locales as $local)
                    <tr>
                        <td>{{ $local->nombre }}</td>
                        <td>{{ $local->direccion }}</td>
                        <td>{{ $local->administrador->nombre }}</td>
                        <td>{{ $local->estado ? 'Activo' : 'Inactivo' }}</td>
                        <td>
                            <a href="{{ route('locales.detalles', $local->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('locales.editar', $local->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('locales.destroy', $local->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
