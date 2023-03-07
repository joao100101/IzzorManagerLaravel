<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoController extends Controller
{
    //
    public function index(){
        $produtos = Produto::paginate(20);
        return view('produto/produto-read', ['produtos' => $produtos]);
    }

    public function create(){
        $categories = Categoria::all();
        return view('produto/produto-criar', ['categories' => $categories]);
    }
}
