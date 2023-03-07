<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [CategoriaController::class, 'index']);
Route::get('/categoria/create', [CategoriaController::class, 'create']);
Route::post('/categoria', [CategoriaController::class, 'store']);
Route::get('/categoria/edit/{id}', [CategoriaController::class, 'edit']);
Route::get('/categoria/{id}', [CategoriaController::class, 'view']);

Route::get('/produtos', [ProdutoController::class, 'index']);
Route::get('/produtos/create', [ProdutoController::class, 'create']);