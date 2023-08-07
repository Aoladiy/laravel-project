<?php

namespace App\Services\Model;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Services\ImagesServiceContract;
use App\Contracts\Services\Model\ModelDeleteServiceContract;
use Illuminate\Support\Facades\DB;

class ModelDeleteService implements ModelDeleteServiceContract
{
    public function __construct(public readonly CarsRepositoryContract $carsRepositoryContract,
                                public readonly ImagesServiceContract  $imagesServiceContract)
    {
    }

    public function delete(int $id): void
    {
        DB::transaction(function () use ($id) {
            $car = $this->carsRepositoryContract->findById($id);
            if (isset($car->image_id)) {
                $this->imagesServiceContract->deleteImage($car->image_id);
            }
            $this->carsRepositoryContract->delete($id);
        });
    }
}
