<head>
    <link rel="stylesheet" href="/css/layouts/modal.css">
    <script>
        var btnAdd = document.getElementById("adicionar");
        var btnCancel = document.querySelector("#cancelar");
        var produtos = [];

        //Infos do form
        var categoria = document.getElementById("categoria");
        var catText = categoria.options[categoria.selectedIndex].text;

        var produto = document.getElementById("produto");
        var prodText = produto.options[produto.selectedIndex].text;

        var tamanho = document.getElementById("tamanho");
        var tamText = tamanho.options[tamanho.selectedIndex].text;

        var cor = document.getElementById("cor");
        var corText = cor.options[cor.selectedIndex].text;

        var qtd = document.getElementById("quantidade");
        var qtdText = qtd.options[qtd.selectedIndex].text;

        function submit() {
            alert('aaaaa')
            console.log(catText);
            console.log(prodText);
            console.log(tamText);
            console.log(corText);
            console.log(qtdText);
        }



        // Função para limpar os valores dos campos do formulário
        function cancel() {
            var selectElements = document.querySelectorAll('select');
            var inputElements = document.querySelectorAll('input[type="number"]');
            $('#produto .opcao-valida').remove();
            // Limpar campos de seleção
            selectElements.forEach(function(select) {
                select.value = '-1'; // Definir como o valor padrão
            });

            // Limpar campos de entrada de número
            inputElements.forEach(function(input) {
                input.value = ''; // Definir como em branco
            });
        }




        btnCancel.addEventListener('click', cancel);
        btnAdd.addEventListener('click', submit);
    </script>

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
    var btnAdd = document.querySelector("#adicionar");
    var btnCancel = document.querySelector("#cancelar");
    var produtos = [];

    //Infos do form
    var categoria = document.getElementById("categoria");
    var catText = categoria.options[categoria.selectedIndex].text;

    var produto = document.getElementById("produto");
    var prodText = produto.options[produto.selectedIndex].text;

    var tamanho = document.getElementById("tamanho");
    var tamText = tamanho.options[tamanho.selectedIndex].text;

    var cor = document.getElementById("cor");
    var corText = cor.options[cor.selectedIndex].text;

    var qtd = document.getElementById("quantidade");
    var qtdText = qtd.options[qtd.selectedIndex].text;

    function submit() {
        console.log(catText);
        console.log(prodText);
        console.log(tamText);
        console.log(corText);
        console.log(qtdText);
    }



    // Função para limpar os valores dos campos do formulário
    function cancel() {
        var selectElements = document.querySelectorAll('select');
        var inputElements = document.querySelectorAll('input[type="number"]');
        $('#produto .opcao-valida').remove();
        // Limpar campos de seleção
        selectElements.forEach(function(select) {
            select.value = '-1'; // Definir como o valor padrão
        });

        // Limpar campos de entrada de número
        inputElements.forEach(function(input) {
            input.value = ''; // Definir como em branco
        });
    }




    btnCancel.addEventListener('click', cancel);
    btnAdd.addEventListener('click', submit);
</script>
