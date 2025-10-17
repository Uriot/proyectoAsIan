<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sucursal;

class SucursalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nombre' => 'Plaza Americas', 'direccion' => 'Carretera Interamericana, km 12, Mazatenango, Suchitepéquez', 'telefono' => '1234-5678', 'email' => 'plazaamericas@tecnoflow.com', 'ciudad' => 'Mazatenango', 'creado_por' => 'urizarian@gmail.com', 'actualizado_por' => null],
            ['nombre' => 'TecnoFlow Central', 'direccion' => '6a Avenida 4-55, Zona 1, Ciudad de Guatemala', 'telefono' => '2222-3344', 'email' => 'central@tecnoflow.com', 'ciudad' => 'Ciudad de Guatemala', 'creado_por' => 'urizarian@gmail.com', 'actualizado_por' => null],
            ['nombre' => 'Sucursal Quetzaltenango', 'direccion' => '4a Calle 8-22, Zona 3, Quetzaltenango', 'telefono' => '7766-5544', 'email' => 'quetzaltenango@tecnoflow.com', 'ciudad' => 'Quetzaltenango', 'creado_por' => 'urizarian@gmail.com', 'actualizado_por' => null],
            ['nombre' => 'Sucursal Escuintla', 'direccion' => 'Avenida Centroamérica 3-10, Zona 2, Escuintla', 'telefono' => '7888-9911', 'email' => 'escuintla@tecnoflow.com', 'ciudad' => 'Escuintla', 'creado_por' => 'urizarian@gmail.com', 'actualizado_por' => null],
        ];

        foreach ($data as $item) {
            Sucursal::create($item);
        }
    }
}
