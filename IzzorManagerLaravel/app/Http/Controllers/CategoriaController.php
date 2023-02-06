<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    //
    public function index(){

        return view('categoria/categoria-read');
    }

    public function create(){
        return view('categoria/categoria-editar');
    }

    public function edit($id){

        $categoria = Categoria::findOrFail($id);
        return view('categoria/categoria-editar', ['categoria' => $categoria]);
    }
}
