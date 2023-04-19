@extends('layouts.main')

@section('title', 'Produtos')

@section('head')
    <link rel="stylesheet" href="./css/produto/produto-read.css">
@endsection
@section('content')
    @if (count($produtos) > 0)
        <h1 class="titulo">Exibindo produtos</h1>
        <div class="container">
            <div class="table-area">
                <a class="btn btn-primary btn-sm" id="btn-criar" href="produtos/create" role="button">
                    CRIAR NOVO
                </a>
                <table class="tabela-produtos">
                {{-- id;imagem.titulo;descricao;categoria_id;custo_peca;valor_venda;plataforma_id --}}
                    <tr>
                        <th>NOME</th>
                        <th>DESCRIÇÃO</th>
                        <th>CATEGORIA</th>
                        <th>PLATAFORMA</th>
                        <th>CUSTO PRODUÇÃO</th>
                        <th>VALOR VENDA</th>
                        <th>AÇÕES</th>
                    </tr>

                    @foreach ($produtos as $prod)
                        <tr>
                            <td class="cat-title">{{ $prod->titulo }}</td>
                            <td class="description">{{ $prod->descricao }}</td>
                            <td class="categoria">{{ $prod->categoria->titulo}}</td>
                            <td class="plataforma">{{ $prod->plataforma->nome}}</td>
                            <td class="custo">R$ {{ $prod->custo_peca }}</td>
                            <td class="valor">R$ {{ $prod->valor_venda }}</td>
                            <td class="actions">
                                <a href="/produto/{{ $prod->id }}" class="action-link">
                                    <ion-icon name="eye-outline"></ion-icon>
                                </a>
                                <a href="/produto/edit/{{ $prod->id }}" class="action-link">
                                    <ion-icon name="create-outline"></ion-icon>
                                </a>
                                <a data-bs-toggle="modal" data-bs-target="#modal-{{ $prod->id }}">
                                    <ion-icon name="trash-outline"></ion-icon>
                                    @include('produto/produto-delete')
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="d-flex justify-content-center paginator">
                {{ $produtos->links() }}
            </div>
        @else
            <p class="sem-produtos">Não há produtos criadas, <a href="produto/create">
                    CLIQUE AQUI
                </a> para criar uma nova.</p>

    @endif
    </div>
@endsection
