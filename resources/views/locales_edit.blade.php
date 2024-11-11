{{-- resources/views/locales_edit.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Local</title>
</head>
<body>
    <h1>Editar Local</h1>

    <form action="{{ route('locales_update', $local) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre', $local->nombre) }}" required>
        </div>

        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" class="form-control" name="direccion" id="direccion" value="{{ old('direccion', $local->direccion) }}" required>
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control" name="telefono" id="telefono" value="{{ old('telefono', $local->telefono) }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $local->email) }}">
        </div>

        <div class="form-group">
            <label for="ruc">RUC</label>
            <input type="text" class="form-control" name="ruc" id="ruc" value="{{ old('ruc', $local->ruc) }}">
        </div>

        <div class="form-group">
            <label for="administrador_id">Administrador</label>
            <select class="form-control" name="administrador_id" id="administrador_id" required>
                @foreach($administradores as $administrador)
                    <option value="{{ $administrador->id }}" {{ $local->administrador_id == $administrador->id ?
