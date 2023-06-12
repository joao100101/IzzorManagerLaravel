@extends('layouts.main')

@section('title', 'Adicionando Venda')

@section('head')
    <link rel="stylesheet" type="text/css" href="/css/produto/produto-create.css" />
    <link rel="stylesheet" type="text/css" href="/css/venda/venda-create.css" />
    <link rel="stylesheet" type="text/css" href="/css/layouts/tabela.css" />
    <script src="/js/jquery.maskMoney.min.js" type="text/javascript"></script>
    <script src="/js/currencyMaskConfig.js"></script>
@endsection

@section('content')
    <div id="produto-create-container" class="col-md-6 offset-md-3">
        <h1>Adicionar Venda</h1>
        <form action="/venda/create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="idvenda" class="form-label">ID DA VENDA</label>
                <input type="text" class="form-control" id="idvenda" name="idvenda" placeholder="Ex: SHP1234">
            </div>
            <div class="form-group">
                <label for="plataforma" class="form-label">PLATAFORMA</label>
                <select class="form-select" name="plataforma" id="plataforma" aria-label="Selecionar plataforma">
                    <option value="-1">ESCOLHA UMA PLATAFORMA</option>
                </select>
            </div>
            <div class="form-group">
                <label for="cliente" class="form-label">CLIENTE</label>
                <input type="text" class="form-control" id="cliente" name="cliente" placeholder="Ex: José da Silva">
            </div>
            <div class="form-group">
                <label class="form-label">PRODUTOS</label>
                <div id="modalContainer"></div>

                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button type="button" class="btn btn-link" id="card-button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Carrinho do Cliente
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                @include('/vendas/cart-add-product')
                                <a class="btn btn-primary btn-sm" id="btn-criar" data-bs-toggle="modal"
                                    data-bs-target="#modal-add-prod" role="button">
                                    ADICIONAR PRODUTO
                                </a>
                                <div id="tabela-container">
                                    <table class="tabela-padrao" id="carrinhocliente">
                                        <tr id="table-header">
                                            <th>CATEGORIA</th>
                                            <th>PRODUTO</th>
                                            <th>COR</th>
                                            <th>TAMANHO</th>
                                            <th>QUANTIDADE</th>
                                            <th>AÇÕES</th>
                                        </tr>
                                        <tr>
                                            <td>Test</td>
                                            <td>Test</td>
                                            <td>Azul</td>
                                            <td>GG</td>
                                            <td>2</td>
                                            <td class="default-column-value actions">
                                                <a href="" class="action-link">
                                                    <ion-icon name="eye-outline"></ion-icon>
                                                </a>
                                                <a href="" class="action-link">
                                                    <ion-icon name="create-outline"></ion-icon>
                                                </a>
                                                <a class="action-link">
                                                    <ion-icon name="trash-outline"></ion-icon>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="observacoes" class="form-label">OBSERVAÇÕES</label>
                    <textarea class="form-control" id="observacoes" name="observacoes" placeholder="Observações..."></textarea>
                </div>
                <div class="form-group">
                    <label for="valor_frete" class="form-label">VALOR DO FRETE</label>
                    <input type="text" class="form-control currency" name="valor_frete">
                </div>
                <div class="form-group">
                    <label for="total" class="form-label">TOTAL</label>
                    <input type="text" class="form-control" name="total" value="R$ 0,00" readonly>
                </div>


                <input type="submit" class="btn btn-primary btn-create" value="Criar Produto">
                <a href="/vendas">
                    <input type="button" class="btn btn-primary bnt-cancel" value="Cancelar">
                </a>
        </form>
    </div>
@endsection
@section('script-area')
    <script src="/js/venda/venda-create.js"></script>
@endsection
