<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Detalles del Cliente</h1>

        <p><strong>Nombre:</strong> {{ $cliente->nombre }}</p>
        <p><strong>Apellido Paterno:</strong> {{ $cliente->a_paterno }}</p>
        <p><strong>Apellido Materno:</strong> {{ $cliente->a_materno }}</p>
        <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
        <p><strong>Correo:</strong> {{ $cliente->correo }}</p>

        <a href="{{ route('modificar_cliente', $cliente) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('clientes') }}" class="btn btn-secondary">Volver</a>
    </div>
</body>
</html>