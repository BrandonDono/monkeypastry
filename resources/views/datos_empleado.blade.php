<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Empleado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Detalles del Empleado</h1>

        <p><strong>Nombre:</strong> {{ $empleado->nombre }}</p>
        <p><strong>Apellido Paterno:</strong> {{ $empleado->a_paterno }}</p>
        <p><strong>Apellido Materno:</strong> {{ $empleado->a_materno }}</p>
        <p><strong>Teléfono:</strong> {{ $empleado->telefono }}</p>
        <p><strong>Correo:</strong> {{ $empleado->correo }}</p>
        <p><strong>RFC:</strong> {{ $empleado->rfc }}</p>
        <p><strong>Puesto:</strong> {{ $empleado->puesto }}</p>

        <a href="{{ route('empleados') }}" class="btn btn-secondary">Regresar</a>
    </div>
</body>
</html>
