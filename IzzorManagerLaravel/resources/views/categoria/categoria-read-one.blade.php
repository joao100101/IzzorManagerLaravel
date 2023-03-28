@extends('layouts.main')

@section('title', 'Categoria ' . $category->titulo)

@section('head')
    <link rel="stylesheet" href="/css/categoria/categoria-read-one.css">
@endsection
@section('content')
    <div class="container">
        <a class="btn btn-primary btn-sm" id="btn-voltar" href="/" role="button">
            VOLTAR
        </a>
        <div class="conteudo">
            <div class="control-area">
                <div class="image-area">
                    <img src="/img/categories/{{ $category->imagem }}" alt="Imagem Da Categoria">
                </div>
                <div class="buttons">
                    <a class="btn btn-primary btn-sm" id="btn-voltar" href="/categoria/edit/{{ $category->id }}"
                        role="button">
                        EDITAR
                    </a>
                    <a class="btn btn-primary btn-sm" id="btn-voltar" href="/" role="button">
                        PRODUTOS
                    </a>
                </div>
            </div>
            <div class="description-area">
                <h1>{{ $category->titulo }}</h1>
                <p>{{ $category->descricao }}</p>
            </div>
        </div>
    </div>

@endsection
