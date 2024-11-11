<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EmpleadosController;


//entrada de la pagina
Route::get('/', function () {
    return view('welcome');
});


/////<<<<----CLIENTES---->>////

//<<--IMPRESIONES CLIENTES 

// Rutas para clientes
Route::get('/clientes', [ClientesController::class, 'clientes'])->name('clientes');

Route::get('/clientes/alta', [ClientesController::class, 'alta_cliente'])->name('alta_clientes');
Route::post('/clientes/guardar', [ClientesController::class, 'guardar_cliente'])->name('guardar_cliente');

Route::get('/clientes/{cliente}', [ClientesController::class, 'datos_cliente'])->name('datos_cliente');
Route::get('/clientes/{cliente}/editar', [ClientesController::class, 'modificar_cliente'])->name('modificar_cliente');
Route::put('/clientes/{cliente}', [ClientesController::class, 'actualizar_cliente'])->name('actualizar_cliente');
Route::delete('/clientes/{cliente}', [ClientesController::class, 'borra_cliente'])->name('borra_cliente');

// Rutas para autenticación
Route::get('/login_cliente', [ClientesController::class, 'showLoginForm'])->name('login_cliente');
Route::post('/login_cliente', [ClientesController::class, 'login'])->name('login_cliente.process');
Route::post('/logout', [ClientesController::class, 'logout'])->name('logout');

// Rutas para exportaciones e impresión
Route::get('/clientes/exportar/excel', [ClientesController::class, 'exportar_clientes_excel'])->name('exportar');
Route::get('/clientes/exportar/pdf', [ClientesController::class, 'exportar_clientes_pdf'])->name('exportacion_pdf');
Route::get('/clientes/imprimir', [ClientesController::class, 'imprimir_empleados'])->name('imprimir_clientes');

// Rutas para autenticación
Route::get('/login_cliente', [ClientesController::class, 'showLoginForm'])->name('login_cliente');
Route::post('/login_cliente', [ClientesController::class, 'login'])->name('login_cliente.post');
Route::post('/logout', [ClientesController::class, 'logout'])->name('logout');



//crud empleados

Route::get('/empleados', [EmpleadosController::class, 'empleados'])->name('empleados');
Route::get('/empleados/levantar', [EmpleadosController::class, 'levantar_empleado'])->name('levantar_empleado');
Route::post('/empleados/registrar', [EmpleadosController::class, 'registrar_empleado'])->name('registrar_empleado');
Route::get('/empleados/{empleado}', [EmpleadosController::class, 'datos_empleado'])->name('datos_empleado');
Route::get('/empleados/{empleado}/editar', [EmpleadosController::class, 'modificar_empleado'])->name('modificar_empleado');
Route::put('/empleados/{empleado}', [EmpleadosController::class, 'actualizar_empleado'])->name('actualizar_empleado');
Route::delete('/empleados/{empleado}', [EmpleadosController::class, 'quitar_empleado'])->name('quitar_empleado');

// Rutas para exportaciones e impresión
Route::get('/empleados/exportar/excel', [EmpleadosController::class, 'exportar_empleados_excel'])->name('exportar_empleados_excel');
Route::get('/empleados/exportar/pdf', [EmpleadosController::class, 'exportar_empleados_pdf'])->name('exportar_empleados_pdf');
Route::get('/empleados/imprimir', [EmpleadosController::class, 'imprimir_empleados'])->name('imprimir_empleados');

// Rutas de autenticación
Route::get('/login_empleado', [EmpleadosController::class, 'showLoginForm'])->name('auth.login_empleado');
Route::post('/login_empleado', [EmpleadosController::class, 'login'])->name('login_empleado.process');
Route::post('/logout', [EmpleadosController::class, 'logout'])->name('logout');

Route::get('/login_empleado', [EmpleadosController::class, 'showLoginForm'])->name('login_empleado');
Route::post('/login_empleado', [EmpleadosController::class, 'login'])->name('login_empleado.process');


//crud prooverdores
//crud locales
//crud productos
//crud entregas
//crud ventas
//crud repartidor


//crud tipos de usuarios
use App\Http\Controllers\UsuariosController;

Route::get('/usuarios', [UsuariosController::class, 'usuarios'])->name('usuarios');
Route::get('/usuarios/crear', [UsuariosController::class, 'crear_usuarios'])->name('usuarios.crear');
Route::post('/usuarios', [UsuariosController::class, 'registrar_usuarios'])->name('usuarios.store');
Route::get('/usuarios/{usuario}', [UsuariosController::class, 'ver_usuarios'])->name('usuarios.ver');
Route::get('/usuarios/{usuario}/editar', [UsuariosController::class, 'modificar_usuarios'])->name('usuarios.editar');
Route::put('/usuarios/{usuario}', [UsuariosController::class, 'actualizar_usuarios'])->name('usuarios.actualizar');
Route::delete('/usuarios/{usuario}', [UsuariosController::class, 'eliminar_usuarios'])->name('usuarios.eliminar');







use App\Http\Controllers\AdministradorController;

Route::get('/exportar/excel', [AdministradorController::class, 'exportar_administradores_excel'])->name('administradores.exportar.excel');
    
// Exportar administradores a PDF
Route::get('/exportar/pdf', [AdministradorController::class, 'exportar_administradores_pdf'])->name('administradores.exportar.pdf');


// Rutas de autenticación
Route::get('/login', [AdministradorController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdministradorController::class, 'login'])->name('admin_login');
Route::post('/logout', [AdministradorController::class, 'logout'])->name('logout_administrador');

// Rutas para Administradores
Route::get('/administradores', [AdministradorController::class, 'admin'])->name('administradores');
Route::get('/administradores/crear', [AdministradorController::class, 'crear_admin'])->name('administradores_alta');
Route::post('/administradores', [AdministradorController::class, 'registrar_admin'])->name('registrar_administrador');
Route::get('/administradores/{id}', [AdministradorController::class, 'ver_admin'])->name('administradores_detalles');
Route::get('/administradores/{id}/editar', [AdministradorController::class, 'editar'])->name('editar_administrador');
Route::put('/administradores/{id}', [AdministradorController::class, 'actualizar_admin'])->name('actualizar_administrador');
Route::delete('/administradores/{id}', [AdministradorController::class, 'eliminar_admin'])->name('eliminar_administrador');





use App\Http\Controllers\LocalController;

// Mostrar todos los locales
Route::get('/locales', [LocalController::class, 'locales'])->name('locales.inicio');

// Mostrar el formulario para crear un nuevo local
Route::get('/locales/crear', [LocalController::class, 'crear'])->name('locales.alta');

// Almacenar un nuevo local
Route::post('/locales', [LocalController::class, 'store'])->name('locales.store');

// Mostrar un local específico
Route::get('/locales/{local}', [LocalController::class, 'show'])->name('locales.detalles');

// Mostrar el formulario para editar un local
Route::get('/locales/{local}/editar', [LocalController::class, 'edit'])->name('locales.editar');

// Actualizar un local
Route::put('/locales/{local}', [LocalController::class, 'update'])->name('locales.update');

// Eliminar un local
Route::delete('/locales/{local}', [LocalController::class, 'destroy'])->name('locales.destroy');
