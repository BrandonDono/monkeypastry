<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Usuario</h1>

        <form action="{{ route('usuarios.actualizar', $usuario->id_usuario) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre_usuario">Nombre</label>
                <input type="text" name="nombre_usuario" class="form-control" value="{{ old('nombre_usuario', $usuario->nombre_usuario) }}" required>
                @error('nombre_usuario')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('usuarios') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
