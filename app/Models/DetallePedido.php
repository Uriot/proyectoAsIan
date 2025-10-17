<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    /** @use HasFactory<\Database\Factories\DetallePedidoFactory> */
    use HasFactory;

    /**
     * Nombre de la tabla asociada.
     *
     * @var string
     */
    protected $table = 'detalles_pedido';

    /**
     * Atributos asignables masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_pedido',
        'id_producto',
        'cantidad',
        'precio',
    ];

    /**
     * Casts automáticos para tipos de datos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'cantidad' => 'integer',
        'precio' => 'decimal:2',
    ];

    /**
     * Relación: un detalle pertenece a un pedido.
     */
    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'id_pedido');
    }

    /**
     * Relación: un detalle pertenece a un producto.
     */
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }


}
