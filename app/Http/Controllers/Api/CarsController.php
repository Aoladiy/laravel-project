<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Repositories\CategoriesRepositoryContract;
use App\Contracts\Services\Model\ModelCreateServiceContract;
use App\Contracts\Services\Model\ModelDeleteServiceContract;
use App\Contracts\Services\Model\ModelEditServiceContract;
use App\DTO\CatalogFilterDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use App\Http\Resources\CarResource;
use App\Models\Car;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request                      $request,
                          CategoriesRepositoryContract $categoriesRepositoryContract,
                          CarsRepositoryContract       $carsRepositoryContract,
                          ?string                      $slug = null,
    ): JsonResource
    {
        try {
            $allCategories = collect();
            $category = $categoriesRepositoryContract->findBySlug($slug, ['cars']) === false ? null : $categoriesRepositoryContract->findBySlug($slug, ['cars']);
            if ($category) {
                $allCategories = $categoriesRepositoryContract->getCategoryDescendantsIds($category);
            }
            $catalogFilterDTO = (new CatalogFilterDTO())
                ->setName($request->get('name'))
                ->setLowest($request->get('lowest'))
                ->setHighest($request->get('highest'))
                ->setOrderModel($request->get('order_model'))
                ->setOrderPrice($request->get('order_price'))
                ->setCategory($category)
                ->setAllCategories($allCategories);
            $currentPage = $request->get('page');
            return CarResource::collection($carsRepositoryContract->paginateForCatalog($catalogFilterDTO, page: $currentPage ?? 1, relations: ['image']))->additional(['success' => true]);
        } catch (\Throwable $throwable) {
            return JsonResource::make(['success' => false, 'message' => $throwable->getMessage(), 'code' => $throwable->getCode() ?? 500]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest                 $request,
                          ModelCreateServiceContract $modelCreateServiceContract,
    ): JsonResource
    {
        try {
            $data = $request->only([
                'name',
                'body',
                'price',
                'old_price',
                'carcase_id',
                'class_id',
            ]);
            $data['class_id'] = 1;
            $data['engine_id'] = 1;
            $data['category_ids'] = [];
            return new CarResource($modelCreateServiceContract->create($data));
        } catch (\Throwable $throwable) {
            return JsonResource::make(['success' => false, 'message' => $throwable->getMessage(), 'code' => $throwable->getCode() ?? 500]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id, CarsRepositoryContract $carsRepositoryContract): JsonResource
    {
        try {
            return new CarResource($carsRepositoryContract->findById($id, ['image', 'images', 'engine', 'carcase', 'class', 'categories']));
        } catch (\Throwable $throwable) {
            return JsonResource::make(['success' => false, 'message' => $throwable->getMessage(), 'code' => $throwable->getCode() ?? 500]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarRequest               $request,
                           int                      $id,
                           ModelEditServiceContract $modelEditServiceContract,
    ): JsonResource
    {
        try {
            $data = $request->only([
                'name',
                'body',
                'price',
                'old_price',
                'carcase_id',
            ]);
            $data['class_id'] = 1;
            $data['engine_id'] = 1;
            $data['category_ids'] = [];
            return new CarResource($modelEditServiceContract->edit($id, $data));
        } catch (\Throwable $throwable) {
            return JsonResource::make(['success' => false, 'message' => $throwable->getMessage(), 'code' => $throwable->getCode() ?? 500]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int                        $id,
                            ModelDeleteServiceContract $modelDeleteServiceContract,
    )
    {
        try {
            $modelDeleteServiceContract->delete($id);
            return [$id];
        } catch (\Throwable $throwable) {
            return JsonResource::make(['success' => false, 'message' => $throwable->getMessage(), 'code' => $throwable->getCode() ?? 500]);
        }
    }
}
