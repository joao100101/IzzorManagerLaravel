@extends('layouts.main')

@section('title', 'Produtos')
@section('head')
    <link rel="stylesheet" href="/css/produto/produto-read.css">
@endsection

@section('content')
<p class="sem-produtos">Ainda não existem produtos criados. <a href="/produtos/create">Clique Aqui</a> para criar um novo.</p>
    <div class="container">
        @if (count($produtos) == 0)

        @endif
    </div>
@endsection
