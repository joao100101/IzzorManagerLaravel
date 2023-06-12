<?php

use App\Http\Controllers\VendaController;
use Illuminate\Auth\Middleware\Authenticate;
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

Route::get('/dashboard', [Controller::class, 'index'])->name('index')->middleware(Authenticate::class);
Route::get('/categoria', [CategoriaController::class, 'index'])->middleware(Authenticate::class);
Route::get('/categoria/create', [CategoriaController::class, 'create'])->middleware(Authenticate::class);
Route::post('/categoria', [CategoriaController::class, 'store'])->middleware(Authenticate::class);
Route::delete('/categoria/delete/{id}', [CategoriaController::class, 'destroy'])->middleware(Authenticate::class);
Route::get('/categoria/edit/{id}', [CategoriaController::class, 'edit'])->middleware(Authenticate::class);
Route::put('/categoria/update/{id}', [CategoriaController::class, 'update'])->middleware(Authenticate::class);
Route::get('/categoria/{id}', [CategoriaController::class, 'ver'])->middleware(Authenticate::class);

//Adicionar barra de pesquisa
Route::get('/produtos', [ProdutoController::class, 'index'])->middleware(Authenticate::class);
Route::get('/produto/{id}', [ProdutoController::class, 'readOne'])->middleware(Authenticate::class);
Route::get('/produtos/create', [ProdutoController::class, 'create'])->middleware(Authenticate::class);
Route::post('/produto/create', [ProdutoController::class, 'store'])->middleware(Authenticate::class);
Route::get('/categoria/{id}/produtos', [ProdutoController::class, 'findByCategory'])->middleware(Authenticate::class);
Route::get('/produto/edit/{id}', [ProdutoController::class, 'edit'])->middleware(Authenticate::class);
Route::put('/produto/update/{id}', [ProdutoController::class, 'update'])->middleware(Authenticate::class);
Route::delete('/produto/delete/{id}', [ProdutoController::class, 'destroy'])->middleware(Authenticate::class);

Route::get('/plataforma', [PlataformaController::class, 'index'])->middleware(Authenticate::class);
Route::get('/plataforma/create', [PlataformaController::class, 'create'])->middleware(Authenticate::class);
Route::get('plataforma/edit/{id}', [PlataformaController::class, 'edit'])->middleware(Authenticate::class);
Route::put('/plataforma/update/{id}', [PlataformaController::class, 'update'])->middleware(Authenticate::class);
Route::post('/plataforma/create', [PlataformaController::class, 'store'])->middleware(Authenticate::class);
Route::delete('/plataforma/delete/{id}', [PlataformaController::class, 'destroy'])->middleware(Authenticate::class);


Route::get('/vendas', [VendaController::class, 'index'])->middleware(Authenticate::class);
Route::get('/vendas/create', [VendaController::class, 'create'])->middleware(Authenticate::class);
Route::post('/processar-formulario', [VendaController::class, 'cartAdd'])->name('processar.formulario')->middleware(Authenticate::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('', [Controller::class, 'index'])->name('dashboard');
});
