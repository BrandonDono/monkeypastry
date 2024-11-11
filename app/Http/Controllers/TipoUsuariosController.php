<?php

namespace App\Http\Controllers;

use App\Models\TipoUsuarios; // Cambié a TipoUsuarios
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TipoUsuariosController extends Controller
{
    public function tusuarios()
{
    $tipousuarios = TipoUsuarios::all();
    return view('tipo_usuarios', compact('tipousuarios'));
}



    // Mostrar el formulario para levantar un nuevo tipo de usuario
    public function levantar_tusuarios()
    {
        return view('levantar_tusuarios');
    }

    // Registrar un nuevo tipo de usuario
    public function registrar_tusuarios(Request $request)
    {
        $request->validate([
            'nombre_tipo_usuario' => 'required|string|max:155',
        ]);

        TipoUsuarios::create($request->all()); // Cambié a TipoUsuarios

        return redirect()->route('tusuarios')->with('success', 'Tipo de usuario creado exitosamente.');
    }



    public function datos_tusuarios(TipoUsuarios $tipousuario)
{
    return view('datos_tusuarios', compact('tipousuario'));
}


    // Mostrar el formulario para editar un tipo de usuario
    public function modificar_tusuarios(TipoUsuarios $tipousuario) // Cambié a TipoUsuarios
    {
        return view('modificar_tusuarios', compact('tipousuario')); // Usé la variable correcta
    }

    // Actualizar los datos de un tipo de usuario
    public function actualizar_tusuarios(Request $request, TipoUsuarios $tipousuario) // Cambié a TipoUsuarios
    {
        $request->validate([
            'nombre_tipo_usuario' => 'required|string|max:155',
        ]);

        $tipousuario->update($request->all()); // Cambié a TipoUsuarios
        return redirect()->route('tusuarios')->with('success', 'Tipo de usuario actualizado exitosamente.');
    }

    // Eliminar un tipo de usuario
    public function quitar_tusuarios(TipoUsuarios $tipousuario) // Cambié a TipoUsuarios
    {
        $tipousuario->delete(); // Cambié a TipoUsuarios
        return redirect()->route('tusuarios')->with('success', 'Tipo de usuario eliminado exitosamente.');
    }
}
