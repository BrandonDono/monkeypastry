<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Empleados</title>
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
    </style>
</head>
<body>
    <h1 style="text-align: center;">Reporte de Empleados</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>RFC</th>
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
                    <td>{{ $empleado->rfc }}</td>
                    <td>{{ $empleado->puesto }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
