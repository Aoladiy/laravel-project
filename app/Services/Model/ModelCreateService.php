<?php

namespace App\Services\Model;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Services\ImagesServiceContract;
use App\Contracts\Services\Model\ModelCreateServiceContract;
use Illuminate\Support\Facades\DB;

class ModelCreateService implements ModelCreateServiceContract
{
    public function __construct(public readonly ImagesServiceContract  $imagesServiceContract,
                                public readonly CarsRepositoryContract $carsRepositoryContract)
    {
    }

    public function create(array $data)
    {
        DB::transaction(function () use ($data) {
            if (!empty($data['image'])) {
                $image = $this->imagesServiceContract->createImage($data['image']);
                $data['image_id'] = $image->id;
            }
            $model = $this->carsRepositoryContract->create($data);
            $model->categories()->sync($data['category_ids']);
        });
    }
}
