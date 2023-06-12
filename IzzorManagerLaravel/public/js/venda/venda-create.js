

$(document).ready(function () {
    $('#collapseOne').on('show.bs.collapse', function () {
        $('.collapse').addClass('show');
    });

    $('#collapseOne').on('hide.bs.collapse', function () {
        $('.collapse').removeClass('show');
    });
});


$(document).ready(() => {
    $('#plataforma .opcao-valida').remove();
    $.ajax({
        url: `/api/plataformas`,
        method: 'GET',
        success: function (response) {
            // Manipular a resposta da busca e atualizar a view
            var select = document.querySelector('select#plataforma');
            for (var i = 0; i < response.length; i++) {
                var item = document.createElement('option');
                item.classList.add('opcao-valida')
                item.value = response[i].id;
                item.text = response[i].nome;
                select.appendChild(item);
            }
        },
        error: function (error) {
            console.error(error);
        }
    });
});



document.getElementById("card-button").addEventListener("click", (event) => {
    event.preventDefault(true)
});