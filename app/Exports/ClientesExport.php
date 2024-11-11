<?php

namespace App\Exports;

use App\Models\Clientes;
use Maatwebsite\Excel\Concerns\FromView;

class ClientesExport implements FromView
{
    public function view(): \Illuminate\Contracts\View\View
    {
        $clientes = Clientes::all(); // Obtiene todos los clientes
        return view('exportar', compact('clientes'));
        return view('exportacion_pdf', compact('clientes')); // Usa la vista export
    }
}
