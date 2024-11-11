<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;  // Añadir esta línea
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Administrador extends Authenticatable
{
    use HasFactory, Notifiable;  // Aquí se usa el trait

    protected $table = 'administrador';

    protected $fillable = [
        'nombre',
        'a_paterno',
        'a_materno',
        'email',
        'password',
        'telefono',
        'rol',
        'estado',
    ];

    public function locales()
    {
        return $this->hasMany(Local::class);
    }

    protected $hidden = ['password'];
}
