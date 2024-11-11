<?php

namespace App\Http\Controllers;

use App\Models\Local;
use App\Models\Administrador;
use Illuminate\Http\Request;

class LocalController extends Controller
{
    // Mostrar todos los locales
    public function locales()
    {
        $locales = Local::with('administrador')->get();
        return view('locales.inicio', compact('locales'));
    }

    // Mostrar el formulario para crear un nuevo local
    public function crear()
    {
        $administradores = Administrador::all();
        return view('locales.alta', compact('administradores'));
    }

    // Almacenar un nuevo local
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'ruc' => 'nullable|string|max:20',
            'administrador_id' => 'required|exists:administradores,id',
            'estado' => 'nullable|boolean',
        ]);

        Local::create($request->all());

        return redirect()->route('locales.inicio')->with('success', 'Local creado correctamente');
    }

    // Mostrar un local específico
    public function show(Local $local)
    {
        return view('locales.detalles', compact('local'));
    }

    // Mostrar el formulario para editar un local
    public function edit(Local $local)
    {
        $administradores = Administrador::all();
        return view('locales.editar', compact('local', 'administradores'));
    }

    // Actualizar un local
    public function update(Request $request, Local $local)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'ruc' => 'nullable|string|max:20',
            'administrador_id' => 'required|exists:administradores,id',
            'estado' => 'nullable|boolean',
        ]);

        $local->update($request->all());

        return redirect()->route('locales.inicio')->with('success', 'Local actualizado correctamente');
    }

    // Eliminar un local
    public function destroy(Local $local)
    {
        $local->delete();
        return redirect()->route('locales.inicio')->with('success', 'Local eliminado correctamente');
    }
}
