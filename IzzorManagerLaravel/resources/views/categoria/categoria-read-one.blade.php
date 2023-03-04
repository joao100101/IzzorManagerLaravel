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
            <a class="btn btn-primary btn-sm" id="btn-produtos" href="#" role="button">
                <ion-icon name="storefront-outline" size="small"></ion-icon>
                <p id="btn-text">PRODUTOS</p>
            </a>
            <a class="btn btn-primary btn-sm" id="btn-produtos" href="#" role="button">
                    <ion-icon name="create-outline" size="small"></ion-icon>
                    <p id="btn-text">EDITAR</p>
            </a>
        </div>
        <div class="desc-area">
        <h1>{{$category->titulo}}</h1>
            {{$category->descricao}}
        </div>
    </div>
</div>



@endsection