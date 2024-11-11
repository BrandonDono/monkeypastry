<!-- resources/views/clientes/edit.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Modificar Cliente</h1>

        <form action="{{ route('clientes.update', $cliente) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ $cliente->nombre }}" required>
            </div>
            <div class="form-group">
                <label for="a_paterno">Apellido Paterno</label>
                <input type="text" name="a_paterno" class="form-control" value="{{ $cliente->a_paterno }}" required>
            </div>
            <div class="form-group">
                <label for="a_materno">Apellido Materno</label>
                <input type="text" name="a_materno" class="form-control" value="{{ $cliente->a_materno }}" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" class="form-control" value="{{ $cliente->telefono }}" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" name="correo" class="form-control" value="{{ $cliente->correo }}" required>
            </div>
            <div class="form-group">
                <label for="contraseña">Contraseña (dejar en blanco si no deseas cambiar)</label>
                <input type="password" name="contraseña" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="{{ route('clientes') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
