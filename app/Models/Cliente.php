<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    /** @use HasFactory<\Database\Factories\ClienteFactory> */
    use HasFactory;

    /**
     * Nombre de la tabla asociada.
     *
     * @var string
     */
    protected $table = 'clientes';

    /**
     * Atributos asignables masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'nit',
        'direccion',
        'email',
        'telefono',
        'creado_por',
        'actualizado_por',
        'user_id',
    ];

    /**
     * Relación con el modelo User (cada cliente pertenece a un usuario).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Ejemplo de relación si el cliente tiene compras u órdenes.
     */
    // public function compras()
    // {
    //     return $this->hasMany(Compra::class);
    // }
}
