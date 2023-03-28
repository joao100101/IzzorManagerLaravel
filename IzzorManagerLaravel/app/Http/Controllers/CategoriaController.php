<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    //
    public function index()
    {
        $category = Categoria::paginate(5);
        return view('categoria/categoria-read', ['categories' => $category]);
    }

    public function view($id)
    {
        $category = Categoria::findOrFail($id);
        if ($category->imagem == '') {
            $category->imagem = 'sem-foto.png';
        }
        return view('categoria/categoria-read-one', ['category' => $category]);
    }

    public function create()
    {
        return view('categoria/categoria-create');
    }

    public function edit($id)
    {

        $categoria = Categoria::findOrFail($id);
        return view('categoria/categoria-editar', ['categoria' => $categoria]);
    }



    public function store(Request $request)
    {
        if ($request->title == null || $request->desc == null) {
            return redirect('/categoria/create')->with('msg-error', 'Categoria inválida, verifique se os campos foram preenchidos corretamente.');
        }
        if (strlen($request->title) > 40) {
            return redirect('/categoria/create')->with('msg-error', 'Categoria excede o limite de tamanho do titulo!');
        }
        if (strlen($request->desc) > 200) {
            return redirect('/categoria/create')->with('msg-error', 'Categoria excede o limite de tamanho da descrição!');
        }

        $category = new Categoria;

        $category->titulo = $request->title;
        $category->descricao = $request->desc;

        // Image Upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/categories'), $imageName);

            $category->imagem = $imageName;
        } else {
            $category->imagem = 'sem-foto.png';
        }


        $category->save();
        return redirect('/')->with('msg', 'Categoria criada com sucesso!');
    }




    // TESTE DE UPDATE
    public function updateto(Request $request){
        $novo = $request->all();
        $atual = Categoria::findOrFail($request->id);

        $atual->update($novo);
        return redirect('/')->with('msg', 'Categoria editada com sucesso no debug!');
    }

    public function update(Request $request)
    {
        
        
        $data = $request->all();
        if ($request->titulo == null || $request->descricao == null) {
            return redirect('/categoria/edit/'. $request->id)->with('msg-error', 'Categoria inválida, verifique se os campos foram preenchidos corretamente.');
        }
        if (strlen($request->titulo) > 40) {
            return redirect('/categoria/edit/'. $request->id)->with('msg-error', 'Categoria excede o limite de tamanho do titulo!');
        }
        if (strlen($request->descricao) > 200) {
            return redirect('/categoria/edit/'. $request->id)->with('msg-error', 'Categoria excede o limite de tamanho da descrição!');
        }
        // Image Upload
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

            $requestImage = $request->imagem;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/categories'), $imageName);

            $data['imagem'] = $imageName;
        }

        Categoria::findOrFail($request->id)->update($data);
        
        return redirect('/')->with('msg', 'Categoria editada com sucesso!');
    }
}
