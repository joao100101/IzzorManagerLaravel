@extends('layouts.main')

@section('title', 'Categorias')

<link rel="stylesheet" href="./css/categoria/categoria-read.css">
@section('content')
    <h1 class="titulo">Exibindo Categorias</h1>
    <div class="table-area">
        <table class="tabela-categorias">
            <tr>
                <th>NOME</th>
                <th>PRODUTOS</th>
                <th>AÇÕES</th>
            </tr>
            <tr>
                <td>Teste</td>
                <td>teste2</td>
                <td>teste3</td>
            </tr>
        </table>
    </div>
@endsection
