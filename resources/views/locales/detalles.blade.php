<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Local</title>
    <!-- Asegúrate de incluir tus CSS, como Bootstrap, aquí -->
</head>
<body>
    <div class="container">
        <h1>Detalles del Local</h1>

        <table class="table">
            <tr>
                <th>Nombre</th>
                <td>{{ $local->nombre }}</td>
            </tr>
            <tr>
                <th>Dirección</th>
                <td>{{ $local->direccion }}</td>
            </tr>
            <tr>
                <th>Teléfono</th>
                <td>{{ $local->telefono }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $local->email }}</td>
            </tr>
            <tr>
                <th>RUC</th>
                <td>{{ $local->ruc }}</td>
            </tr>
            <tr>
                <th>Administrador</th>
                <td>{{ $local->administrador->nombre }}</td>
            </tr>
            <tr>
                <th>Estado</th>
                <td>{{ $local->estado ? 'Activo' : 'Inactivo' }}</td>
            </tr>
        </table>

        <a href="{{ route('locales.inicio') }}" class="btn btn-secondary">Volver</a>
    </div>
</body>
</html>
