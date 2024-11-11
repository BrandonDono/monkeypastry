<?php

namespace App\Http\Controllers;

use App\Models\Empleados; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel; 
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\EmpleadosExport;

class EmpleadosController extends Controller
{
    // Métodos para exportar
    public function exportar_empleados_excel()
    {
        return Excel::download(new EmpleadosExport, 'reporte_empleados.xlsx');
    }

    public function exportar_empleados_pdf()
    {
        $empleados = Empleados::all(); 
        $pdf = Pdf::loadView('exportacion_empleados_pdf', compact('empleados')); 
        return $pdf->download('reporte_empleados.pdf'); 
    }

    public function imprimir_empleados()
    {
        $empleados = Empleados::all(); 
        return view('imprimir_empleados', compact('empleados')); 
    }

    // CRUD empleados
    public function empleados()
    {
        $empleados = Empleados::all(); 
        return view('empleados', compact('empleados')); 
    }

    public function levantar_empleado()
    {
        return view('levantar_empleado');
    }

    public function registrar_empleado(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:155',
            'a_paterno' => 'required|string|max:200',
            'a_materno' => 'required|string|max:200',
            'telefono' => 'required|string|max:250',
            'correo' => 'required|email|max:255|unique:empleados',
            'rfc' => 'required|string|max:255',
            'puesto' => 'required|string|max:255',
            'contraseña' => 'required|string|min:8',
        ]);

        // Cifrar la contraseña
        $request['contraseña'] = Hash::make($request['contraseña']);
        Empleados::create($request->all());

        return redirect()->route('empleados')->with('success', 'Empleado creado exitosamente.');
    }

    public function datos_empleado(Empleados $empleado)
    {
        return view('datos_empleado', compact('empleado'));
    }

    public function modificar_empleado(Empleados $empleado)
    {
        return view('modificar_empleado', compact('empleado'));
    }

    public function actualizar_empleado(Request $request, Empleados $empleado)
    {
        $request->validate([
            'nombre' => 'required|string|max:155',
            'a_paterno' => 'required|string|max:200',
            'a_materno' => 'required|string|max:200',
            'telefono' => 'required|string|max:250',
            'correo' => 'required|email|max:255|unique:empleados,correo,' . $empleado->id,
            'rfc' => 'required|string|max:255',
            'puesto' => 'required|string|max:255',
            'contraseña' => 'nullable|string|min:8', // Opcional
        ]);

        // Solo actualizar la contraseña si se proporciona
        if ($request->filled('contraseña')) {
            $request['contraseña'] = Hash::make($request['contraseña']);
        } else {
            unset($request['contraseña']);
        }

        $empleado->update($request->all());
        return redirect()->route('empleados')->with('success', 'Empleado actualizado exitosamente.');
    }

    public function quitar_empleado(Empleados $empleado)
    {
        $empleado->delete();
        return redirect()->route('empleados')->with('success', 'Empleado eliminado exitosamente.');
    }

    // Funciones de inicio de sesión
    public function showLoginForm()
    {
        return view('auth.login_empleado');
    }

    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|string|email',
            'contraseña' => 'required|string|min:8',
        ]);

        $empleado = Empleados::where('correo', $request->correo)->first();

        if ($empleado && Hash::check($request->contraseña, $empleado->contraseña)) {
            Auth::login($empleado);
            return redirect()->route('empleados')->with('success', 'Has iniciado sesión como empleado.');
        }

        return back()->withErrors(['correo' => 'Las credenciales proporcionadas son incorrectas.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login_empleado')->with('success', 'Has cerrado sesión.');
    }
}
