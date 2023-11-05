<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'password' => 'password',
            'fk_permiso' => 1
        ]);
        User::create([
            'name' => 'Roman',
            'email' => 'roman@gmail.com',
            'password' => '1234',
            'fk_permiso' => 2
        ]);
        User::create([
            'name' => 'Sergio',
            'email' => 'sergio@gmail.com',
            'password' => '1234',
            'fk_permiso' => 2
        ]);
    }
}
