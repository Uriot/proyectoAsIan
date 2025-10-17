<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MetodosPagosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nombre' => 'Tarjeta de Crédito', 'descripcion' => 'Pago mediante tarjeta de crédito.', 'creado_por' => 'Urizarian@gmail.com', 'actualizado_por' => null, 'activo' => true],
            ['nombre' => 'Tarjeta de Débito', 'descripcion' => 'Pago mediante tarjeta de débito.', 'creado_por' => 'Urizarian@gmail.com', 'actualizado_por' => null, 'activo' => true],
            ['nombre' => 'Pago en Efectivo', 'descripcion' => 'Pago realizado en efectivo en el punto de venta o entrega.', 'creado_por' => 'urizarian@gmail.com', 'actualizado_por' => null, 'activo' => true],
            ['nombre' => 'Pago Contra Entrega', 'descripcion' => 'El pago se realiza al momento de recibir el producto o servicio.', 'creado_por' => 'urizarian@gmail.com', 'actualizado_por' => null, 'activo' => true],
        ];
    }
}
