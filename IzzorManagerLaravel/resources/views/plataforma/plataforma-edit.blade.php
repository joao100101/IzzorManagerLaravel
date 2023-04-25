@extends('layouts.main')

@section('title', 'Editando Plataforma')

@section('head')
    <link rel="stylesheet" type="text/css" href="/css/plataforma/plataforma-create.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script src="/js/jquery.maskMoney.min.js" type="text/javascript"></script>
    <script src="/js/currencyMaskConfig.js"></script>
@endsection

@section('content')
    <div id="plataforma-create-container" class="col-md-6 offset-md-3">
        <h1>Editar Plataforma</h1>
        <form action="/plataforma/update/{{ $plataforma->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nome" class="form-label">NOME</label>
                <input type="text" class="form-control w-100" id="nome" name="nome"
                    placeholder="Nome da plataforma" value="{{ $plataforma->nome }}">
            </div>
            <div class="form-group">
                <label for="valor_frete" class="form-label">VALOR FRETE</label>
                <input type="text" class="form-control currency" name="valor_frete"
                    value="R$ {{ $plataforma->valor_frete }}">
            </div>
            <div class="form-group">
                <label for="taxas_fixas" class="form-label">TAXAS FIXAS</label>
                <input type="text" class="form-control currency" name="taxas_fixas"
                    value="R$ {{ $plataforma->taxas_fixas }}">
            </div>
            <div class="form-group">
                <label for="taxas_porcentagem" class="form-label">TAXAS PORCENTAGEM</label>
                <input type="number" class="form-control" name="taxas_porcentagem"
                    value="{{ $plataforma->taxas_porcentagem }}">
            </div>
            <input type="submit" class="btn btn-primary btn-create" value="Atualizar plataforma">
            <a href="/plataforma">
                <input type="button" class="btn btn-primary bnt-cancel" value="Cancelar">
            </a>
        </form>
    </div>
@endsection