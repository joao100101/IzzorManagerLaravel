@extends('layouts.main')

@section('title', 'Produtos')

@section('head')
    <link rel="stylesheet" href="/css/produto/produto-read.css">
@endsection
@section('content')
    @if (count($produtos) > 0)
        <div class="container">
            <div class="table-area">
                <a class="btn btn-primary btn-sm" id="btn-criar" href="/produtos/create" role="button">
                    CRIAR NOVO
                </a>
                <table class="tabela-vendas">
                {{-- id;imagem.titulo;descricao;categoria_id;custo_peca;valor_venda;plataforma_id --}}
                    <tr id="table-header">
                        <th>MINIATURA</th>
                        <th>NOME</th>
                        <th>DESCRIÇÃO</th>
                        <th>CATEGORIA</th>
                        <th>CUSTO PRODUÇÃO</th>
                        <th>VALOR VENDA</th>
                        <th>LUCRO</th>
                        <th>AÇÕES</th>
                    </tr>

                    @foreach ($produtos as $prod)
                        <tr>
                            <td class="default-column-value miniatura"><img src="/img/products/{{$prod->imagem}}"></td>
                            <td class="prod-title">{{ $prod->titulo }}</td>
                            <td class="description">{{ $prod->descricao }}</td>
                            <td class="categoria">{{ $prod->categoria->titulo}}</td>
                            <td class="custo">R$ {{ $prod->custo_peca }}</td>
                            <td class="valor">R$ {{ $prod->valor_venda }}</td>
                            <td class="lucro">R$ {{$prod->valor_venda - $prod->custo_peca}}</td>
                            <td class="actions">
                                <a href="/produto/{{ $prod->id }}" class="action-link">
                                    <ion-icon name="eye-outline"></ion-icon>
                                </a>
                                <a href="/produto/edit/{{ $prod->id }}" class="action-link">
                                    <ion-icon name="create-outline"></ion-icon>
                                </a>
                                <a class="action-link" data-bs-toggle="modal" data-bs-target="#modal-{{ $prod->id }}">
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
