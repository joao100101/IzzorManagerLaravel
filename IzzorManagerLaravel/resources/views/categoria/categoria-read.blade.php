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
                    CRIAR NOVA
                </a>
                <table class="tabela-categorias" border="1px">
                    <tr class="table-header">
                        <th class="miniatura">MINIATURA</th>
                        <th>NOME</th>
                        <th>DESCRIÇÃO</th>
                        <th>AÇÕES</th>
                    </tr>

                    @foreach ($categories as $cat)
                        <tr>
                            <td class="miniatura"><img src="./img/categories/{{$cat->imagem}}"></td>
                            <td class="cat-title">{{ $cat->titulo }}</td>
                            <td class="description">{{ $cat->descricao }}</td>
                            <td class="actions">
                                <a href="/categoria/{{ $cat->id }}" class="action-link">
                                    <ion-icon name="eye-outline"></ion-icon>
                                </a>
                                <a href="/categoria/edit/{{ $cat->id }}" class="action-link">
                                    <ion-icon name="create-outline"></ion-icon>
                                </a>
                                <a class='action-link' data-bs-toggle="modal" data-bs-target="#modal-{{ $cat->id }}">
                                    <ion-icon name="trash-outline"></ion-icon>
                                    @include('categoria/categoria-delete')
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
            <p class="sem-categorias">Não há categorias criadas, <a href="categoria/create">
                    CLIQUE AQUI
                </a> para criar uma nova.</p>

    @endif
    </div>
@endsection
