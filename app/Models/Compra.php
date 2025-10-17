<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    /** @use HasFactory<\Database\Factories\CompraFactory> */
    use HasFactory;

    /**
     * Nombre de la tabla asociada.
     *
     * @var string
     */
    protected $table = 'compras';

    /**
     * Atributos que se pueden asignar masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'proveedor_id',
        'sucursal_id',
        'fecha_compra',
        'total',
        'estado',
        'creado_por',
        'actualizado_por',
    ];

    /**
     * Casts automáticos para tipos de datos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'fecha_compra' => 'date',
        'total' => 'decimal:2',
    ];

    /**
     * Relación: una compra pertenece a un proveedor.
     */
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    /**
     * Relación: una compra pertenece a una sucursal.
     */
    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class);
    }


    public function detalles()
    {
        return $this->hasMany(DetalleCompra::class);
    }
    /**
     * Ejemplo de relación si hay detalles de compra.
     */
    // public function detalles()
    // {
    //     return $this->hasMany(DetalleCompra::class);
    // }
}
