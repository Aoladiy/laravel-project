<?php

use App\Http\Controllers\AdminController;
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
Route::get('/articles/{article:slug}', [PagesController::class, 'article'])->name('article');


Route::get('/catalog', [CatalogController::class, 'catalog'])->name('catalog');
Route::get('/products/{id:id}', [CatalogController::class, 'product'])->name('product');


Route::get('/admin', [AdminController::class, 'admin'])->name('admin');

Route::get('/admin/articles', [AdminController::class, 'adminArticles'])->name('adminArticles');
Route::get('/admin/articles/create', [AdminController::class, 'adminArticleCreate'])->name('adminArticleCreate');
Route::post('/admin/articles/create', [AdminController::class, 'adminArticleCreateRequest'])->name('adminArticleCreateRequest');

Route::get('/admin/models', [AdminController::class, 'adminModels'])->name('adminModels');
Route::get('/admin/models/create', [AdminController::class, 'adminModelCreate'])->name('adminModelCreate');
Route::post('/admin/models/create', [AdminController::class, 'adminModelCreateRequest'])->name('adminModelCreateRequest');
Route::get('/admin/models/edit/{model}', [AdminController::class, 'adminModelEdit'])->name('adminModelEdit');
Route::patch('/admin/models/edit/{model}', [AdminController::class, 'adminModelEditRequest'])->name('adminModelEditRequest');
Route::delete('/admin/models/delete/{model}', [AdminController::class, 'adminModelDeleteRequest'])->name('adminModelDeleteRequest');
