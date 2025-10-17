<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nombre' => 'Astro A30',
                'descripcion' => 'Audifono Inalambrico Para Gamers Marca Logitech Modelo Astro A30 Lightspeed Color Blanco Con Gris Para PlayStation y PC',
                'precio_venta' => 100.00,
                'activo' => true,
                'imagen' => 'https://img.pacifiko.com/PROD/resize/1/500x500/Nzk2MjI5NT.jpg',
                'subcategorias' => [
                    'Audífonos',
                ]
            ],
            [
                'nombre' => 'Astro A30',
                'descripcion' => 'Audifono Inalambrico Para Gamers Marca Logitech Modelo Astro A30 Lightspeed Color Blanco Con Gris Para PlayStation y PC',
                'precio_venta' => 100.00,
                'activo' => true,
                'imagen' => 'https://img.pacifiko.com/PROD/resize/1/500x500/Nzk2MjI5NT.jpg',
                'subcategorias' => [
                    'Audífonos',
                ]
            ],
        ];
    }
}
