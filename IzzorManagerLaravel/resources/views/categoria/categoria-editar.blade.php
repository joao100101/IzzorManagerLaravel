@extends('layouts.main')

@section('title', 'Editando Categoria')

@section('head')
<link rel="stylesheet" type="text/css" href="/css/categoria/categoria-create.css" />
@endsection

@section('content')
    <div id="category-create-container" class="col-md-6 offset-md-3">
        <h1>Editar Categoria</h1>
        <form action="/category" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title" class="form-label">TÍTULO</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome da categoria">
                <label for="imagem" class="form-label">IMAGEM</label>
                <input type="file" class="form-control" name="imagem" accept="image/*"/>
                <label for="desc" class="form-label">DESCRIÇÃO</label>
                <textarea class="form-control" id="desc" name="desc" placeholder="Descrição da categoria"></textarea>
            </div>
            <input type="submit" class="btn btn-primary btn-create" value="Criar Categoria">
            <a href="/">
                <input type="button" class="btn btn-primary bnt-cancel" value="Cancelar">
            </a>
        </form>
    </div>
@endsection
