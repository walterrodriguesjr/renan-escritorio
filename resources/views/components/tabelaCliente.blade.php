<style>
    #loadingSpinner {
        display: none;
    }

    input[disabled], select[disabled], textarea[disabled] {
    background-color: #e9ecef;
    cursor: not-allowed;
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
                    inserting: false,
                    editing: false,
                    sorting: true,
                    paging: true,
                    data: response,

                    pageSize: 5,
                    pageButtonCount: 50,

                    fields: [{
                            name: "nomeCliente",
                            title: "Nome",
                            type: "text",
                            width: 50,

                        },
                        {
                            name: "rgCliente",
                            title: "RG",
                            type: "text",
                            width: 25,
                        },
                        {
                            name: "cpfCliente",
                            title: "CPF",
                            type: "text",
                            width: 25,
                        },
                        {
                            name: "emailCliente",
                            title: "E-mail",
                            type: "text",
                            width: 50,
                        },
                        {
                            name: "celularCliente",
                            title: "Celular",
                            type: "text",
                            width: 25,
                        },
                        {
                            title: "Ações",
                            width: 30,
                            sorting: false,
                            filtering: false,
                            itemTemplate: function(value, item) {
                                var $iconVisualizar = $("<i>").attr({
                                    class: "fas fa-eye"
                                });
                                var $iconEditar = $("<i>").attr({
                                    class: "fas fa-edit"
                                });
                                var $iconDeletar = $("<i>").attr({
                                    class: "fas fa-trash"
                                });

                                var $visualizarButton = $("<button>").attr({
                                        class: "btn btn-sm btn-secondary ml-3",
                                        "data-bs-toggle": "modal",
                                        "data-bs-target": "#modalVisualizarCliente"
                                    })
                                    .click(function(e) {
                                      
                                        $.ajax({
                                            type: "GET",
                                            url: "/visualizarCliente/" + item.id,
                                            data: "data",
                                            dataType: "json",
                                            success: function(response) {
                                                $("#visualizarNomeCliente").val(response.nomeCliente);
                                                $("#visualizarEstadoRgCliente").val(response.estadoRgCliente);
                                                $("#visualizarRgCliente").val(response.rgCliente);
                                                $("#visualizarCpfCliente").val(response.cpfCliente);
                                                $("#visualizarEmailCliente").val(response.emailCliente);
                                                $("#visualizarCelularCliente").val(response.celularCliente);
                                                $("#visualizarTelefoneCliente").val(response.telefoneCliente);
                                                $("#visualizarEnderecoCliente").val(response.enderecoCliente);
                                                $("#visualizarNumeroCliente").val(response.numeroCliente);
                                                $("#visualizarComplementoCliente").val(response.complementoCliente);
                                                $("#visualizarEstadoCliente").val(response.estadoCliente);
                                                $("#visualizarCidadeCliente").val(response.cidadeCliente);
                                            }
                                        });

                                    }).append($iconVisualizar);

                                var $editarButton = $("<button>").attr({
                                        class: "btn btn-sm btn-success ml-2"
                                    })
                                    .click(function(e) {
                                        e.stopPropagation();
                                        console.log("Edit clicked for item:", item);
                                        // Aqui você pode chamar a função para editar o cliente
                                    }).append($iconEditar);

                                // botão de exclusão
                                var $deletarButton = $("<button>").attr({
                                        class: "btn btn-sm btn-danger ml-2"
                                    })
                                    .click(function(e) {
                                        e.stopPropagation();
                                        console.log("Delete clicked for item:", item);
                                        // Aqui você pode chamar a função para deletar o cliente
                                    }).append($iconDeletar);

                                return $("<div>").append($visualizarButton).append(
                                    $editarButton).append($deletarButton);
                            }
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
