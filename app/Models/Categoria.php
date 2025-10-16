<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    use HasFactory;

    protected $table = 'categorias';


    protected $fillable = [
        'nombre',
        'descripcion',
        'color',
        'icono',
        'creado_por',
        'actualizado_por',
    ];

    public function subcategorias()
    {
        return $this->hasMany(Subcategoria::class);
    }
}
