<?php

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialtiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialties = [
            'Neurología',
            'Pediatría',
            'Cardiología',
            'Urología',
            'Medicina interna',
            'Dermatología',
            'Cirugía'
        ];
        foreach($specialties as $specialty){
            Specialty::create([
                'name' => $specialty
            ]);
        }
    }
}
