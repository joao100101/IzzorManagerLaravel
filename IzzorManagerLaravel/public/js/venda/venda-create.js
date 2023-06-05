$(document).ready(function() {
    $('#collapseOne').on('show.bs.collapse', function() {
        $('.collapse').addClass('show');
    });

    $('#collapseOne').on('hide.bs.collapse', function() {
        $('.collapse').removeClass('show');
    });
});


document.getElementById("card-button").addEventListener("click", (event) => {
    event.preventDefault(true)
});