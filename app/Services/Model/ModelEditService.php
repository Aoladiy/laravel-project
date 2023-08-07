<?php

namespace App\Services\Model;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Services\ImagesServiceContract;
use App\Contracts\Services\Model\ModelEditServiceContract;
use Illuminate\Support\Facades\DB;

class ModelEditService implements ModelEditServiceContract
{
    public function __construct(public readonly CarsRepositoryContract $carsRepositoryContract,
                                public readonly ImagesServiceContract  $imagesServiceContract)
    {
    }

    public function edit(int $id, array $data)
    {
        DB::transaction(function () use ($data, $id) {
            $oldImageId = null;
            $car = $this->carsRepositoryContract->findById($id);
            if (!empty($data['image'])) {
                $image = $this->imagesServiceContract->createImage($data['image']);
                $data['image_id'] = $image->id;
                $oldImageId = $car->image_id;
            }
            if (!empty($oldImageId)) {
                $this->imagesServiceContract->deleteImage($oldImageId);
            }

            $model = $this->carsRepositoryContract->update($id, $data);
            $model->categories()->sync($data['category_ids']);
        });
    }
}
