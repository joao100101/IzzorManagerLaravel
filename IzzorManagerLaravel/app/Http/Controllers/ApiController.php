<?php

namespace App\Http\Controllers;

use App\Models\Plataforma;
use App\Models\Produto;
use Illuminate\Http\Request;
use App\Models\Categoria;

class ApiController extends Controller
{
    //

    public function categoriaFindAll()
    {
        $categorias = Categoria::all();

        return response()->json($categorias);
    }

    public function produtoFindByCategory($id){
        $produtos = Produto::where('categoria_id', $id)->get();

        return response()->json($produtos);
    }

    public function plataformaFindAll(){
        $plataformas = Plataforma::all();

        return response()->json($plataformas);
    }
}
