<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Administrador</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Detalles del Administrador</h1>

        <div class="card">
            <div class="card-header">
                Información del Administrador
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $administrador->nombre }} {{ $administrador->a_paterno }} {{ $administrador->a_materno }}</h5>
                <p class="card-text"><strong>Email:</strong> {{ $administrador->email }}</p>
                <p class="card-text"><strong>Teléfono:</strong> {{ $administrador->telefono ?? 'No disponible' }}</p>
                <p class="card-text"><strong>Rol:</strong> {{ $administrador->rol }}</p>
                <p class="card-text"><strong>Estado:</strong> {{ $administrador->estado ? 'Activo' : 'Inactivo' }}</p>
            </div>
        </div>

        <div class="mt-4">
            <!-- Botón para editar el administrador -->
            <a href="{{ route('editar_administrador', $administrador->id) }}" class="btn btn-warning">Editar</a>

            <!-- Formulario para eliminar al administrador -->
            <form action="{{ route('eliminar_administrador', $administrador->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este administrador?')">Eliminar</button>
            </form>

            <!-- Botón para volver a la lista de administradores -->
            <a href="{{ route('administradores') }}" class="btn btn-secondary">Volver a la lista</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
