<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Local</title>
    <!-- Asegúrate de incluir tus CSS, como Bootstrap, aquí -->
</head>
<body>
    <div class="container">
        <h1>Editar Local</h1>

        <form action="{{ route('locales.update', $local->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $local->nombre) }}" required>
            </div>

            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion" id="direccion" class="form-control" value="{{ old('direccion', $local->direccion) }}" required>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono', $local->telefono) }}">
            </div>

            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $local->email) }}">
            </div>

            <div class="form-group">
                <label for="ruc">RUC</label>
                <input type="text" name="ruc" id="ruc" class="form-control" value="{{ old('ruc', $local->ruc) }}">
            </div>

            <div class="form-group">
                <label for="administrador_id">Administrador</label>
                <select name="administrador_id" id="administrador_id" class="form-control" required>
                    <option value="">Seleccione un administrador</option>
                    @foreach ($administradores as $administrador)
                        <option value="{{ $administrador->id }}" 
                            {{ old('administrador_id', $local->administrador_id) == $administrador->id ? 'selected' : '' }}>
                            {{ $administrador->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="estado">Estado</label>
                <select name="estado" id="estado" class="form-control">
                    <option value="1" {{ old('estado', $local->estado) == '1' ? 'selected' : '' }}>Activo</option>
                    <option value="0" {{ old('estado', $local->estado) == '0' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Local</button>
        </form>

        <a href="{{ route('locales.inicio') }}" class="btn btn-secondary mt-3">Volver a la lista de locales</a>
    </div>
</body>
</html>
