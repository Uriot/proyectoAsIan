<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    /** @use HasFactory<\Database\Factories\ProveedorFactory> */
    use HasFactory;

    /**
     * Nombre de la tabla asociada (opcional si sigue la convención plural del nombre del modelo).
     *
     * @var string
     */
    protected $table = 'proveedores';

    /**
     * Atributos que se pueden asignar masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'contacto',
        'direccion',
        'telefono',
        'email',
        'nit',
        'creado_por',
        'actualizado_por',
    ];

    /**
     * Si deseas ocultar atributos en respuestas JSON.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * Relación con otras tablas (ejemplo si más adelante se usa con productos o compras).
     */
    // public function productos()
    // {
    //     return $this->hasMany(Producto::class);
    // }
}
