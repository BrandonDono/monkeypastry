<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel; 
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\AdministradoresExport; // Necesitarás crear esta clase de exportación

class AdministradorController extends Controller
{
    //---------- IMPRESION, DESCARGA PARA PDF Y EXCEL --------//

    // Exportar administradores a Excel
    public function exportar_administradores_excel()
    {
        return Excel::download(new AdministradoresExport, 'reporte_administradores.xlsx');
    }

    
    // Exportar administradores a PDF
    public function exportar_administradores_pdf()
    {
        $administradores = Administrador::all(); 
        $pdf = Pdf::loadView('exportacion_adminpdf', compact('administradores')); 
        return $pdf->download('reporte_administradores.pdf'); 
    }

    // Imprimir administradores (solo muestra los datos, no descarga)
    public function imprimir_administradores()
    {
        $administradores = Administrador::all(); 
        return view('imprimir_administradores', compact('administradores'));
    }

    // CRUD DEL ADMINISTRADOR

    public function admin()
    {
        $administradores = Administrador::all();
        return view('administradores', compact('administradores'));
    }

    public function crear_admin()
    {
        return view('administradores_alta');
    }

    public function registrar_admin(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:155',
            'a_paterno' => 'required|string|max:155',
            'a_materno' => 'required|string|max:155',
            'email' => 'required|string|email|max:255|unique:administrador',
            'password' => 'required|string|min:8|confirmed',
            'telefono' => 'nullable|string|max:15',
            'rol' => 'required|string|max:50',
        ]);

        $administrador = new Administrador($request->all());
        $administrador->password = Hash::make($request->password);
        $administrador->estado = true;
        $administrador->save();

        return redirect()->route('administradores')->with('success', 'Administrador creado exitosamente.');
    }

    public function ver_admin($id)
    {
        $administrador = Administrador::findOrFail($id);
        return view('administradores_detalles', compact('administrador'));
    }

    public function editar($id)
    {
        $administrador = Administrador::findOrFail($id);
        return view('administradores_editar', compact('administrador'));
    }

    public function actualizar_admin(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:155',
            'a_paterno' => 'required|string|max:155',
            'a_materno' => 'nullable|string|max:155',
            'email' => 'required|string|email|max:255|unique:administrador,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'telefono' => 'nullable|string|max:15',
            'rol' => 'required|string|max:50',
            'estado' => 'required|string|in:si,no',
        ]);

        $administrador = Administrador::findOrFail($id);
        $administrador->fill($request->except('password'));
        $administrador->estado = $request->estado === 'si';

        if ($request->filled('password')) {
            $administrador->password = Hash::make($request->password);
        }

        $administrador->save();
        return redirect()->route('administradores')->with('success', 'Administrador actualizado exitosamente.');
    }

    public function eliminar_admin($id)
    {
        $administrador = Administrador::findOrFail($id);
        $administrador->delete();
        return redirect()->route('administradores')->with('success', 'Administrador eliminado exitosamente.');
    }

    // Autenticación
    public function showLoginForm()
    {
        return view('auth.login_administrador');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);

        $administrador = Administrador::where('email', $request->email)->first();

        if ($administrador && Hash::check($request->password, $administrador->password)) {
            Auth::login($administrador);
            return redirect()->route('administradores')->with('success', 'Has iniciado sesión como administrador.');
        }

        return back()->withErrors(['email' => 'Las credenciales proporcionadas son incorrectas.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login_administrador')->with('success', 'Has cerrado sesión.');
    }
}
