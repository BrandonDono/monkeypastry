<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos de Usuarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Tipos de Usuarios</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('levantar_tusuarios') }}" class="btn btn-primary mb-3">Agregar Tipo de Usuario</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($tipousuarios as $tipousuario)
    <tr>
        <td>{{ $tipousuario->id }}</td>
        <td>{{ $tipousuario->nombre_tipo_usuario }}</td>
        <td>
            <a href="{{ route('datos_tusuarios', $tipousuario->id) }}" class="btn btn-info">Ver</a>
            <a href="{{ route('modificar_tusuarios', $tipousuario->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('quitar_tusuarios', $tipousuario->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este tipo de usuario?')">Eliminar</button>
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
