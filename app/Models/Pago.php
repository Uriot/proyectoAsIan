<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    /** @use HasFactory<\Database\Factories\PagoFactory> */
    use HasFactory;

    /**
     * Nombre de la tabla asociada.
     *
     * @var string
     */
    protected $table = 'pagos';

    /**
     * Atributos asignables masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pedido_id',
        'metodo_pago_id',
        'monto',
        'fecha_pago',
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
        'monto' => 'decimal:2',
        'fecha_pago' => 'date',
    ];

    /**
     * Relación: un pago pertenece a un pedido.
     */
    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    /**
     * Relación: un pago pertenece a un método de pago.
     */
    public function metodoPago()
    {
        return $this->belongsTo(MetodoPago::class);
    }
}
