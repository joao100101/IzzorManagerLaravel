@extends('layouts.main')

@section('title', 'Produto ' . $produto->titulo)

@section('head')
    <link rel="stylesheet" href="/css/categoria/categoria-read-one.css">
    <link rel="stylesheet" href="/css/produto/produto-read-one.css">
@endsection
@section('content')
    <div class="container">
        <a class="btn btn-primary btn-sm" id="btn-voltar" href="/produtos" role="button">
            VOLTAR
        </a>
        <div class="conteudo">
            <div class="control-area">
                <div class="image-area">
                    <img src="/img/products/{{ $produto->imagem }}" alt="Imagem Do Produto">
                </div>
                <div class="buttons">
                    <a class="btn btn-primary btn-sm" id="btn-voltar" href="/produto/edit/{{ $produto->id }}"
                        role="button">
                        EDITAR
                    </a>
                </div>
            </div>
            <div class="description-area">
                <h1>{{ $produto->titulo }}</h1>
                <p>{{ $produto->descricao }}</p>
                <span>
                    CUSTO <br><i class="fa-solid fa-dollar-sign" style="color: #ffffff;"></i> {{ $produto->custo_peca }}
                </span>
                <br>
                <br>
                <span>
                    VALOR <br><i class="fa-solid fa-dollar-sign" style="color: #ffffff;"></i> {{ $produto->valor_venda }}
                </span>
                <br>
                <br>
                <span>
                    LUCRO <br><i class="fa-solid fa-dollar-sign" style="color: #ffffff;"></i> {{ $produto->valor_venda - $produto->custo_peca }}
                </span>
            </div>
        </div>
    </div>

@endsection
