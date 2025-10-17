<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    /** @use HasFactory<\Database\Factories\SucursalFactory> */
    use HasFactory;

    /**
     * Nombre de la tabla asociada.
     *
     * @var string
     */
    protected $table = 'sucursales';

    /**
     * Atributos que se pueden asignar masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'email',
        'ciudad',
        'creado_por',
        'actualizado_por',
    ];

    /**
     * Ejemplo de relaciones posibles.
     */
    // public function empleados()
    // {
    //     return $this->hasMany(Empleado::class);
    // }

    // public function productos()
    // {
    //     return $this->belongsToMany(Producto::class, 'stock');
    // }
}
