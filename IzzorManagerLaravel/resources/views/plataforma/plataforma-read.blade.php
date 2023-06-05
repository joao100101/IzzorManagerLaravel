@extends('layouts.main')

@section('title', 'Plataformas')

@section('head')
    <link rel="stylesheet" href="/css/layouts/tabela.css">
@endsection
@section('content')
    @if (count($plataformas) > 0)
        <div class="container">
            <div class="table-area">
                <a class="btn btn-primary btn-sm" id="btn-criar" href="plataforma/create" role="button">
                    CRIAR NOVA
                </a>
                <table class="tabela-padrao">
                    <tr id="table-header">
                        <th>NOME</th>
                        <th>TAXAS FIXAS</th>
                        <th>TAXAS PERCENTUAL</th>
                        <th>AÇÕES</th>
                    </tr>

                    @foreach ($plataformas as $plat)
                        <tr>
                            <td class="default-column-value prod-title">{{ $plat->nome }}</td>
                            <td class="default-column-value">R$ {{ $plat->taxas_fixas }}</td>
                            <td class="default-column-value">{{ $plat->taxas_porcentagem }}%</td>
                            <td class="default-column-value actions">
                                <a href="/plataforma/edit/{{ $plat->id }}" class="action-link">
                                    <ion-icon name="create-outline"></ion-icon>
                                </a>
                                <a data-bs-toggle="modal" class="action-link" data-bs-target="#modal-{{ $plat->id }}">
                                    <ion-icon name="trash-outline"></ion-icon>
                                    @include('plataforma/plataforma-delete')
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="d-flex justify-content-center paginator">
                {{ $plataformas->links() }}
            </div>
        @else
            <p class="sem-plataforma">Não há plataforma criadas, <a href="plataforma/create">
                    CLIQUE AQUI
                </a> para criar uma nova.</p>
    @endif
    </div>
@endsection
