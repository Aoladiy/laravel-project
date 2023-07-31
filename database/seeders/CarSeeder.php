<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarCarcase;
use App\Models\CarClass;
use App\Models\CarEngine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carClasses = CarClass::get();
        $carCarcases = CarCarcase::get();
        $carEngines = CarEngine::get();

        for ($car = 0; $car < 10; $car++) {
            Car::factory()->create([
                'class_id' => $carClasses->random(),
                'carcase_id' => $carCarcases->random(),
                'engine_id' => $carEngines->random(),
            ]);
        }

//        Car::factory()->count(10)->create();
    }
}