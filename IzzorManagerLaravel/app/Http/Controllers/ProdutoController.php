<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Plataforma;

class ProdutoController extends Controller
{
    //
    public function index()
    {
        $produtos = Produto::with('categoria', 'plataforma')->paginate(20);
        return view('produto/produto-read', ['produtos' => $produtos]);
    }

    public function findByCategory($id)
    {
        $produtos = Produto::where([
            ['categoria_id', 'like', '%' . $id . '%']
        ])->get();

        return view('produto/produto-read', ['produtos' => $produtos]);
    }

    public function create()
    {
        $categories = Categoria::all();
        $plataformas = Plataforma::all();
        return view('produto/produto-criar', ['categories' => $categories, 'plataformas' => $plataformas]);
    }

    public function store(Request $request)
    {
        if ($request->titulo == null || $request->descricao == null || $request->categoria_id == null || $request->plataforma_id == null) {
            return redirect('/produtos/create')->with('msg-error', 'Produto inválido, verifique se os campos foram preenchidos corretamente.');
        }
        if (strlen($request->titulo) > 100) {
            return redirect('/produtos/create')->with('msg-error', 'Produto excede o limite de tamanho do titulo!');
        }
        if (strlen($request->descricao) > 400) {
            return redirect('/produtos/create')->with('msg-error', 'Produto excede o limite de tamanho da descrição!');
        }

        $produto = new Produto;



        $valor_peca = $request->valor_peca;
        $valor_peca = str_replace("R$ ", "", $valor_peca); // remove "R$ "
        $valor_peca = str_replace(".", "", $valor_peca);
        $valor_peca = str_replace(",", ".", $valor_peca); // substitui "," por "."
        $valor_peca = floatval($valor_peca); // converte para double

        $custo_peca = $request->custo_peca;
        $custo_peca = str_replace("R$ ", "", $custo_peca); // remove "R$ "
        $custo_peca = str_replace(".", "", $custo_peca);
        $custo_peca = str_replace(",", ".", $custo_peca); // substitui "," por "."
        $custo_peca = floatval($custo_peca); // converte para double




        $produto->titulo = $request->titulo;
        $produto->descricao = $request->descricao;
        $produto->categoria_id = $request->categoria_id;
        $produto->plataforma_id = $request->plataforma_id;
        $produto->custo_peca = $custo_peca;
        $produto->valor_venda = $valor_peca;

        // Image Upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->imagem;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/products'), $imageName);

            $produto->imagem = $imageName;
        } else {
            $produto->imagem = 'sem-foto.png';
        }


        $produto->save();
        return redirect('/produtos')->with('msg', 'Produto criado com sucesso!');
    }

}