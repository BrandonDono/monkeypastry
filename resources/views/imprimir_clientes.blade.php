<!-- resources/views/clientes/imprimir.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Imprimir Clientes</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        @media print {
            .no-print {
                display: none; /* Oculta los elementos con la clase "no-print" al imprimir */
            }
        }
        .no-print {
            text-align: center; /* Centrar el botón de volver */
            margin-bottom: 20px; /* Espacio debajo del botón */
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Reporte de Clientes</h1>
    
    <div class="no-print">
        <a href="{{ route('clientes') }}" class="btn btn-outline-dark">Volver a la tabla de Clientes</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Teléfono</th>
                <th>Correo</th>
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
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        window.print(); // Inicia la impresión automáticamente
    </script>
</body>
</html>
