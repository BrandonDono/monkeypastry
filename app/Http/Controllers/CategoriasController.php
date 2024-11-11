<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriasController extends Controller
{

    //
    public function categorias()
    {
        $Categorias = Categorias::all();
        return view('categorias', compact('categorias'));
    }

    public function alta_categoria()
    {
        return view('alta_categorias');
    }

    public function guardar_categoria(Request $request)
    {
        $request->validate([
            'nombre_categoria' => 'required|string|max:155',
        ]);
        Clientes::create($request->all());
        return redirect()->route('categorias')->with('success', 'categoria creado exitosamente.');
    }

    public function datos_cliente(Categorias $Categorias)
    {
        return view('datos_clientes', compact('cliente'));
    }

    public function modificar_cliente(Clientes $cliente)
    {
        return view('modificar_cliente', compact('cliente'));
    }

    public function actualizar_cliente(Request $request, Clientes $cliente)
    {
        $request->validate([
            'nombre' => 'required|string|max:155',
            'a_paterno' => 'required|string|max:200',
            'a_materno' => 'required|string|max:200',
            'telefono' => 'required|string|max:250',
            'correo' => 'required|email|max:255',
        ]);

        // Solo actualizar la contraseña si se proporciona
        if ($request->filled('contraseña')) {
            $request['contraseña'] = Hash::make($request['contraseña']);
        } else {
            unset($request['contraseña']);
        }

        $cliente->update($request->all());
        return redirect()->route('clientes')->with('success', 'Cliente actualizado exitosamente.');
    }

    public function borra_cliente(Clientes $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes')->with('success', 'Cliente eliminado exitosamente.');
    }
}
