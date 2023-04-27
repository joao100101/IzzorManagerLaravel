<?php

use App\Http\Controllers\VendaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
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

Route::get('/', [Controller::class, 'index'])->name('index');

Route::get('/categoria', [CategoriaController::class, 'index']);
Route::get('/categoria/create', [CategoriaController::class, 'create']);
Route::post('/categoria', [CategoriaController::class, 'store']);
Route::delete('/categoria/delete/{id}', [CategoriaController::class, 'destroy']);
Route::get('/categoria/edit/{id}', [CategoriaController::class, 'edit']);
Route::put('/categoria/update/{id}', [CategoriaController::class, 'update']);
Route::get('/categoria/{id}', [CategoriaController::class, 'ver']);

//Adicionar barra de pesquisa
Route::get('/produtos', [ProdutoController::class, 'index']);
Route::get('/produto/{id}', [ProdutoController::class, 'readOne']);
Route::get('/produto/create', [ProdutoController::class, 'create']);
Route::post('/produto/create', [ProdutoController::class, 'store']);
Route::get('/categoria/{id}/produtos', [ProdutoController::class, 'findByCategory']);
Route::get('/produto/edit/{id}', [ProdutoController::class, 'edit']);
Route::put('/produto/update/{id}', [ProdutoController::class, 'update']);
Route::delete('/produto/delete/{id}', [ProdutoController::class, 'destroy']);

Route::get('/plataforma', [PlataformaController::class, 'index']);
Route::get('/plataforma/create', [PlataformaController::class, 'create']);
Route::get('plataforma/edit/{id}', [PlataformaController::class, 'edit']);
Route::put('/plataforma/update/{id}', [PlataformaController::class, 'update']);
Route::post('/plataforma/create', [PlataformaController::class, 'store']);
Route::delete('/plataforma/delete/{id}', [PlataformaController::class, 'destroy']);


Route::get('/vendas', [VendaController::class, 'index']);