<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios'; // Especifica la tabla si no sigue la convención
    protected $primaryKey = 'id_usuario'; // Especifica la clave primaria

    protected $fillable = [
        'nombre_usuario',
    ];
}
