<!-- resources/views/clientes/index.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <script src="https://kit.fontawesome.com/106dbebdec.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Clientes</h1>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="mb-3">
    <a href="{{ route('alta_clientes') }}" class="btn btn-primary"><i class="fa-solid fa-user-plus"></i><br>Agregar Cliente</a>
    <a href="{{ route('exportar') }}" class="btn btn-success"><i class="fa-sharp-duotone fa-solid fa-file-excel"></i><br>Exportar a Excel</a>
    <a href="{{ route('exportacion_pdf') }}" class="btn btn-danger"><i class="fa-solid fa-file-pdf"></i><br>Exportar a PDF</a>
    <a href="{{ route('imprimir_clientes') }}" class="btn btn-secondary"><i class="fa-solid fa-print"></i><br>Imprimir</a> <!-- Botón de impresión -->
</div>


        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->nombre }}</td>
                        <td>{{ $cliente->a_paterno }}</td>
                        <td>{{ $cliente->a_materno }}</td>
                        <td>{{ $cliente->telefono }}</td>
                        <td>{{ $cliente->correo }}</td>
                        <td>
                            <a href="{{ route('datos_cliente', $cliente) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('modificar_cliente', $cliente) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('borra_cliente', $cliente) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
