@extends('layouts.main')

@section('title', 'Categorias')

@section('head')
    <link rel="stylesheet" href="./css/categoria/categoria-read.css">
@endsection
@section('content')
    @if (count($categories) > 0)
        <h1 class="titulo">Exibindo Categorias</h1>
        <div class="container">
            <div class="table-area">
                <a class="btn btn-primary btn-sm" id="btn-criar" href="categoria/create" role="button">
                    <p id="btn-text">CRIAR NOVA</p>
                </a>
                <table class="tabela-categorias">
                    <tr>
                        <th>NOME</th>
                        <th>DESCRIÇÃO</th>
                        <th>AÇÕES</th>
                    </tr>

                    @foreach ($categories as $cat)
                        <tr>
                            <td>{{ $cat->titulo }}</td>
                            <td class="description">{{ $cat->descricao }}</td>
                            <td class="actions">
                                <a href="/categoria/{{$cat->id}}" class="action-link">
                                    <ion-icon name="eye-outline"></ion-icon>
                                </a>
                                <a href="#" class="action-link">
                                    <ion-icon name="create-outline"></ion-icon>
                                </a>
                                <a href="#" class="action-link">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="d-flex justify-content-center paginator">
                {{ $categories->links() }}
            </div>
        @else
            <p>Não há categorias criadas, deseja criar uma nova?</p>
            <a class="btn btn-primary btn-sm" id="btn-criar" href="categoria/create" role="button">
                <p id="btn-text">CRIAR NOVA</p>
            </a>
    @endif
    </div>
@endsection
