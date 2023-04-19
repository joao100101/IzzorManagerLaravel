<head>
    <link rel="stylesheet" href="/css/modal.css">
</head>

<div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="modal de criação" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalLabel">CRIAR PLATAFORMA</h1>
            </div>
            <div class="modal-body">
                <div id="produto-create-container" class="">
                    <h1>CRIAR PLATAFORMA</h1>
                    <form action="/plataforma/create" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nome" class="form-label">NOME</label>
                            <input type="text" class="form-control w-100" id="nome" name="nome"
                                placeholder="Nome da plataforma">
                        </div>
                        <div class="form-group">
                            <label for="valor_frete" class="form-label">VALOR FRETE</label>
                            <input type="text" class="form-control currency" name="valor_frete">
                        </div>
                        <div class="form-group">
                            <label for="taxas_fixas" class="form-label">TAXAS FIXAS</label>
                            <input type="text" class="form-control currency" name="taxas_fixas">
                        </div>
                        <div class="form-group">
                            <label for="taxas_porcentagem" class="form-label">TAXAS PORCENTAGEM</label>
                            <input type="number" class="form-control" name="taxas_porcentagem">
                        </div>


                </div>



            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary btn-create w-100"  id="criar" value="Criar Plataforma">
                <button type="button" class="btn btn-secondary btn-modal" data-bs-dismiss="modal">CANCELAR</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    var btn = document.querySelector("#criar");
    var form = document.querySelector("#form");

    

    function test() {
        form.submit();
    }



    btn.addEventListener('click', test)
</script>
