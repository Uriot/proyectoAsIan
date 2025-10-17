<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Proveedor;

class ProveedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nombre' => 'Proveedor A', 'contacto' => 'Jose Soto', 'telefono' => '123456789', 'email' => 'jose@proveedora.com', 'nit' => '123456-7', 'creado_por' => 'urizarian@gmail.com', 'actualizado_por' => null],
            ['nombre' => 'Proveedor B', 'contacto' => 'Laura Méndez', 'telefono' => '321654987', 'email' => 'laura@techworld.com', 'nit' => '987654-3', 'creado_por' => 'urizarian@gmail.com', 'actualizado_por' => null],
            ['nombre' => 'Proveedor C', 'contacto' => 'Carlos Herrera', 'telefono' => '555123456', 'email' => 'carlos@electrosupply.com', 'nit' => '456789-9', 'creado_por' => 'urizarian@gmail.com', 'actualizado_por' => null],
            ['nombre' => 'Proveedor D', 'contacto' => 'María López', 'telefono' => '444987321', 'email' => 'maria@compunet.com', 'nit' => '789654-1', 'creado_por' => 'urizarian@gmail.com', 'actualizado_por' => null],
            ['nombre' => 'Proveedor E', 'contacto' => 'Luis Fernández', 'telefono' => '111222333', 'email' => 'luis@hardwareplus.com', 'nit' => '159753-8', 'creado_por' => 'urizarian@gmail.com', 'actualizado_por' => null],
            ['nombre' => 'Proveedor F', 'contacto' => 'Ana Torres', 'telefono' => '999888777', 'email' => 'ana@softzone.com', 'nit' => '753951-4', 'creado_por' => 'urizarian@gmail.com', 'actualizado_por' => null],
            ['nombre' => 'Proveedor G', 'contacto' => 'Ricardo Morales', 'telefono' => '777666555', 'email' => 'ricardo@componentesgt.com', 'nit' => '852456-2', 'creado_por' => 'urizarian@gmail.com', 'actualizado_por' => null],
            ['nombre' => 'Proveedor H', 'contacto' => 'Patricia Gómez', 'telefono' => '666555444', 'email' => 'patricia@devparts.com', 'nit' => '963741-5', 'creado_por' => 'urizarian@gmail.com', 'actualizado_por' => null],
            ['nombre' => 'Proveedor I', 'contacto' => 'Fernando Díaz', 'telefono' => '333222111', 'email' => 'fernando@audiomarket.com', 'nit' => '357951-6', 'creado_por' => 'urizarian@gmail.com', 'actualizado_por' => null],
            ['nombre' => 'Proveedor J', 'contacto' => 'Sofía Ramírez', 'telefono' => '888777666', 'email' => 'sofia@megatech.com', 'nit' => '147852-3', 'creado_por' => 'urizarian@gmail.com', 'actualizado_por' => null],
        ];

        foreach ($data as $proveedor) {
            \App\Models\Proveedor::create($proveedor);
        }
    }
}
