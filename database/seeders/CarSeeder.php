<?php

namespace Database\Seeders;

use App\Contracts\Services\ImagesServiceContract;
use App\Models\Car;
use App\Models\CarCarcase;
use App\Models\CarClass;
use App\Models\CarEngine;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(ImagesServiceContract $imagesServiceContract): void
    {
        $carClasses = CarClass::get();
        $carCarcases = CarCarcase::get();
        $carEngines = CarEngine::get();
        $categories = Category::get();

        for ($car = 0; $car < 10; $car++) {
            $carModel = Car::factory()->create([
                'class_id' => $carClasses->random(),
                'carcase_id' => $carCarcases->random(),
                'engine_id' => $carEngines->random(),
            ]);
            $carModel->images()->attach(Image::factory()->count(rand(0, 3))->create());
            $carModel->categories()->attach($categories->random(rand(1, 3)));
//            $image = $imagesServiceContract->createImage(storage_path(DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . Image::STORAGE_DISK . DIRECTORY_SEPARATOR . $carModel->image->path));
//            $carModel['image_id'] = $image->id;
        }
    }
}
