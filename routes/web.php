<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ModelController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\PagesController;
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

Route::get('/articles', [PagesController::class, 'articles'])->name('articles');
Route::get('/articles/{slug}', [PagesController::class, 'article'])->name('article');


Route::get('/catalog/{slug?}', [CatalogController::class, 'catalog'])->name('catalog');
Route::get('/products/{id}', [CatalogController::class, 'product'])->name('product');


Route::get('/admin', [AdminController::class, 'admin'])->name('admin');

Route::get('/admin/articles', [ArticleController::class, 'articles'])->name('adminArticles');
Route::get('/admin/articles/create', [ArticleController::class, 'articleCreate'])->name('articleCreate');
Route::post('/admin/articles/create', [ArticleController::class, 'articleCreateRequest'])->name('articleCreateRequest');
Route::get('/admin/articles/edit/{slug}', [ArticleController::class, 'articleEdit'])->name('articleEdit');
Route::patch('/admin/articles/edit/{slug}', [ArticleController::class, 'articleEditRequest'])->name('articleEditRequest');
Route::delete('/admin/articles/delete/{slug}', [ArticleController::class, 'articleDeleteRequest'])->name('articleDeleteRequest');

Route::get('/admin/models', [ModelController::class, 'models'])->name('adminModels');
Route::get('/admin/models/create', [ModelController::class, 'modelCreate'])->name('modelCreate');
Route::post('/admin/models/create', [ModelController::class, 'modelCreateRequest'])->name('modelCreateRequest');
Route::get('/admin/models/edit/{id}', [ModelController::class, 'modelEdit'])->name('modelEdit');
Route::patch('/admin/models/edit/{id}', [ModelController::class, 'modelEditRequest'])->name('modelEditRequest');
Route::delete('/admin/models/delete/{id}', [ModelController::class, 'modelDeleteRequest'])->name('modelDeleteRequest');
