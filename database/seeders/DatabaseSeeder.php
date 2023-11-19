<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PermisoSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(ServicioSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(OrdenSeeder::class);
    }
}
