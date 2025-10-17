<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodoPago extends Model
{
    /** @use HasFactory<\Database\Factories\MetodoPagoFactory> */
    use HasFactory;

    /**
     * Nombre de la tabla asociada.
     *
     * @var string
     */
    protected $table = 'metodos_pagos';

    /**
     * Atributos asignables masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'creado_por',
        'actualizado_por',
        'activo',
    ];

    /**
     * Casts automáticos de atributos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'activo' => 'boolean',
    ];

    /**
     * Ejemplo de relaciones posibles (por ejemplo, pagos realizados con este método).
     */
    // public function pagos()
    // {
    //     return $this->hasMany(Pago::class);
    // }
}
