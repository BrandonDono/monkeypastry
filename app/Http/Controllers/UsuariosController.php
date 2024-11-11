<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    // Mostrar todos los usuarios
    public function usuarios()
    {
        $usuarios = Usuario::all();
        return view('usuarios', compact('usuarios'));
    }

    // Mostrar el formulario para crear un nuevo usuario
    public function crear_usuarios()
    {
        return view('usuarios_alta');
    }

    // Registrar un nuevo usuario
    public function registrar_usuarios(Request $request)
    {
        $request->validate([
            'nombre_usuario' => 'required|string|max:155',
        ]);

        Usuario::create($request->all());

        return redirect()->route('usuarios')->with('success', 'Usuario creado exitosamente.');
    }

    // Mostrar un usuario específico
    public function ver_usuarios(Usuario $usuario)
    {
        return view('usuarios_detalle', compact('usuario'));
    }

    // Mostrar el formulario para editar un usuario
    public function modificar_usuarios(Usuario $usuario)
    {
        return view('usuarios_editar', compact('usuario'));
    }

    // Actualizar los datos de un usuario
    public function actualizar_usuarios(Request $request, Usuario $usuario)
    {
        $request->validate([
            'nombre_usuario' => 'required|string|max:155',
        ]);

        $usuario->update($request->all());

        return redirect()->route('usuarios')->with('success', 'Usuario actualizado exitosamente.');
    }

    // Eliminar un usuario
    public function eliminar_usuarios(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios')->with('success', 'Usuario eliminado exitosamente.');
    }
}
