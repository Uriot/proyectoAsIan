<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    /** @use HasFactory<\Database\Factories\SubcategoriaFactory> */
    use HasFactory;

    protected $table = 'subcategorias';

    protected $fillable = [
        'nombre',
        'descripcion',
        'categoria_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'subcategorias_productos')
            ->withPivot(['activo', 'creado_por', 'actualizado_por'])
            ->withTimestamps();
    }
}
