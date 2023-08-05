<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Repositories\ImagesRepositoryContract;
use App\Contracts\Services\ImagesServiceContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\ModelRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ModelController extends Controller
{
    public function models(CarsRepositoryContract $carsRepositoryContract): View
    {
        $models = $carsRepositoryContract->findAll();
        return view('pages.admin.admin_models', ['models' => $models]);
    }

    public function modelCreate(): View
    {
        return view('pages.admin.admin_model_create');
    }

    public function modelCreateRequest(ModelRequest           $request,
                                       CarsRepositoryContract $carsRepositoryContract,
                                       ImagesServiceContract  $imagesServiceContract
    ): RedirectResponse
    {
        $data = $request->only([
            'name',
            'body',
            'price',
            'old_price',
            'image',
            'salon',
            'kpp',
            'year',
            'color',
            'is_new',
            'engine_id',
            'carcase_id',
            'class_id',
            'category_ids',
        ]);
        try {
            if (!empty($data['image'])) {
                $image = $imagesServiceContract->createImage($data['image']);
                $data['image_id'] = $image->id;
            }
            $model = $carsRepositoryContract->create($data);
            $categories = $request->get('category_ids');
            $model->categories()->sync($categories);
            return back()->with('success_message', ['Запись успешно создана']);
        } catch (\Exception $exception) {
            return back()->with('error_message', ['Запись не создана']);
        }
    }

    public function modelEdit($id, CarsRepositoryContract $carsRepositoryContract): View
    {
        $model = $carsRepositoryContract->findById($id);
        return view('pages.admin.admin_model_edit', ['model' => $model]);
    }

    public function modelEditRequest(ModelRequest           $request,
                                                            $id,
                                     CarsRepositoryContract $carsRepositoryContract,
                                     ImagesServiceContract  $imagesServiceContract,
    ): RedirectResponse
    {
        $data = $request->only([
            'name',
            'body',
            'price',
            'old_price',
            'image',
            'salon',
            'kpp',
            'year',
            'color',
            'is_new',
            'engine_id',
            'carcase_id',
            'class_id',
            'category_ids',
        ]);
        try {
            $oldImageId = null;
            $car = $carsRepositoryContract->findById($id);
            if (!empty($data['image'])) {
                $image = $imagesServiceContract->createImage($data['image']);
                $data['image_id'] = $image->id;
                $oldImageId = $car->image_id;
            }
            if (! empty($oldImageId)) {
                $imagesServiceContract->deleteImage($oldImageId);
            }

            $model = $carsRepositoryContract->update($id, $data);
            $categories = $request->get('category_ids');
            $model->categories()->sync($categories);
            return back()->with('success_message', ['Запись успешно изменена']);
        } catch (\Exception $exception) {
            return back()->with('error_message', ['Запись не изменена']);
        }
    }

    public function modelDeleteRequest($id,
                                       CarsRepositoryContract $carsRepositoryContract,
                                       ImagesServiceContract $imagesServiceContract
    ): RedirectResponse
    {
        try {
            $car = $carsRepositoryContract->findById($id);
            $imagesServiceContract->deleteImage($car->image_id);
            $carsRepositoryContract->delete($id);
            return back()->with('success_message', ['Запись с id=' . $id . ' успешно удалена']);
        } catch (\Exception $exception) {
            return back()->with('error_message', [$exception->getMessage()]);
//            return back()->with('error_message', ['Запись с id=' . $id . ' не удалена']);
        }
    }
}
