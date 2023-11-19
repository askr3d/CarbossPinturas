<?php

namespace Database\Seeders;

use App\Models\Orden;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Orden::create([
            'id_orden' =>'1',
            'nombre' => 'Test',
            'status' => 'Pendiente',
            'precio_total' => 20.00,
            'fk_user' => 1,
        ]);
    }
}
