@extends('layouts.main')

@section('title', 'Criando Categorias')

@section('head')
    <link rel="stylesheet" type="text/css" href="/css/categoria/categoria-create.css" />
@endsection

@section('content')
    <div id="category-create-container" class="col-md-6 offset-md-3">
        <h1>Criar Categoria</h1>
        <form action="/categoria" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title" class="form-label">TÍTULO</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome da categoria">
            </div>
            <div class="form-group">
                <label for="image" class="form-label">IMAGEM</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" />
            </div>
            <div class="form-group">
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
