@extends('layouts.main')

@section('title', 'Criando Produto')

@section('head')
    <link rel="stylesheet" type="text/css" href="/css/produto/produto-create.css" />
@endsection

@section('content')
    <div id="category-create-container" class="col-md-6 offset-md-3">
        <h1>Criar Produto</h1>
        asadsadsad
        sadassadsad
        asdassaddsasaddsa
        
        <form action="/categoria" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title" class="form-label">TÍTULO</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do produto">
            </div>
            <div class="form-group">
                <label for="image" class="form-label">IMAGEM</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" />
            </div>
            <div class="form-group">
                <label for="desc" class="form-label">DESCRIÇÃO</label>
                <textarea class="form-control" id="desc" name="desc" placeholder="Descrição da categoria"></textarea>
            </div>
            <div class="form-group">
                <label for="cat" class="form-label">CATEGORIA</label>
                <select class="form-select" name="cat" aria-label="Selecionar Categoria">
                    <option selected>Categorias</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>

            <input type="submit" class="btn btn-primary btn-create" value="Criar Categoria">
            <a href="/produtos">
                <input type="button" class="btn btn-primary bnt-cancel" value="Cancelar">
            </a>
        </form>
    </div>
@endsection
