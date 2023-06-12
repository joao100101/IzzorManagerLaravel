



$(document).ready(() => {
    $('#categoria').on('change', function () {
        var valorSelecionado = $(this).val();
        $('#produto .opcao-valida').remove();
        if (valorSelecionado != -1) {
            $.ajax({
                url: `/api/categorias/${valorSelecionado}/produtos`,
                method: 'GET',
                success: function (response) {
                    // Manipular a resposta da busca e atualizar a view
                    var select = document.querySelector('select#produto');
                    for (var i = 0; i < response.length; i++) {
                        var item = document.createElement('option');
                        item.classList.add('opcao-valida')
                        item.value = response[i].id;
                        item.text = response[i].titulo;
                        select.appendChild(item);
                    }
                },
                error: function (error) {
                    console.error(error);
                }
            });
        }
    });
});

$(() => {
    $('button[id = "adicionar').click((e) => {
        e.preventDefault();

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
        var qtdText = qtd.value;

        item = { 'categoria': catText, 'produto': prodText, 'tamanho': tamText, 'cor': corText, 'quantidade': qtdText }
        produtos.push(item);
        console.log(produtos);
    });
});





$.ajax({
    url: "/api/categorias",
    method: 'GET',
    success: function (response) {
        // Manipular a resposta da busca e atualizar a view
        var select = document.querySelector('select#categoria');

        for (var i = 0; i < response.length; i++) {
            var item = document.createElement('option');
            item.value = response[i].id;
            item.text = response[i].titulo;
            select.appendChild(item);
        }
    },
    error: function (error) {
        console.error(error);
    }
});