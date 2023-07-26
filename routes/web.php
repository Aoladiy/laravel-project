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

Route::get('/', [PagesController::class, 'home']);
Route::get('/test', function () {
    return view('layouts.inner');
});
Route::get('/catalog', [CatalogController::class, 'catalog']);
Route::get('/catalog/{product}', [CatalogController::class, 'product']);
