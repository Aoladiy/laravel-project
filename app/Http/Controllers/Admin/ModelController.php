<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Repositories\ImagesRepositoryContract;
use App\Contracts\Services\ImagesServiceContract;
use App\Contracts\Services\Model\ModelCreateServiceContract;
use App\Contracts\Services\Model\ModelDeleteServiceContract;
use App\Contracts\Services\Model\ModelEditServiceContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\ModelRequest;
use App\Services\Model\ModelEditService;
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

    public function modelCreateRequest(ModelRequest               $request,
                                       ModelCreateServiceContract $modelCreateServiceContract,
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
            $modelCreateServiceContract->create($data);
            return back()->with('success_message', ['Запись успешно создана']);
        } catch (\Throwable $exception) {
            return back()->with('error_message', ['Запись не создана']);
        }
    }

    public function modelEdit(int                    $id,
                              CarsRepositoryContract $carsRepositoryContract): View
    {
        $model = $carsRepositoryContract->findById($id);
        return view('pages.admin.admin_model_edit', ['model' => $model]);
    }

    public function modelEditRequest(ModelRequest             $request,
                                     int                      $id,
                                     ModelEditServiceContract $modelEditServiceContract,
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
            $modelEditServiceContract->edit($id, $data);
            return back()->with('success_message', ['Запись успешно изменена']);
        } catch (\Exception $exception) {
            return back()->with('error_message', ['Запись не изменена']);
        }
    }

    public function modelDeleteRequest(int                        $id,
                                       ModelDeleteServiceContract $modelDeleteServiceContract,
    ): RedirectResponse
    {
        try {
            $modelDeleteServiceContract->delete($id);
            return back()->with('success_message', ['Запись с id=' . $id . ' успешно удалена']);
        } catch (\Exception $exception) {
            return back()->with('error_message', ['Запись с id=' . $id . ' не удалена']);
        }
    }
}
