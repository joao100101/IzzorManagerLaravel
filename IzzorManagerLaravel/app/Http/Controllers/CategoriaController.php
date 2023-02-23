<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    //
    public function index(){
        $category = Categoria::paginate(5);
        return view('categoria/categoria-read', ['categories' => $category]);
    }

    public function create(){
        return view('categoria/categoria-create');
    }

    public function edit($id){

        $categoria = Categoria::findOrFail($id);
        return view('categoria/categoria-editar', ['categoria' => $categoria]);
    }



    public function store(Request $request) {

        if(strlen($request->title) > 40){
            return redirect('/categoria/create')->with('msg-error', 'Categoria excede o limite de tamanho do titulo!');
        }
        if(strlen($request->desc) > 100){
            return redirect('/categoria/create')->with('msg-error', 'Categoria excede o limite de tamanho da descrição!');
        }

        $category = new Categoria;

        $category->titulo = $request->title;
        $category->descricao = $request->desc;

        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/categories'), $imageName);

            $category->imagem = $imageName;

        }else{
            $category->imagem = '';
        }


        $category->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');

    }

}
