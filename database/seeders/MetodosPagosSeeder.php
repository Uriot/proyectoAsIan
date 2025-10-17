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
            ['nombre' => 'Tarjeta de Crédito', 'descripcion' => 'Pago mediante tarjeta de crédito.', 'creado_por' => 'ian@mail.com', 'actualizado_por' => null, 'activo' => true],

        ];
    }
}
