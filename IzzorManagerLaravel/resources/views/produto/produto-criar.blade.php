@extends('layouts.main')

@section('title', 'Criando Produto')

@section('head')
    <link rel="stylesheet" type="text/css" href="/css/produto/produto-create.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script src="/js/jquery.maskMoney.min.js" type="text/javascript"></script>
@endsection

@section('content')
    @include('/plataforma/plataforma-create')
    <div id="produto-create-container" class="col-md-6 offset-md-3">
        <h1>Criar Produto</h1>
        <form action="/produto/create" method="POST" enctype="multipart/form-data">
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
                <label for="categoria_id" class="form-label">CATEGORIA</label>
                <select class="form-select" name="categoria_id" id="categoria" aria-label="Selecionar Produto">
                    @foreach ($categories as $cat)
                        <option name="{{$cat->id}}" id="{{$cat->id}}" value="{{ $cat->id }}">{{ $cat->titulo }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="plataforma_id" class="form-label">PLATAFORMA DE VENDA</label>
                <select class="form-select" name="plataforma_id" id="select-plataforma" aria-label="PLATAFORMA DE VENDA">
                    <option value="vazia"></option>
                    @foreach ($plataformas as $plat)
                        <option name="{{$plat->id}}" id="{{$plat->id}}" value="{{ $plat->id }}">{{ $plat->nome }}</option>
                    @endforeach
                    <option value="criar">CRIAR NOVA...</option>
                </select>
            </div>
            <div class="form-group">
                <label for="custo_peca" class="form-label">CUSTO DE FABRICAÇÃO</label>
                <input type="text" class="form-control currency" name="custo_peca">
            </div>
            <div class="form-group">
                <label for="valor_peca" class="form-label">VALOR DE VENDA</label>
                <input type="text" class="form-control currency" name="valor_peca">
            </div>


            <input type="submit" class="btn btn-primary btn-create" value="Criar Produto">
            <a href="/produtos">
                <input type="button" class="btn btn-primary bnt-cancel" value="Cancelar">
            </a>
        </form>
    </div>
    <script>
        var select = document.querySelector("#select-plataforma");
        $('.modal').on('hidden.bs.modal', function() {
            select.selectedIndex = -1;
        })

        $(document).ready(function() { //Make script DOM ready
            $('select').change(function() { //jQuery Change Function
                var opval = $(this).val(); //Get value from select element
                if (opval == "criar") { //Compare it and if true
                    $('#modal1').modal("show"); //Open Modal
                }
            });
        })
        $(function() {
            $('.currency').maskMoney({
                prefix: 'R$ ',
                allowNegative: true,
                thousands: '.',
                decimal: ',',
                affixesStay: true
            });
        })
    </script>
@endsection
