<head>
    <link rel="stylesheet" href="/css/layouts/modal.css">
</head>

<div class="modal fade" id="modal-add-prod" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalLabel-add-prod">Adicionar Produto</h1>
            </div>
            <div class="modal-body">
                <form id="form-add-prod" name="form-add-prod" action="/venda/create" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="categoria_id" class="form-label">CATEGORIA</label>
                        <select class="form-select" name="categoria_id" id="categoria"
                            aria-label="Selecionar Categoria">
                            <option value="-1">ESCOLHA UMA CATEGORIA</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="produtos" class="form-label">PRODUTO</label>
                        <select class="form-select" name="produto" id="produto" aria-label="Selecionar Produto">
                            <option value="-1">ESCOLHA UM PRODUTO</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tamanho" class="form-label">TAMANHO</label>
                        <select class="form-select" name="tamanho" id="tamanho" aria-label="Selecionar Tamanho">
                            <option value="-1">ESCOLHA UM TAMANHO</option>
                            <option value="1">XGG</option>
                            <option value="2">GG</option>
                            <option value="3">G</option>
                            <option value="4">M</option>
                            <option value="5">P</option>
                            <option value="6">PP</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cor" class="form-label">COR</label>
                        <select class="form-select" name="cor" id="cor" aria-label="Selecionar Cor">
                            <option value="-1">ESCOLHA UMA COR</option>
                            <option value="1">PRETO</option>
                            <option value="2">BRANCO</option>
                            <option value="3">MARINHO</option>
                            <option value="4">MESCLA</option>
                            <option value="5">VERMELHO</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantidade" class="form-label">QUANTIDADE</label>
                        <input type="number" name="quantidade" class="form-control" id="quantidade">
                    </div>
                </form>
            </div>
            <div class="modal-footer">

                <button type="button" id="adicionar" class="btn btn-primary btn-modal">
                    ADICIONAR
                </button>
                <button type="button" class="btn btn-secondary btn-modal" id="cancelar"
                    data-bs-dismiss="modal">CANCELAR</button>
            </div>
        </div>
    </div>
</div>

<script src="/js/venda/cart-add.js"></script>


<script>
    var btnAdd = document.getElementById("adicionar")






    function adicionarObjeto() {
        var categoria = document.getElementById("categoria");
        var produto = document.getElementById("produto");
        var tamanho = document.getElementById("tamanho");
        var cor = document.getElementById("cor");
        var quantidade = document.getElementById("quantidade");

        // Acesse os valores dos campos
        var valorCategoria = categoria.options[categoria.selectedIndex].text;
        var valorProduto = produto.options[produto.selectedIndex].text;
        var valorTamanho = tamanho.options[tamanho.selectedIndex].text;
        var valorCor = cor.options[cor.selectedIndex].text;
        var valorQuantidade = quantidade.value;
        var produto = {
            categoria: valorCategoria,
            produto: valorProduto,
            tamanho: valorTamanho,
            cor: valorCor,
            quantidade: valorQuantidade
        }
        console.log(produto)
        // Recupera a lista de objetos do sessionStorage
        if ((produto.categoria != "ESCOLHA UMA CATEGORIA") && (produto.produto != "ESCOLHA UM PRODUTO") && (produto
                .tamanho != "ESCOLHA UM TAMANHO") && (produto.cor != "ESCOLHA UMA COR") && (produto.quantidade > 0)) {



            var table = document.getElementById("carrinhocliente");

            var row = document.createElement("tr");
            table.appendChild(row);
            var categoria = document.createElement("td");
            var produtocell = document.createElement("td");
            var tamanho = document.createElement("td");
            var cor = document.createElement("td");
            var quantidade = document.createElement("td");
            var acoes = document.createElement("td");

            categoria.innerHTML = produto.categoria
            produtocell.innerHTML = produto.produto
            tamanho.innerHTML = produto.tamanho
            cor.innerHTML = produto.cor
            quantidade.innerHTML = produto.quantidade
            acoes.innerHTML = `
            <a href="" class="action-link">
                <ion-icon name="eye-outline"></ion-icon>
            </a>
            <a href="" class="action-link">
                <ion-icon name="create-outline"></ion-icon>
            </a>
            <a class="action-link">
                <ion-icon name="trash-outline"></ion-icon>
            </a>`

            row.appendChild(categoria);
            row.appendChild(produtocell);
            row.appendChild(tamanho);
            row.appendChild(cor);
            row.appendChild(quantidade);
            row.appendChild(acoes);

        } else {
            console.log("Escolha as opçoes validas.")
        }
    }
    btnAdd.addEventListener('click', adicionarObjeto);

    function exibirListaObjetos() {
        // Recupera a lista de objetos do sessionStorage
        var listaObjetos = JSON.parse(sessionStorage.getItem('listaObjetos')) || [];

        // Exibe a lista de objetos
        listaObjetos.forEach(function(objeto) {
            console.log(objeto);
        });
    }

    function atualizarObjeto(indice, novoObjeto) {
        // Recupera a lista de objetos do sessionStorage
        var listaObjetos = JSON.parse(sessionStorage.getItem('listaObjetos')) || [];

        // Atualiza o objeto na posição do índice fornecido
        if (indice >= 0 && indice < listaObjetos.length) {
            listaObjetos[indice] = novoObjeto;
        }

        // Armazena a lista atualizada no sessionStorage
        sessionStorage.setItem('listaObjetos', JSON.stringify(listaObjetos));
    }

    function excluirObjeto(indice) {
        // Recupera a lista de objetos do sessionStorage
        var listaObjetos = JSON.parse(sessionStorage.getItem('listaObjetos')) || [];

        // Remove o objeto na posição do índice fornecido
        if (indice >= 0 && indice < listaObjetos.length) {
            listaObjetos.splice(indice, 1);
        }

        // Armazena a lista atualizada no sessionStorage
        sessionStorage.setItem('listaObjetos', JSON.stringify(listaObjetos));
    }
</script>
