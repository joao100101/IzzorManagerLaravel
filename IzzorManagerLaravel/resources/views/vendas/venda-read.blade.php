@extends('layouts.main')

@section('title', 'Vendas')
@section('head')
    <link rel="stylesheet" href="/css/venda/vendas-read-new.css">



@endsection
@section('content')
    <div class="container">
        <div class="table-area">
            <a class="btn btn-primary btn-sm" id="btn-criar" href="vendas/create" role="button">
                CADASTRAR VENDA
            </a>
            <table class="tabela-vendas">
                <tr id="table-header">
                    {{-- // id
                    // cliente
                    // data
                    // totaltaxas
                    // soma_custo_itens_vendidos
                    // soma_valor_venda_itens
                    // valor_frete
                    // total --}}
                    <th>ID</th>
                    <th>CLIENTE</th>
                    <th>DATA</th>
                    <th>PLATAFORMA</th>
                    <th>QUANTIDADE DE ITENS</th>
                    <th>TOTAL TAXAS</th>
                    <th>CUSTO TOTAL</th>
                    <th>VALOR VENDA</th>
                    <th>VALOR FRETE</th>
                    <th>TOTAL</th>
                    <th>AÇÕES</th>
                </tr>

                @foreach ($vendas as $v)
                    <tr>
                        <td class="default-column-value" id="venda-id">{{ $v->id }}</td>
                        <td class="default-column-value">{{ $v->cliente }}</td>
                        <td class="default-column-value" id="venda-data">{{ date_format(date_create($v->data), 'd/m/Y') }}</td>
                        <td class="default-column-value" id="venda-plataforma">{{ $plataformas[$v->id] }}</td>
                        <td class="default-column-value" id="quantidade">{{ $itens_vendidos[$v->id] }}</td>
                        <td class="default-column-value">R$ {{ $v->total_taxas }}</td>
                        <td class="default-column-value">R$ {{ $v->custos_totais }}</td>
                        <td class="default-column-value">R$ {{ $v->total_venda }}</td>
                        <td class="default-column-value">R$ {{ $v->valor_frete }}</td>
                        <td class="default-column-value">R$ {{ $v->total }}</td>
                        <td class="default-column-value actions">
                            <a href="/venda/{{ $v->id }}" class="action-link">
                                <ion-icon name="eye-outline"></ion-icon>
                            </a>
                            <a href="/venda/edit/{{ $v->id }}" class="action-link">
                                <ion-icon name="create-outline"></ion-icon>
                            </a>
                            <a class="action-link" data-bs-toggle="modal" data-bs-target="#modal-{{ $v->id }}">
                                <ion-icon name="trash-outline"></ion-icon>
                                @include('vendas/venda-delete')
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endsection
