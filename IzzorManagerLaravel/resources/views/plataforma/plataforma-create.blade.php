@extends('layouts.main')

@section('title', 'Criando plataformas')

@section('head')
    <link rel="stylesheet" type="text/css" href="/css/plataforma/plataforma-create.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script src="/js/jquery.maskMoney.min.js" type="text/javascript"></script>
    <script src="/js/currencyMaskConfig.js"></script>
@endsection

@section('content')
    <div id="plataforma-create-container" class="col-md-6 offset-md-3">
        <h1>Criar plataforma</h1>
        <form action="/plataforma/create" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="form-group">
                <label for="nome" class="form-label">NOME</label>
                <input type="text" class="form-control w-100" id="nome" name="nome"
                    placeholder="Nome da plataforma">
            </div>
            <div class="form-group">
                <label for="taxas_fixas" class="form-label">TAXAS FIXAS</label>
                <input type="text" class="form-control currency" name="taxas_fixas">
            </div>
            <div class="form-group">
                <label for="taxas_porcentagem" class="form-label">TAXAS PORCENTAGEM</label>
                <input type="number" class="form-control" name="taxas_porcentagem">
            </div>

            <input type="submit" class="btn btn-primary btn-create" value="Criar plataforma">
            <a href="/plataforma">
                <input type="button" class="btn btn-primary bnt-cancel" value="Cancelar">
            </a>
        </form>
    </div>
@endsection

