<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    //
    public function index(){
        $produtos = Produto::paginate(20);
        return view('produto/produto-read', ['produtos' => $produtos]);
    }
}
