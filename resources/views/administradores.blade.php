<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administradores</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Administradores</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('administradores_alta') }}" class="btn btn-primary mb-3">Agregar Administrador</a>

        <!-- Botones de exportación -->
        <div class="mb-3">
            <a href="{{ route('administradores.exportar.excel') }}" class="btn btn-success">Exportar a Excel</a>
            <a href="{{ route('administradores.exportar.pdf') }}" class="btn btn-danger">Exportar a PDF</a>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($administradores as $administrador)
                    <tr>
                        <td>{{ $administrador->id }}</td>
                        <td>{{ $administrador->nombre }}</td>
                        <td>{{ $administrador->a_paterno }}</td>
                        <td>{{ $administrador->a_materno }}</td>
                        <td>{{ $administrador->email }}</td>
                        <td>{{ $administrador->telefono }}</td>
                        <td>{{ $administrador->rol }}</td>
                        <td>{{ $administrador->estado ? 'Activo' : 'Inactivo' }}</td>
                        <td>
                            <a href="{{ route('administradores_detalles', $administrador->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('editar_administrador', $administrador->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('eliminar_administrador', $administrador->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este administrador?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
