<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    /** @use HasFactory<\Database\Factories\ProductoFactory> */
    use HasFactory;

    /**
     * Nombre de la tabla asociada.
     *
     * @var string
     */
    protected $table = 'productos';

    /**
     * Atributos que se pueden asignar masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio_venta',
        'activo',
        'imagen',
    ];

    /**
     * Casts automáticos de atributos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'activo' => 'boolean',
        'precio_venta' => 'decimal:2',
    ];

    public function subcategorias()
    {
        return $this->belongsToMany(Subcategoria::class, 'subcategorias_productos')
            ->withPivot(['activo', 'creado_por', 'actualizado_por'])
            ->withTimestamps();
    }

    public function detallesPedidos()
    {
        return $this->hasMany(DetallePedido::class, 'id_producto');
    }

    /**
     * Ejemplo de relaciones posibles.
     */
    // public function proveedor()
    // {
    //     return $this->belongsTo(Proveedor::class);
    // }

    // public function categoria()
    // {
    //     return $this->belongsTo(Categoria::class);
    // }

    // public function stock()
    // {
    //     return $this->hasOne(Stock::class);
    // }
}
