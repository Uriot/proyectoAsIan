<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SucursalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nombre' => 'Plaza Americas', 'direccion' => 'carretera interamericana, km 12, Mazatenango, Suchitepéquez', 'telefono' => '1234-5678', 'email' => 'plazaamericas@tecnoflow.com', 'ciudad' => 'Mazatenango', 'creado_por' => 'ian@mail.com', 'actualizado_por' => null],
        ];
    }
}
