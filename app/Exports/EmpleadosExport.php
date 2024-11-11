<?php

namespace App\Exports;

use App\Models\Empleados; // Asegúrate de que este sea el nombre correcto del modelo
use Maatwebsite\Excel\Concerns\FromCollection;

class EmpleadosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Empleados::all(); // Retorna todos los empleados
    }
}

