@extends('main')

@section('title', 'Categorias')

@section('content')
    <a href="#" class="link-voltar">
        <ion-icon name="arrow-back-outline" class="icone-voltar"></ion-icon>
    </a>
    <h1>Exibindo Categorias</h1>
    <table class="tabela-categorias">
        <tr>
            <th>NOME</th>
            <th>PRODUTOS</th>
            <th>AÇÕES</th>
        </tr>
    </table>
@endsection
