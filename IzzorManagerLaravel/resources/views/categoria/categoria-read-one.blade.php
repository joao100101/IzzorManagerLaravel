@extends('layouts.main')

@section('title', 'Categoria ' . $category->titulo)

@section('head')
<link rel="stylesheet" href="/css/categoria/categoria-read-one.css">
@endsection
@section('content')

<a class="btn btn-primary btn-sm" id="btn-voltar" href="/" role="button">
    <p id="btn-text">VOLTAR</p>
</a>
<div class="container">
    <div class="area-categoria">
        <div class="image-area">
            <img src="/img/categories/{{$category->imagem}}" alt="Imagem da Categoria" class="cat-img">
        </div>
        <h1>{{$category->titulo}}</h1>
        <div class="desc-area">
            {{$category->descricao}}
        </div>
    </div>
</div>



@endsection