@extends('layouts.main')

@section('title', 'Categorias')

@section('head')
    <link rel="stylesheet" href="./css/categoria/categoria-read.css">
@endsection
@section('content')
    <h1 class="titulo">Exibindo Categorias</h1>
    <div class="table-area">
        <a class="btn btn-primary btn-sm" id="btn-criar" href="categoria/create" role="button">
            <p id="btn-text">CRIAR NOVA</p>
        </a>
        <table class="tabela-categorias">
            <tr>
                <th>NOME</th>
                <th>PRODUTOS</th>
                <th>AÇÕES</th>
            </tr>

            @foreach ($categories as $cat)
                <tr>
                    <td>{{$cat->titulo}}</td>
                    <td>{{$cat->descricao}}</td>
                    <td class="actions">
                        <ion-icon name="eye-outline"></ion-icon>
                        <ion-icon name="create-outline"></ion-icon>
                        <ion-icon name="trash-outline"></ion-icon>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
