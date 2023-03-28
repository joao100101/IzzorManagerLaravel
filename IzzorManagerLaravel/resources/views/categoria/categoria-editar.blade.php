@extends('layouts.main')

@section('title', 'Editando Categoria')

@section('head')
    <link rel="stylesheet" type="text/css" href="/css/categoria/categoria-create.css" />
@endsection

@section('content')
    <div id="category-create-container" class="col-md-6 offset-md-3">
        <h1>Editar Categoria</h1>
        <form action="/categoria/update/{{$categoria->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="titulo" class="form-label">TÍTULO</label>
                <input type="text" class="form-control" id="title" name="titulo" placeholder="Nome da categoria" value="{{$categoria->titulo}}">
            </div>
            <div class="form-group">
                <label for="image" class="form-label">IMAGEM</label>
                <input type="file" class="form-control" id="image" name="imagem" accept="image/*" />
            </div>
            <div class="form-group">
                <label for="desc" class="form-label">DESCRIÇÃO</label>
                <textarea class="form-control" id="desc" name="descricao" placeholder="Descrição da categoria">{{$categoria->descricao}}</textarea>
            </div>
            <input type="submit" class="btn btn-primary btn-create" value="Atualizar Categoria">
            <a href="/">
                <input type="button" class="btn btn-primary bnt-cancel" value="Cancelar">
            </a>
        </form>
    </div>
@endsection
