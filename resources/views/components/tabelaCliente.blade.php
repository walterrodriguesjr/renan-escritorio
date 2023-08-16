<style>
    #loadingSpinner {
        display: none;
    }
</style>


<div id="loadingSpinner" class="text-center">
    <button class="btn btn-primary" type="button" disabled>
        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
        Carregando...
      </button>
</div>

{{-- onde todo o grid de Clientes é montado --}}
<div id="jsGridClientes"></div>

<script>
    /* função GET na tabela CLIENTES, carregada de fato em DocReady abaixo e importada em clientes.blade.php */
    function listarClientes() {
        $.ajax({
            type: "GET",
            url: "/listarClientes",
            data: "data",
            dataType: "json",
            success: function(response) {
                console.log(response);

                $("#loadingSpinner").hide();
                $("#jsGridClientes").show();

                $("#jsGridClientes").jsGrid({
                    width: "100%",
                    height: "400px",
                    inserting: true,
                    editing: true,
                    sorting: true,
                    paging: true,
                    data: response,

                    fields: [{
                            name: "nomeCliente",
                            title: "Nome",
                            type: "text",
                            width: 50,
                        },
                        {
                            name: "rgCliente",
                            title: "RG",
                            type: "number",
                            width: 50,
                        },

                        {
                            type: "control"
                        }
                    ]
                });
            }
        });
    }

    $(document).ready(function() {
        $("#loadingSpinner").show();
        $("#jsGridClientes").hide();

        /* carrega de fato a função acima de GET */
        listarClientes();
    });
</script>
