<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubcategoriaProducto extends Model
{
    /** @use HasFactory<\Database\Factories\SubcategoriaProductoFactory> */
    use HasFactory;

    /**
     * Nombre de la tabla asociada.
     *
     * @var string
     */
    protected $table = 'subcategorias_productos';

    /**
     * Atributos asignables masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'subcategoria_id',
        'producto_id',
        'activo',
        'creado_por',
        'actualizado_por',
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
     * Relaciones con otros modelos.
     */

    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
