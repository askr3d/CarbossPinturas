<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Producto::insert([
            'nombre' => 'Pintura Aceite Azul',
            'descripcion' => 'Pintura de aceite color azul',
            'imagen' => 'img/products/1699209349.jpg',
            'precio' => 345.15,
            'existencia' => 20
        ]);

        Producto::insert([
            'nombre' => 'Pintura Aceite Amarrilla',
            'descripcion' => 'Pintura de aceite color amarilla',
            'imagen' => 'img/products/1699209382.jpg',
            'precio' => 345.15,
            'existencia' => 25
        ]);

        Producto::insert([
            'nombre' => 'Pintura Aceite Aqua',
            'descripcion' => 'Pintura de aceite color aqua',
            'imagen' => 'img/products/1699209422.jpg',
            'precio' => 402.72,
            'existencia' => 40
        ]);

        Producto::insert([
            'nombre' => 'Pintura Azul',
            'descripcion' => 'Pintura de color azul',
            'imagen' => 'img/products/1699209446.jpg',
            'precio' => 302.27,
            'existencia' => 50
        ]);

        Producto::insert([
            'nombre' => 'Pintura Blanca',
            'descripcion' => 'Pintura de color blanco',
            'imagen' => 'img/products/1699209472.jpg',
            'precio' => 302.27,
            'existencia' => 70
        ]);

        Producto::insert([
            'nombre' => 'Pintura Aceite Limon',
            'descripcion' => 'Pintura de aceite color limon',
            'imagen' => 'img/products/1699209503.jpg',
            'precio' => 425.51,
            'existencia' => 25
        ]);

        Producto::insert([
            'nombre' => 'Pintura Violeta',
            'descripcion' => 'Pintura de color violeta',
            'imagen' => 'img/products/1699209536.jpg',
            'precio' => 302.45,
            'existencia' => 15
        ]);

        Producto::insert([
            'nombre' => 'Pintura Aceite Morado',
            'descripcion' => 'Pintura de aceite color morado',
            'imagen' => 'img/products/1699209578.jpg',
            'precio' => 402.45,
            'existencia' => 20
        ]);

        Producto::insert([
            'nombre' => 'Pintura Roja',
            'descripcion' => 'Pintura de color roja',
            'imagen' => 'img/products/1699209601.jpg',
            'precio' => 302.45,
            'existencia' => 10
        ]);

        Producto::insert([
            'nombre' => 'Pintura Aceite Roja',
            'descripcion' => 'Pintura de aceite color roja',
            'imagen' => 'img/products/1699209623.jpg',
            'precio' => 402.45,
            'existencia' => 20
        ]);

        Producto::insert([
            'nombre' => 'Pintura Aceite Rosa',
            'descripcion' => 'Pintura de aceite color rosa',
            'imagen' => 'img/products/1699209648.jpg',
            'precio' => 302.45,
            'existencia' => 15
        ]);

        Producto::insert([
            'nombre' => 'Pintura Aceite Verde',
            'descripcion' => 'Pintura de aceite color verde',
            'imagen' => 'img/products/1699209674.jpg',
            'precio' => 302.45,
            'existencia' => 20
        ]);

        Producto::insert([
            'nombre' => 'Pintura Aceite Violeta',
            'descripcion' => 'Pintura de aceite color violeta',
            'imagen' => 'img/products/1699209694.jpg',
            'precio' => 302.45,
            'existencia' => 20
        ]);
    }
}
