<head>
    <link rel="stylesheet" href="/css/layouts/modal.css">
</head>

<div class="modal fade" id="modal-{{ $prod->id }}" tabindex="-1" aria-labelledby="modal-add-prodLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalLabel-{{ $prod->id }}">EXCLUSÃO</h1>
            </div>
            <div class="modal-body">
                <p class='col-12 modal-title text-center text-wrap'>Tem certeza que deseja excluir a produto
                    <u>{{ $prod->titulo }}</u>?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-modal" data-bs-dismiss="modal">CANCELAR</button>
                <form class="w-100" id="form" action="/produto/delete/{{ $prod->id }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" id="excluir" class="btn btn-danger btn-modal">
                        EXCLUIR
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    var btn = document.querySelector("#excluir");
    var form = document.querySelector("#form");

    function test() {
        form.submit();
    }

    btn.addEventListener('click', test)
</script>
