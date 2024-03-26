<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class SuperadminSeeder extends Seeder
{
    
    public function run(): void
    {
        User::create([
            'name' => 'Superadmin',
            'email' => 'superadmin@example.com',
            'password' => bcrypt('Bogota123:'), // Cambia 'password' por la contraseña deseada
            'role' => 'super_admin',
        ]);
    }
}
