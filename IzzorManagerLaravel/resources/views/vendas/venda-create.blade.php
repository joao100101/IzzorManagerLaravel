@extends('layouts.main')

@section('title', 'Adicionando Venda')

@section('head')
    <link rel="stylesheet" type="text/css" href="/css/produto/produto-create.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script src="/js/jquery.maskMoney.min.js" type="text/javascript"></script>
    <script src="/js/currencyMaskConfig.js"></script><script src="/js/currencyMaskConfig.js"></script>
    
@endsection

@section('content')
    <div id="produto-create-container" class="col-md-6 offset-md-3">
        <h1>Adicionar Venda</h1>
        <form action="/venda/create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="titulo" class="form-label">TÍTULO</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nome do produto">
            </div>
            <div class="form-group">
                <label for="imagem" class="form-label">IMAGEM</label>
                <input type="file" class="form-control" id="imagem" name="imagem" accept="image/*" />
            </div>
            <div class="form-group">
                <label for="descricao" class="form-label">DESCRIÇÃO</label>
                <textarea class="form-control" id="descricao" name="descricao" placeholder="Descrição da produto"></textarea>
            </div>
            <div class="form-group">
                <label for="custo_peca" class="form-label">CUSTO DE FABRICAÇÃO</label>
                <input type="text" class="form-control currency" name="custo_peca">
            </div>
            <div class="form-group">
                <label for="valor_venda" class="form-label">VALOR DE VENDA</label>
                <input type="text" class="form-control currency" name="valor_venda">
            </div>


            <input type="submit" class="btn btn-primary btn-create" value="Criar Produto">
            <a href="/produtos">
                <input type="button" class="btn btn-primary bnt-cancel" value="Cancelar">
            </a>
        </form>
    </div>
@endsection