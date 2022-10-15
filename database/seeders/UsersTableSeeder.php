<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Miguel Perez',
            'email' => 'kmatagua@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('Admin177'),
            'cedula' => '001960447',
            'address' => 'Av. Los nogales 251 - T7 1003',
            'phone' => '+51902761020',
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'Paciente 1',
            'email' => 'paciente1@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'role' => 'paciente',
        ]);
        User::create([
            'name' => 'Medico 1',
            'email' => 'medico1@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'role' => 'doctor',
        ]);
        User::factory()
            ->count(50)
            ->create();
    }
}
