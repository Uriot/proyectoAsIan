<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\Subcategoria;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [

            //   AUDIFONOS
            [
                'nombre' => 'Logitech G733 Lightspeed',
                'descripcion' => 'Audífonos inalámbricos para gaming con micrófono RGB y sonido envolvente DTS.',
                'precio_venta' => 1250.00,
                'activo' => true,
                'imagen' => 'https://img.pacifiko.com/PROD/resize/1/500x500/MmE1ZTI4ND.jpg',
                'subcategorias' => ['Audífonos', 'Ver todo'],
            ],
            [
                'nombre' => 'HyperX Cloud II',
                'descripcion' => 'Audífonos con sonido 7.1 virtual, cómodas almohadillas y micrófono desmontable.',
                'precio_venta' => 975.00,
                'activo' => true,
                'imagen' => 'https://images-cdn.ubuy.qa/658d60d9dc6f57335e013276-hyperx-cloud-ii-wired-over-ear-gaming.jpg',
                'subcategorias' => ['Audífonos', 'Micrófonos'],
            ],
            [
                'nombre' => 'Sony WH-1000XM5',
                'descripcion' => 'Audífonos inalámbricos con cancelación activa de ruido y batería de 30 horas.',
                'precio_venta' => 2900.00,
                'activo' => true,
                'imagen' => 'https://i5.walmartimages.com/seo/Sony-WH-1000XM5-Noise-Canceling-Wireless-Over-Ear-Headphones-Silver-30-Hours-Playback-Time-Hands-Free-Calling-Alexa-Voice-Control-Kit-Charging-Cube_beca468b-da46-430d-8518-7cbf72b9c333.dd9efb7827181284190bf208a966a2cd.jpeg',
                'subcategorias' => ['Audífonos', 'Cables de Audio'],
            ],

            //   COMPUTADORAS
            [
                'nombre' => 'ASUS TUF Gaming F15',
                'descripcion' => 'Laptop gamer con Intel Core i7, RTX 4060 y pantalla 144Hz.',
                'precio_venta' => 9500.00,
                'activo' => true,
                'imagen' => 'https://img.pacifiko.com/PROD/resize/1/500x500/ODhmYmE2ZD.jpg',
                'subcategorias' => ['Notebooks', 'Computadoras de otras Marcas'],
            ],
            [
                'nombre' => 'HP Pavilion 15',
                'descripcion' => 'Laptop con procesador Intel Core i5 13ª Gen, SSD 512GB y 16GB RAM.',
                'precio_venta' => 6400.00,
                'activo' => true,
                'imagen' => 'https://media.alquimio.cloud/images/azure_INDEX%2015-dk0005la%201.png',
                'subcategorias' => ['Notebooks', 'Accesorios para Notebooks'],
            ],
            [
                'nombre' => 'Dell XPS 13',
                'descripcion' => 'Ultrabook premium con pantalla InfinityEdge y diseño de aluminio.',
                'precio_venta' => 9800.00,
                'activo' => true,
                'imagen' => 'https://m.media-amazon.com/images/I/71wo-NRAAeS._AC_SL1500_.jpg',
                'subcategorias' => ['Notebooks', 'Ver todo'],
            ],

            //   MOUSE
            [
                'nombre' => 'Logitech G Pro X Superlight',
                'descripcion' => 'Mouse inalámbrico ultraligero para gaming con sensor HERO 25K.',
                'precio_venta' => 1150.00,
                'activo' => true,
                'imagen' => 'https://intecsa.com.gt/wp-content/uploads/2025/01/065f1704as1qz2a0pa10v4whdg.jpeg',
                'subcategorias' => ['Mouse Ópticos', 'Mouse Ergonómicos'],
            ],
            [
                'nombre' => 'Razer DeathAdder V2',
                'descripcion' => 'Mouse ergonómico con cable y sensor óptico Focus+ de 20,000 DPI.',
                'precio_venta' => 550.00,
                'activo' => true,
                'imagen' => 'https://assets2.razerzone.com/images/pnx.assets/54f7ea1ed89ef3c5e217d71265484b8c/razer-deathadder-v2-halo-500x500.png',
                'subcategorias' => ['Mouse Ópticos', 'Mouse Pads'],
            ],
            [
                'nombre' => 'Logitech MX Master 3S',
                'descripcion' => 'Mouse inalámbrico profesional con conectividad Bluetooth y USB receptor.',
                'precio_venta' => 850.00,
                'activo' => true,
                'imagen' => 'https://m.media-amazon.com/images/I/61TU7cMHepL._AC_SL1500_.jpg',
                'subcategorias' => ['Mouse Ergonómicos', 'Ver todo'],
            ],

            //   TECLADOS
            [
                'nombre' => 'Logitech G915 TKL',
                'descripcion' => 'Teclado mecánico inalámbrico RGB con switches GL Tactile.',
                'precio_venta' => 1800.00,
                'activo' => true,
                'imagen' => 'https://img.pacifiko.com/PROD/resize/1/500x500/Yzk3MjFlMW.jpg',
                'subcategorias' => ['Teclados Bluetooth', 'Teclados Mecánicos'],
            ],
            [
                'nombre' => 'Redragon Kumara K552',
                'descripcion' => 'Teclado mecánico compacto con switches Outemu Blue.',
                'precio_venta' => 395.00,
                'activo' => true,
                'imagen' => 'https://redragon.es/content/uploads/2021/04/KUMARA.png',
                'subcategorias' => ['Teclados Normales', 'Ver todo'],
            ],

            //   CONSOLAS
            [
                'nombre' => 'PlayStation 5 Slim',
                'descripcion' => 'Consola de videojuegos con SSD ultra rápido y gráficos 4K.',
                'precio_venta' => 7600.00,
                'activo' => true,
                'imagen' => 'https://i5.walmartimages.com/seo/Sony-PlayStation-5-Slim-Digital-PS5-Video-Game-Console-with-Extra-Edge-Controller_a1a7f11f-dbf9-415b-b72b-f0651a3ae921.0005ec25721e35438a6f94ae0673d900.jpeg',
                'subcategorias' => ['Playstation', 'Videojuegos'],
            ],
            [
                'nombre' => 'Xbox Series X',
                'descripcion' => 'Consola de Microsoft con 1TB SSD y soporte 4K HDR.',
                'precio_venta' => 7100.00,
                'activo' => true,
                'imagen' => 'https://i5.walmartimages.com/seo/Microsoft-RRT-00024-Xbox-Series-X-1TB-Console-Black_fd9cc3cc-3533-4eec-a87d-e6abcc77aae7.0e7d395789bb5e75eb627b80cfe78b13.jpeg',
                'subcategorias' => ['Xbox', 'Videojuegos'],
            ],
            [
                'nombre' => 'Nintendo Switch OLED',
                'descripcion' => 'Consola híbrida con pantalla OLED de 7” y dock mejorado.',
                'precio_venta' => 4500.00,
                'activo' => true,
                'imagen' => 'https://img.pacifiko.com/PROD/resize/1/500x500/OWFkMTFlMm.jpg',
                'subcategorias' => ['Nintendo Switch', 'Portables'],
            ],
            
            //  COMPONENTES PC
            [
                'nombre' => 'Intel Core i7-13700K',
                'descripcion' => 'Procesador de 13ª generación con 16 núcleos y soporte DDR5.',
                'precio_venta' => 3900.00,
                'activo' => true,
                'imagen' => 'https://www.intelaf.com/images/productos/gran/cor-i713700k-34.jpg',
                'subcategorias' => ['Procesadores', 'CPU Coolers'],
            ],
            [
                'nombre' => 'AMD Ryzen 5 7600X',
                'descripcion' => 'Procesador de 6 núcleos y 12 hilos de alto rendimiento.',
                'precio_venta' => 2950.00,
                'activo' => true,
                'imagen' => 'https://img.pacifiko.com/PROD/resize/1/500x500/B0BBJDS62N.jpg',
                'subcategorias' => ['Procesadores', 'Motherboards'],
            ],
            [
                'nombre' => 'Kingston Fury Beast 16GB DDR5 6000MHz',
                'descripcion' => 'Memoria RAM DDR5 de alto rendimiento para gamers.',
                'precio_venta' => 950.00,
                'activo' => true,
                'imagen' => 'https://media.kingston.com/kingston/product/FURY_Beast_Black_RGB_DDR5_4_angle-zm-lg.jpg',
                'subcategorias' => ['Memorias', 'Ver todo'],
            ],
            [
                'nombre' => 'ASUS ROG Strix B650-E',
                'descripcion' => 'Motherboard AM5 con PCIe 5.0 y WiFi 6E integrado.',
                'precio_venta' => 2800.00,
                'activo' => true,
                'imagen' => 'https://rog.asus.com/es/motherboards/rog-strix/rog-strix-b650e-f-gaming-wifi-model/',
                'subcategorias' => ['Motherboards', 'Fuentes'],
            ],
            [
                'nombre' => 'Gigabyte RTX 4070 Ti 12GB',
                'descripcion' => 'Tarjeta de video de alto rendimiento para gaming 4K.',
                'precio_venta' => 8900.00,
                'activo' => true,
                'imagen' => 'https://img.pacifiko.com/PROD/resize/1/500x500/MzMyY2UwZm.jpg',
                'subcategorias' => ['Tarjetas de Video', 'Ventiladores'],
            ],
            [
                'nombre' => 'Cooler Master Hyper 212 Black Edition',
                'descripcion' => 'Disipador de aire con excelente rendimiento térmico.',
                'precio_venta' => 450.00,
                'activo' => true,
                'imagen' => 'https://img.pacifiko.com/PROD/resize/1/1000x1000/MjYzMmI5OT_18.jpg',
                'subcategorias' => ['CPU Coolers', 'Ventiladores'],
            ],

            //  ALMACENAMIENTO
            [
                'nombre' => 'Samsung 980 Pro 1TB',
                'descripcion' => 'SSD NVMe PCIe 4.0 de alta velocidad.',
                'precio_venta' => 1600.00,
                'activo' => true,
                'imagen' => 'https://m.media-amazon.com/images/I/61Mo8ug0aQS.jpg',
                'subcategorias' => ['Unidad de Estado Sólido SSD', 'Ver todo'],
            ],
            [
                'nombre' => 'Seagate Barracuda 2TB',
                'descripcion' => 'Disco duro interno de 3.5” para almacenamiento general.',
                'precio_venta' => 550.00,
                'activo' => true,
                'imagen' => 'https://img.pacifiko.com/PROD/resize/1/1000x1000/N2MyNWRmMT.png',
                'subcategorias' => ['Discos Duros Internos', 'Para NAS'],
            ],
            [
                'nombre' => 'Western Digital Red 4TB NAS',
                'descripcion' => 'Disco duro optimizado para sistemas NAS.',
                'precio_venta' => 890.00,
                'activo' => true,
                'imagen' => 'https://cdn.kemik.gt/2024/04/WD40EFPX-WD-1200x1200-01.-500x500.jpg',
                'subcategorias' => ['Para NAS', 'Discos Duros Internos'],
            ],

            //  CELULARES Y ACCESORIOS
            [
                'nombre' => 'iPhone 15 Pro',
                'descripcion' => 'Smartphone Apple con chip A17 Pro y cámara profesional.',
                'precio_venta' => 13500.00,
                'activo' => true,
                'imagen' => 'https://istore.gt/wp-content/uploads/2023/10/EC00150i.jpg',
                'subcategorias' => ['Celulares', 'Cases', 'Protectores de Pantalla'],
            ],
            [
                'nombre' => 'Samsung Galaxy S24 Ultra',
                'descripcion' => 'Smartphone Android con cámara 200MP y S Pen.',
                'precio_venta' => 12900.00,
                'activo' => true,
                'imagen' => '',
                'subcategorias' => ['Celulares', 'Cables Celulares', 'Baterías Cargadores y Powerbanks'],
            ],
            [
                'nombre' => 'Xiaomi 14 Pro',
                'descripcion' => 'Celular de alto rendimiento con cámara Leica y Snapdragon 8 Gen 3.',
                'precio_venta' => 9800.00,
                'activo' => true,
                'imagen' => 'https://mimarket.micoope.com.gt/wp-content/uploads/2024/07/LD0006113616.jpg',
                'subcategorias' => ['Celulares', 'Ver todo'],
            ],

            //   CABLES
            [
                'nombre' => 'Cable HDMI 2.1 3m',
                'descripcion' => 'Cable HDMI compatible con 8K a 60Hz y 4K a 120Hz.',
                'precio_venta' => 150.00,
                'activo' => true,
                'imagen' => 'https://centralmarket.gt/images/detailed/47/114__1_.png',
                'subcategorias' => ['Cables de Video', 'Cables de Computadoras'],
            ],
            [
                'nombre' => 'Cable USB-C a Lightning 1m',
                'descripcion' => 'Cable de carga rápida compatible con iPhone y iPad.',
                'precio_venta' => 220.00,
                'activo' => true,
                'imagen' => 'https://istore.gt/wp-content/uploads/2023/08/ART004164i.jpg',
                'subcategorias' => ['Cables para Celulares', 'Adaptadores y Convertidores'],
            ],
            [
                'nombre' => 'Adaptador DisplayPort a HDMI',
                'descripcion' => 'Conversor de señal DisplayPort a HDMI para monitores 4K.',
                'precio_venta' => 180.00,
                'activo' => true,
                'imagen' => 'https://m.media-amazon.com/images/I/51ST6OSwFdL._AC_SL1500_.jpg',
                'subcategorias' => ['Adaptadores y Convertidores', 'Cables de Video'],
            ],

            //  ENERGÍA
            [
                'nombre' => 'Forza UPS 1000VA',
                'descripcion' => 'UPS interactiva con 4 salidas y protección de energía.',
                'precio_venta' => 850.00,
                'activo' => true,
                'imagen' => 'https://cdn.kemik.gt/2022/05/SL-1011UL-FORZA-UPS-1200X1200-1-1-526x526.jpg',
                'subcategorias' => ['UPS', 'Reguladores'],
            ],
            [
                'nombre' => 'Tripp Lite AVR750U',
                'descripcion' => 'UPS con regulación automática de voltaje y 10 tomas.',
                'precio_venta' => 1200.00,
                'activo' => true,
                'imagen' => 'https://m.media-amazon.com/images/I/71nAI-WrVrL._AC_SL1500_.jpg',
                'subcategorias' => ['UPS', 'Protectores'],
            ],
            [
                'nombre' => 'APC Back-UPS 1500VA',
                'descripcion' => 'UPS con batería de respaldo para PC y router.',
                'precio_venta' => 1650.00,
                'activo' => true,
                'imagen' => 'https://img.pacifiko.com/PROD/resize/1/500x500/B06VY6FXMM.jpg',
                'subcategorias' => ['UPS', 'Ver todo'],
            ],
        ];

        // Insertar productos y relacionar subcategorías
        foreach ($data as $item) {
            $producto = Producto::create([
                'nombre' => $item['nombre'],
                'descripcion' => $item['descripcion'],
                'precio_venta' => $item['precio_venta'],
                'activo' => $item['activo'],
                'imagen' => $item['imagen'],
            ]);

            // Relacionar subcategorías existentes
            if (!empty($item['subcategorias'])) {
                foreach ($item['subcategorias'] as $sub) {
                    $subcategoria = Subcategoria::where('nombre', $sub)->first();
                    if ($subcategoria) {
                        $producto->subcategorias()->attach(
                            $subcategoria->id,
                            ['activo' => true, 'creado_por' => 'urizarian@gmail.com', 'actualizado_por' => null]
                        );
                    }
                }
            }
        }
    }
}
