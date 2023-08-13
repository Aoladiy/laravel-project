<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ModelController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\PagesController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PagesController::class, 'home'])->name('home');

Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/contacts', [PagesController::class, 'contacts'])->name('contacts');
Route::get('/sale', [PagesController::class, 'sale'])->name('sale');
Route::get('/finance', [PagesController::class, 'finance'])->name('finance');
Route::get('/clients', [PagesController::class, 'clients'])->name('clients');
Route::get('/salons', [PagesController::class, 'salons'])->name('salons');

Route::get('/articles', [PagesController::class, 'articles'])->name('articles');
Route::get('/articles/{slug}', [PagesController::class, 'article'])->name('article');


Route::middleware(['auth'])->get('/account', [PagesController::class, 'account'])->name('account');


Route::get('/catalog/{slug?}', [CatalogController::class, 'catalog'])->name('catalog');
Route::get('/products/{id}', [CatalogController::class, 'product'])->name('product');


Route::prefix('/admin')
    ->middleware(['auth', 'admin'])
    ->group(function (Router $router) {
        $router->get('/', [AdminController::class, 'admin'])->name('admin');

        $router->get('articles', [ArticleController::class, 'articles'])->name('adminArticles');
        $router->get('articles/create', [ArticleController::class, 'articleCreate'])->name('articleCreate');
        $router->post('articles/create', [ArticleController::class, 'articleCreateRequest'])->name('articleCreateRequest');
        $router->get('articles/edit/{slug}', [ArticleController::class, 'articleEdit'])->name('articleEdit');
        $router->patch('articles/edit/{slug}', [ArticleController::class, 'articleEditRequest'])->name('articleEditRequest');
        $router->delete('articles/delete/{slug}', [ArticleController::class, 'articleDeleteRequest'])->name('articleDeleteRequest');

        $router->get('models', [ModelController::class, 'models'])->name('adminModels');
        $router->get('models/create', [ModelController::class, 'modelCreate'])->name('modelCreate');
        $router->post('models/create', [ModelController::class, 'modelCreateRequest'])->name('modelCreateRequest');
        $router->get('models/edit/{id}', [ModelController::class, 'modelEdit'])->name('modelEdit');
        $router->patch('models/edit/{id}', [ModelController::class, 'modelEditRequest'])->name('modelEditRequest');
        $router->delete('models/delete/{id}', [ModelController::class, 'modelDeleteRequest'])->name('modelDeleteRequest');
    });

require __DIR__ . '/auth.php';
