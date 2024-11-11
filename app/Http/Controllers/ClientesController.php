<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Clientes;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel; 
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\ClientesExport;

class ClientesController extends Controller
{
    //-----------IMPRESION, DESCARGA PARA PDF Y EXCEL---------/////
    public function exportar_clientes_excel()
    {
        return Excel::download(new ClientesExport, 'reporte_clientes.xlsx');
    }

    public function exportar_clientes_pdf()
    {
        $clientes = Clientes::all(); 
        $pdf = Pdf::loadView('exportacion_pdf', compact('clientes')); 
        return $pdf->download('reporte_clientes.pdf'); 
    }

    public function imprimir_empleados()
    {
        $empleados = Empleados::all(); // Obtén todos los empleados
        dd($empleados); // Verifica los datos
        return view('imprimir_empleados', compact('empleados'));
    }
    
    // CRUD DEL CLIENTE
    public function clientes()
    {
        $clientes = Clientes::all();
        return view('clientes', compact('clientes'));
    }

    public function alta_cliente()
    {
        return view('alta_clientes');
    }

    public function guardar_cliente(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:155',
            'a_paterno' => 'required|string|max:200',
            'a_materno' => 'required|string|max:200',
            'telefono' => 'required|string|max:250',
            'correo' => 'required|email|max:255|unique:clientes',
            'contraseña' => 'required|string|min:8',
        ]);

        // Cifrar la contraseña
        $request['contraseña'] = Hash::make($request['contraseña']);

        // Crear el cliente
        Clientes::create($request->all());

        return redirect()->route('clientes')->with('success', 'Cliente creado exitosamente.');
    }

    public function datos_cliente(Clientes $cliente)
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
            'correo' => 'required|email|max:255|unique:clientes,correo,' . $cliente->id,
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

    // Autenticación
    public function showLoginForm()
    {
        return view('auth.login_cliente'); // Asegúrate de que esta vista exista
    }

    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|string|email',
            'contraseña' => 'required|string|min:8',
        ]);

        // Verifica las credenciales
        $cliente = Clientes::where('correo', $request->correo)->first();

        if ($cliente && Hash::check($request->contraseña, $cliente->contraseña)) {
            Auth::login($cliente);
            return redirect()->route('clientes')->with('success', 'Has iniciado sesión como cliente.');
        }

        return back()->withErrors(['correo' => 'Las credenciales proporcionadas son incorrectas.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login_cliente')->with('success', 'Has cerrado sesión.');
    }
}
