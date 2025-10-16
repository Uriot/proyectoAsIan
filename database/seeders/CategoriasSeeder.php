<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            ["nombre" => "Apple", "descripcion" => "Productos y accesorios de la marca Apple.", "color" => "#A3AAAE", "icono" => "fa-brands fa-apple"],
            ["nombre" => "Audio", "descripcion" => "Equipos y accesorios de sonido profesional y personal.", "color" => "#FFB800", "icono" => "fa-solid fa-headphones"],
            ["nombre" => "Baterías", "descripcion" => "Baterías y cargadores para múltiples dispositivos.", "color" => "#007BFF", "icono" => "fa-solid fa-battery-full"],
            ["nombre" => "Broadcasting", "descripcion" => "Equipos y accesorios para transmisiones en vivo y creación de contenido.", "color" => "#9B59B6", "icono" => "fa-solid fa-video"],
            ["nombre" => "Cables", "descripcion" => "Cables, adaptadores y conectores de todo tipo.", "color" => "#27AE60", "icono" => "fa-solid fa-plug"],
            ["nombre" => "Cámaras", "descripcion" => "Cámaras digitales, de seguridad y accesorios relacionados.", "color" => "#E74C3C", "icono" => "fa-solid fa-camera"],
            ["nombre" => "Celulares y Accesorios", "descripcion" => "Teléfonos móviles y accesorios compatibles.", "color" => "#2ECC71", "icono" => "fa-solid fa-mobile-screen"],
            ["nombre" => "Componentes PCs", "descripcion" => "Componentes internos y repuestos para computadoras.", "color" => "#3498DB", "icono" => "fa-solid fa-microchip"],
            ["nombre" => "Computadoras", "descripcion" => "Computadoras de escritorio, portátiles y servidores.", "color" => "#8E44AD", "icono" => "fa-solid fa-desktop"],
            ["nombre" => "Consolas y Videojuegos", "descripcion" => "Consolas, videojuegos y accesorios para gamers.", "color" => "#F39C12", "icono" => "fa-solid fa-gamepad"],
            ["nombre" => "Creadores de Contenido", "descripcion" => "Equipos y accesorios para creadores de video y streaming.", "color" => "#16A085", "icono" => "fa-solid fa-photo-video"],
            ["nombre" => "Discos Duros", "descripcion" => "Discos duros internos, externos y unidades SSD.", "color" => "#1ABC9C", "icono" => "fa-solid fa-hard-drive"],
            ["nombre" => "Drones", "descripcion" => "Drones y accesorios para fotografía aérea.", "color" => "#BDC3C7", "icono" => "fa-solid fa-helicopter"],
            ["nombre" => "Gaming", "descripcion" => "Equipos, accesorios y componentes para videojuegos.", "color" => "#C0392B", "icono" => "fa-solid fa-gamepad"],
            ["nombre" => "Iluminación", "descripcion" => "Lámparas, luces LED y sistemas de iluminación.", "color" => "#F1C40F", "icono" => "fa-solid fa-lightbulb"],
            ["nombre" => "Memorias", "descripcion" => "Memorias USB, SD y RAM para distintos dispositivos.", "color" => "#9B59B6", "icono" => "fa-solid fa-memory"],
            ["nombre" => "Monitores", "descripcion" => "Monitores LED, touch y para gaming.", "color" => "#2980B9", "icono" => "fa-solid fa-tv"],
            ["nombre" => "Mouse", "descripcion" => "Mouse ópticos, láser y accesorios.", "color" => "#2ECC71", "icono" => "fa-solid fa-computer-mouse"],
            ["nombre" => "Notebooks y Accesorios", "descripcion" => "Laptops, mochilas, cargadores y accesorios.", "color" => "#E67E22", "icono" => "fa-solid fa-laptop"],
            ["nombre" => "Programas", "descripcion" => "Software y licencias para distintos propósitos.", "color" => "#34495E", "icono" => "fa-solid fa-code"],
            ["nombre" => "Redes", "descripcion" => "Equipos y accesorios de red y conectividad.", "color" => "#1ABC9C", "icono" => "fa-solid fa-network-wired"],
            ["nombre" => "Servidores", "descripcion" => "Equipos, racks y accesorios para servidores.", "color" => "#8E44AD", "icono" => "fa-solid fa-server"],
            ["nombre" => "Software", "descripcion" => "Aplicaciones, sistemas operativos y suites de oficina.", "color" => "#16A085", "icono" => "fa-solid fa-software"],
            ["nombre" => "Teclados", "descripcion" => "Teclados mecánicos, Bluetooth y accesorios.", "color" => "#27AE60", "icono" => "fa-solid fa-keyboard"],
            ["nombre" => "Trabajo Remoto", "descripcion" => "Equipos y accesorios para el teletrabajo.", "color" => "#2980B9", "icono" => "fa-solid fa-briefcase"],
            ["nombre" => "UPS y Reguladores", "descripcion" => "Equipos para protección y respaldo de energía.", "color" => "#F39C12", "icono" => "fa-solid fa-plug-circle-bolt"],
            ["nombre" => "VR Realidad Virtual", "descripcion" => "Dispositivos y accesorios de realidad virtual.", "color" => "#9B59B6", "icono" => "fa-solid fa-vr-cardboard"],
        ];

        foreach ($categorias as $categoria) {
            Categoria::create([
                'nombre' => $categoria['nombre'],
                'descripcion' => $categoria['descripcion'],
                'color' => $categoria['color'],
                'icono' => $categoria['icono'],
                'creado_por' => 'Seeder',
                'actualizado_por' => 'Seeder',
            ]);
        }
    }
};
