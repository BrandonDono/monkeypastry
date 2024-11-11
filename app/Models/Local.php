<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;

    protected $table = 'locales';
    // Los campos que se pueden asignar de manera masiva
    protected $fillable = [
        'nombre', 
        'direccion', 
        'telefono', 
        'email', 
        'ruc', 
        'administrador_id', 
        'estado'
    ];

    // Relación: Un local pertenece a un administrador
    public function administrador()
    {
        return $this->belongsTo(Administrador::class);
    }
}
