<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imprimir Empleados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                display: none; /* Oculta elementos con esta clase al imprimir */
            }
        }
        .no-print {
            text-align: center; /* Centrar el botón de volver */
            margin-bottom: 20px; /* Espacio debajo del botón */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="text-align: center;">Reporte de Empleados</h1>
        
        <div class="no-print">
            <a href="{{ route('empleados') }}" class="btn btn-outline-dark">Volver a la tabla de Empleados</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Puesto</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->nombre }}</td>
                        <td>{{ $empleado->a_paterno }}</td>
                        <td>{{ $empleado->a_materno }}</td>
                        <td>{{ $empleado->telefono }}</td>
                        <td>{{ $empleado->correo }}</td>
                        <td>{{ $empleado->puesto }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        window.print(); // Inicia la impresión automáticamente
    </script>
</body>
</html>
