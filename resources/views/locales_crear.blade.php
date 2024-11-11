{{-- resources/views/locales_crear.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Local</title>
</head>
<body>
    <h1>Crear Local</h1>

    <form action="{{ route('locales_store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
        </div>

        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" class="form-control" name="direccion" id="direccion" value="{{ old('direccion') }}" required>
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control" name="telefono" id="telefono" value="{{ old('telefono') }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <label for="ruc">RUC</label>
            <input type="text" class="form-control" name="ruc" id="ruc" value="{{ old('ruc') }}">
        </div>

        <div class="form-group">
            <label for="administrador_id">Administrador</label>
            <select class="form-control" name="administrador_id" id="administrador_id" required>
                <option value="">Seleccione un Administrador</option>
                @foreach($administradores as $administrador)
                    <option value="{{ $administrador->id }}" {{ old('administrador_id') == $administrador->id ? 'selected' : '' }}>
                        {{ $administrador->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="estado">Estado</label>
            <select class="form-control" name="estado" id="estado">
                <option value="1" {{ old('estado') == 1 ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ old('estado') == 0 ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</body>
</html>
