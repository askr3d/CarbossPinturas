<?php

namespace Database\Seeders;

use App\Models\Permiso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permiso::create([
            'id_permiso' =>'1',
            'nombre' => 'Administrador'
        ]);
        Permiso::create([
            'id_permiso' =>'2',
            'nombre' => 'Cliente'
        ]);
    }
}
