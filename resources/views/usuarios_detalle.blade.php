<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Detalles del Usuario</h1>

        <div class="form-group">
            <label>ID:</label>
            <p>{{ $usuario->id_usuario }}</p>
        </div>
        <div class="form-group">
            <label>Nombre:</label>
            <p>{{ $usuario->nombre_usuario }}</p>
        </div>
        <a href="{{ route('usuarios') }}" class="btn btn-secondary">Regresar</a>
    </div>
</body>
</html>
