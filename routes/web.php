<?php

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
Route::get('/catalog', [CatalogController::class, 'catalog'])->name('catalog');
Route::get('/catalog/{product}', [CatalogController::class, 'product'])->name('product');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/contacts', [PagesController::class, 'contacts'])->name('contacts');
Route::get('/sale', [PagesController::class, 'sale'])->name('sale');
Route::get('/finance', [PagesController::class, 'finance'])->name('finance');
Route::get('/clients', [PagesController::class, 'clients'])->name('clients');
