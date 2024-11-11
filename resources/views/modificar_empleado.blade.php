<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Editar Empleado</h1>

        <form action="{{ route('actualizar_empleado', $empleado) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ $empleado->nombre }}" required>
            </div>
            <div class="form-group">
                <label for="a_paterno">Apellido Paterno</label>
                <input type="text" name="a_paterno" class="form-control" value="{{ $empleado->a_paterno }}" required>
            </div>
            <div class="form-group">
                <label for="a_materno">Apellido Materno</label>
                <input type="text" name="a_materno" class="form-control" value="{{ $empleado->a_materno }}" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" class="form-control" value="{{ $empleado->telefono }}" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" name="correo" class="form-control" value="{{ $empleado->correo }}" required>
            </div>
            <div class="form-group">
                <label for="rfc">RFC</label>
                <input type="text" name="rfc" class="form-control" value="{{ $empleado->rfc }}" required>
            </div>
            <div class="form-group">
                <label for="puesto">Puesto</label>
                <input type="text" name="puesto" class="form-control" value="{{ $empleado->puesto }}" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('empleados') }}" class="btn btn-secondary">Cancelar</a> <!-- Botón de cancelar -->
            </div>
        </form>
    </div>
</body>
</html>
