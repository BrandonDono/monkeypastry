<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Empleados extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $fillable = [
        'nombre',
        'a_paterno',
        'a_materno',
        'telefono',
        'correo',
        'rfc', 
        'puesto', 
        'contraseña',
    ];

    // Otras configuraciones del modelo
}
