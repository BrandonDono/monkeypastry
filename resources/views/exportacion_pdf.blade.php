<!-- resources/views/clientes_pdf.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Clientes</title>
    <style>
        h1 {
            text-align: center; /* Centra el texto del título */
        }

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
    <h1>Reporte de Clientes</h1>
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
</body>
</html>
