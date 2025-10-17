<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    /** @use HasFactory<\Database\Factories\DetalleCompraFactory> */
    use HasFactory;

    /**
     * Nombre de la tabla asociada.
     *
     * @var string
     */
    protected $table = 'detalle_compra';

    /**
     * Atributos asignables masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'compra_id',
        'producto_id',
        'cantidad',
        'precio_unitario',
        'creado_por',
        'actualizado_por',
    ];

    /**
     * Casts automáticos para tipos de datos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'precio_unitario' => 'decimal:2',
        'cantidad' => 'integer',
    ];

    /**
     * Relación: un detalle pertenece a una compra.
     */
    public function compra()
    {
        return $this->belongsTo(Compra::class);
    }

    /**
     * Relación: un detalle pertenece a un producto.
     */
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
