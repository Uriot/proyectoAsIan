<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProveedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nombre' => 'Proveedor A', 'contacto' => 'Jose Soto', 'telefono' => '123456789', 'email' => 'jose@proveedora.com', 'nit' => '123456-7', 'creado_por' => 'iantino@mail.com', 'actualizado_por' => null],
        ];
    }
}
