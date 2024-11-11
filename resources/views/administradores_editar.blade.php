<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Administrador</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Editar Administrador</h1>

        <!-- Mostrar errores de validación -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario para editar los datos del administrador -->
        <form action="{{ route('actualizar_administrador', $administrador->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="{{ old('nombre', $administrador->nombre) }}" required>
            </div>

            <div class="form-group">
                <label for="a_paterno">Apellido Paterno</label>
                <input type="text" class="form-control" name="a_paterno" value="{{ old('a_paterno', $administrador->a_paterno) }}" required>
            </div>

            <div class="form-group">
                <label for="a_materno">Apellido Materno</label>
                <input type="text" class="form-control" name="a_materno" value="{{ old('a_materno', $administrador->a_materno) }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="{{ old('email', $administrador->email) }}" required>
            </div>

            <div class="form-group">
                <label for="password">Nueva Contraseña (dejar en blanco si no se quiere cambiar)</label>
                <input type="password" class="form-control" name="password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmar Nueva Contraseña</label>
                <input type="password" class="form-control" name="password_confirmation">
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" name="telefono" value="{{ old('telefono', $administrador->telefono) }}">
            </div>

            <div class="form-group">
                <label for="rol">Rol</label>
                <input type="text" class="form-control" name="rol" value="{{ old('rol', $administrador->rol) }}" required>
            </div>

            <div class="form-group">
                <label for="estado">Activo</label>
                <select class="form-control" name="estado" required>
                    <option value="si" {{ old('estado', $administrador->estado ? 'si' : 'no') === 'si' ? 'selected' : '' }}>Sí</option>
                    <option value="no" {{ old('estado', $administrador->estado ? 'si' : 'no') === 'no' ? 'selected' : '' }}>No</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Administrador</button>
            <a href="{{ route('administradores') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
