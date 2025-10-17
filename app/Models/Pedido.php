<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    /** @use HasFactory<\Database\Factories\PedidoFactory> */
    use HasFactory;

    /**
     * Nombre de la tabla asociada.
     *
     * @var string
     */
    protected $table = 'pedidos';

    /**
     * Atributos asignables masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cliente_id',
        'sucursal_id',
        'fecha_pedido',
        'total',
        'estado',
        'tipo_entrega',
        'direccion_entrega',
        'creado_por',
        'actualizado_por',
    ];

    /**
     * Casts automáticos para tipos de datos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'fecha_pedido' => 'date',
        'total' => 'decimal:2',
    ];

    /**
     * Relación: un pedido pertenece a un cliente.
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    /**
     * Relación: un pedido pertenece a una sucursal.
     */
    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class);
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }

    public function detalles()
    {
        return $this->hasMany(DetallePedido::class, 'id_pedido');
    }
}
