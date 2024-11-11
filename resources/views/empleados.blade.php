<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Lista de Empleados</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('levantar_empleado') }}" class="btn btn-primary">Agregar Empleado</a>
    <a href="{{ route('exportar_empleados_excel') }}" class="btn btn-success">Exportar a Excel</a>
    <a href="{{ route('exportar_empleados_pdf') }}" class="btn btn-danger">Exportar a PDF</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->nombre }}</td>
                    <td>{{ $empleado->a_paterno }}</td>
                    <td>{{ $empleado->a_materno }}</td>
                    <td>{{ $empleado->correo }}</td>
                    <td>{{ $empleado->telefono }}</td>
                    <td>
                        <a href="{{ route('datos_empleado', $empleado) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('modificar_empleado', $empleado) }}" class="btn btn-warning">Modificar</a>
                        <form action="{{ route('quitar_empleado', $empleado) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
