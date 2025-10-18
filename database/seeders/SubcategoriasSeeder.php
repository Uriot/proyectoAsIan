<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "Apple" => ["AirPods", "iPads", "Notebooks Mac", "Todo Apple"],
            "Audio" => ["Audífonos", "Bocinas", "Cables de Audio", "Mezcladores", "Micrófonos", "Tarjetas de Sonido", "Ver todo"],
            "Baterías" => [],
            "Broadcasting" => ["Aros de Luz", "Audífonos", "Cámaras Web", "Mezcladores", "Micrófonos", "Ver todo"],
            "Cables" => ["Adaptadores y Convertidores", "Cables de Computadoras", "Cables Audio", "Cables para Celulares", "Cables computadoras", "Conectores", "Cables de Discos Duros", "Extensiones de Cables", "Cables de Impresoras", "Cables de Red", "Cables de Video", "Organizadores de Cables", "Baterías Cargadores y Powerbanks", "Ver todo"],
            "Cámaras" => ["Accesorios para Cámaras Digitales", "Cámaras de Acción", "Cámaras Digitales", "Cámaras de Seguridad", "Cámaras de Video", "Cámaras Web", "Otros Accesorios de Cámaras", "Ver todo"],
            "Celulares y Accesorios" => ["Celulares", "Accesorios para Deportes", "Audífonos", "Anillo de Luz", "Baterías Cargadores y Powerbanks", "Bocinas", "Cables Celulares", "Cases", "Estabilizadores", "Lapiceros", "Lentes para Cámara", "Lentes de Proteccion", "Organizadores de Cables", "Protectores de Pantalla", "Relojes", "Selfie Sticks", "Soporte para Carro", "Teclados Bluetooth para Celulares", "Otros Accesorios para Celulares", "Ver todo"],
            "Componentes PCs" => ["Cables", "Cases Computadora", "CDs y DVDs", "CPU Coolers", "Discos Duros", "Fuentes", "Herramientas", "Hubs", "Limpieza", "Lentes de Protección", "Memorias", "Motherboards", "Pastas Térmicas", "Procesadores", "Servidores", "Tarjetas", "Ventiladores"],
            "Computadoras" => ["Computadoras de otras Marcas", "Computadoras Todo en Uno", "Servidores"],
            "Consolas y Videojuegos" => ["Arcade", "Nintendo Switch", "Playstation", "Portables", "Xbox", "Videojuegos", "Ver todo"],
            "Creadores de Contenido" => ["Anillo de Luz", "Audífonos", "Cámaras de Acción", "Cámaras Web", "Estabilizadores", "Mezcladores", "Micrófonos", "Selfie Sticks"],
            "Discos Duros" => ["Discos Duros Externos", "Discos Duros Internos", "Unidad de Estado Sólido SSD", "Para Cámaras de Seguridad", "Para NAS", "Gabinetes - Docks para Discos Duros", "Ver todo"],
            "Drones" => ["Drones", "Mochilas", "Ver todo"],
            "Gaming" => ["Anillo de Luz", "Audífonos", "Bocinas", "Cámaras Web", "Cases de Computadora", "Computadoras", "Consolas y Videojuegos", "CPU Coolers", "Fuentes", "Discos Duros Externos", "Discos Duros Internos", "Gamepads", "Joysticks", "Leds", "Memorias", "Mezcladores", "Micrófonos", "Mochilas", "Monitores LED", "Motherboards", "Mouse", "Muebles", "Notebooks", "Procesadores", "Routers", "Sillas", "Tarjetas de Video", "Teclados", "Ventiladores", "VR"],
            "Iluminación" => [],
            "Memorias" => ["Lectores de Memorias", "Memorias para Computadoras", "Memorias para Notebooks", "Memory Stick", "SD y Micro SD", "USB", "Ver todo"],
            "Monitores" => ["Lentes de Protección", "Monitores Gaming", "Monitores LED", "Monitores LED Touch"],
            "Mouse" => ["Accesorios Mouse", "Mouse Ergonómicos", "Mouse Láser", "Mouse Ópticos", "Mouse Pads", "Presentadores", "Trackballs", "Ver todo"],
            "Notebooks y Accesorios" => ["Notebooks", "Transporta Tech", "Accesorios para Notebooks", "Baterías", "Cargadores", "Discos Duros", "Docking Stations", "Hubs", "Lector DVDs Externos", "Maletines", "Memorias", "Mochilas", "Skins", "Sleeves", "Soportes", "Ventiladores", "Ver todo"],
            "Programas" => ["Antivirus", "Microsoft Office", "Sistemas Operativos", "Ver todo"],
            "Redes" => ["Access Points", "Accesorios para POE", "Adaptadores de Red", "Antennas", "Cables de Red", "Extenders", "Herramientas para Redes", "KVMs", "Powerline", "Printservers", "Routers", "Switches", "Tarjetas de Red Ethernet", "Voice over IP", "Ver todo"],
            "Servidores" => ["Antivirus", "Discos Duros", "Gabinetes para Servidores", "Motherboards", "Racks para Servidores", "Regletas", "Repisas para Servidores", "Servidores", "Sistemas Operativos", "Switches", "Ver todo"],
            "Software" => ["Antivirus", "Microsoft Office", "Sistemas Operativos", "Ver todo"],
            "Teclados" => ["Accesorios para Teclados", "Teclados Mecanicos", "Teclados Bluetooth", "Teclados Ergonómicos", "Teclados Normales", "Teclados Multimedia", "Teclados Numéricos", "Teclados con Mouse Combos", "Ver todo"],
            "Trabajo Remoto" => ["Audífonos", "Botellas Cartuchos Toners", "Impresoras Láser", "Impresoras de Tinta Continua", "Mouse y Mousepads", "Notebooks", "Routers", "Sillas y Escritorios", "Tablets", "Teclados"],
            "UPS y Reguladores" => ["UPS", "Baterías para UPS", "Protectores", "Regletas", "Reguladores", "Ver todo"],
            "VR Realidad Virtual" => [],
        ];

        foreach ($data as $categoriaNombre => $subcategorias) {
            $categoria = Categoria::where('nombre', $categoriaNombre)->first();

            if ($categoria && !empty($subcategorias)) {
                foreach ($subcategorias as $sub) {
                    Subcategoria::create([
                        'categoria_id' => $categoria->id,
                        'nombre' => $sub,
                        'descripcion' => "Subcategoría de {$categoriaNombre}",
                    ]);
                }
            }
        }
    }
}
