<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PlataformaController;

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

Route::get('/', [CategoriaController::class, 'index'])->name('index');
Route::get('/categoria/create', [CategoriaController::class, 'create']);
Route::post('/categoria', [CategoriaController::class, 'store']);
Route::delete('/categoria/delete/{id}', [CategoriaController::class, 'destroy']);
Route::get('/categoria/edit/{id}', [CategoriaController::class, 'edit']);
Route::put('/categoria/update/{id}', [CategoriaController::class, 'update']);
Route::get('/categoria/{id}', [CategoriaController::class, 'view']);

Route::get('/produtos', [ProdutoController::class, 'index']);
Route::get('/categoria/{id}/produtos', [ProdutoController::class, 'findByCategory']);
Route::get('/produtos/create', [ProdutoController::class, 'create']);
Route::post('/produto/create', [ProdutoController::class, 'store']);

Route::post('/plataforma/create', [PlataformaController::class, 'create']);