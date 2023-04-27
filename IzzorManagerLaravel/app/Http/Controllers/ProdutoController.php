<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoController extends Controller
{
    //
    public function index()
    {
        $produtos = Produto::paginate(20);
        return view('produto/produto-read', ['produtos' => $produtos]);
    }

    public function findByCategory($id)
    {
        $produtos = Produto::where([
            ['categoria_id', 'like', '%' . $id . '%']
        ])->get();

        return view('produto/produto-read', ['produtos' => $produtos]);
    }

    public function readOne($id){

        $produto = Produto::findOrFail($id);

        return view('produto/produto-read-one', ['produto' => $produto]);
    }

    public function create()
    {
        $categories = Categoria::all();
        return view('produto/produto-criar', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        if ($request->titulo == null || $request->descricao == null || $request->categoria_id == null ||$request->categoria_id == -1) {
            return redirect('/produto/create')->with('msg-error', 'Produto inválido, verifique se os campos foram preenchidos corretamente.');
        }
        if (strlen($request->titulo) > 100) {
            return redirect('/produto/create')->with('msg-error', 'Produto excede o limite de tamanho do titulo!');
        }
        if (strlen($request->descricao) > 400) {
            return redirect('/produto/create')->with('msg-error', 'Produto excede o limite de tamanho da descrição!');
        }

        $produto = new Produto;



        $valor_venda = $request->valor_venda;
        $valor_venda = str_replace("R$ ", "", $valor_venda); // remove "R$ "
        $valor_venda = str_replace(".", "", $valor_venda);
        $valor_venda = str_replace(",", ".", $valor_venda); // substitui "," por "."
        $valor_venda = floatval($valor_venda); // converte para double

        $custo_peca = $request->custo_peca;
        $custo_peca = str_replace("R$ ", "", $custo_peca); // remove "R$ "
        $custo_peca = str_replace(".", "", $custo_peca);
        $custo_peca = str_replace(",", ".", $custo_peca); // substitui "," por "."
        $custo_peca = floatval($custo_peca); // converte para double




        $produto->titulo = $request->titulo;
        $produto->descricao = $request->descricao;
        $produto->categoria_id = $request->categoria_id;
        $produto->custo_peca = $custo_peca;
        $produto->valor_venda = $valor_venda;

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


    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        $categoria = Categoria::findOrFail($produto->categoria_id);
        $categories = Categoria::all();


        $valor_venda = $produto->valor_venda;
        $valor_venda = str_replace(".", ",", $valor_venda);

        $custo_peca = $produto->custo_peca; 
        $custo_peca = str_replace(".", ",", $custo_peca);

        $produto->valor_venda = $valor_venda;
        $produto->custo_peca = $custo_peca;

        return view('produto/produto-edit', ['produto' => $produto, 'categoria' => $categoria, 'categories' => $categories]);

    }

    public function update(Request $request)
    {
        if ($request->titulo == null || $request->descricao == null || $request->categoria_id == null) {
            return redirect('/produto/edit/' . $request->id)->with('msg-error', 'Produto inválido, verifique se os campos foram preenchidos corretamente.');
        }
        if (strlen($request->titulo) > 100) {
            return redirect('/produto/edit/' . $request->id)->with('msg-error', 'Produto excede o limite de tamanho do titulo!');
        }
        if (strlen($request->descricao) > 400) {
            return redirect('/produto/edit/' . $request->id)->with('msg-error', 'Produto excede o limite de tamanho da descrição!');
        }

        $produto = Produto::findOrFail($request->id);
        $data = $request->all();



        $valor_venda = $request->valor_venda;
        $valor_venda = str_replace("R$ ", "", $valor_venda); // remove "R$ "
        $valor_venda = str_replace(".", "", $valor_venda);
        $valor_venda = str_replace(",", ".", $valor_venda); // substitui "," por "."
        $valor_venda = floatval($valor_venda); // converte para double

        $custo_peca = $request->custo_peca;
        $custo_peca = str_replace("R$ ", "", $custo_peca); // remove "R$ "
        $custo_peca = str_replace(".", "", $custo_peca);
        $custo_peca = str_replace(",", ".", $custo_peca); // substitui "," por "."
        $custo_peca = floatval($custo_peca); // converte para double

        $data['custo_peca'] = $custo_peca;
        $data['valor_venda'] = $valor_venda;

        if($produto->imagem != 'sem-foto.png'){
            File::delete('/img/products/' . $produto->imagem);
        }

        // Image Upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->imagem;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/products'), $imageName);

            $data['imagem'] = $imageName;
        } else {
            $data['imagem'] = 'sem-foto.png';
        }

        Produto::findOrFail($request->id)->update($data);


        return redirect('/produtos')->with('msg', 'Produto editado com sucesso!');
    }

    public function destroy($id){
        $produto = Produto::findOrFail($id);

        if($produto->imagem != 'sem-foto.png'){
            File::delete('/img/products/' . $produto->imagem);
        }
        Produto::findOrFail($id)->delete();

        return redirect('/produtos')->with('msg', 'Produto excluído com sucesso!');
    }
}