<?php

namespace App\Exports;

use App\Models\Administrador;
use Maatwebsite\Excel\Concerns\FromCollection;

class AdministradoresExport implements FromCollection
{
    public function collection()
    {
        return Administrador::all(); // Obtén todos los administradores
    }
}
