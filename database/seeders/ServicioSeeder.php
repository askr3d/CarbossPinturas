<?php

namespace Database\Seeders;

use App\Models\Servicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Servicio::create([
            'nombre' => 'Pintado Exterior',
            'costo_por_m2' => 600
        ]);
        
        Servicio::create([
            'nombre' => 'Pintado Interior',
            'costo_por_m2' => 500
        ]);
    }
}
