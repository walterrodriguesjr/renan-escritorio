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

                                        /* esta variável recebe as propriedades de um spinner */
                                        var spinnerHtml = `
                                     <div id="loadingSpinnerModal" class="text-center">
                                         <button class="btn btn-primary" type="button" disabled>
                                             <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                             Carregando...
                                         </button>
                                     </div>
                                 `;

                                 // insere o spinner dinamicamente dentro do body do modal visualizar
                                 $("#modalVisualizarCliente .modal-body").prepend(spinnerHtml);
                                        $.ajax({
                                            type: "GET",
                                            url: "/visualizarCliente/" + item.id,
                                            data: "data",
                                            dataType: "json",
                                            success: function(response) {
                                                /* finalizando o GET o spinner é destruído */
                                                $("#loadingSpinnerModal").remove();
                                                function formatarData(dataString) {
                                                    // Converte a string para um objeto Date
                                                    var data = new Date(dataString);

                                                    // Formata a data e a hora
                                                    var formatado = pad(data.getHours()) + ":" + pad(data.getMinutes()) + ":" + pad(data.getSeconds()) + " - " + pad(data.getDate()) + "/" + pad(data.getMonth() + 1) + "/" + data.getFullYear();

                                                    return formatado;
                                                }

                                                // Função para adicionar zeros à esquerda (para valores menores que 10)
                                                function pad(value) {
                                                    return (value < 10 ? '0' : '') + value;
                                                }

                                                /* os dados trazidos na requisição GET colocandos nos inputs do modal visualizar */
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
                                                $("#visualizarUltimaAtualizacaoCliente").val(formatarData(response.updated_at));
                                                $("#visualizarDataCadastroCliente").val(formatarData(response.created_at));
                                            }
                                        });

                                    }).append($iconVisualizar);

                                var $editarButton = $("<button>").attr({
                                        class: "btn btn-sm btn-success ml-2",
                                        "data-bs-toggle": "modal",
                                        "data-bs-target": "#modalAdicionarEditarCliente"
                                    })
                                    .click(function(e) {
                                        e.stopPropagation();
                                        console.log("Edit clicked for item:", item);

                                        var icon = '<i class="fas fa-user"></i>';
                                        var texto = "Editar dados do Cliente";
                                        $("#cabecalhoModalAdicionarEditarCliente").html(icon + " " + texto);

                                         /* esta variável recebe as propriedades de um spinner */
                                         var spinnerHtml = `
                                     <div id="loadingSpinnerModal" class="text-center">
                                         <button class="btn btn-primary" type="button" disabled>
                                             <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                             Carregando...
                                         </button>
                                     </div>
                                 `;

                                 // insere o spinner dinamicamente dentro do body do modal AdicionarVisualizarCliente
                                 $("#modalAdicionarEditarCliente .modal-body").prepend(spinnerHtml);
                                        $.ajax({
                                            type: "GET",
                                            url: "/visualizarCliente/" + item.id,
                                            data: "data",
                                            dataType: "json",
                                            success: function(response) {
                                                /* finalizando o GET o spinner é destruído */
                                                $("#loadingSpinnerModal").remove();
                                                function formatarData(dataString) {
                                                    // Converte a string para um objeto Date
                                                    var data = new Date(dataString);

                                                    // Formata a data e a hora
                                                    var formatado = pad(data.getHours()) + ":" + pad(data.getMinutes()) + ":" + pad(data.getSeconds()) + " - " + pad(data.getDate()) + "/" + pad(data.getMonth() + 1) + "/" + data.getFullYear();

                                                    return formatado;
                                                }

                                                // Função para adicionar zeros à esquerda (para valores menores que 10)
                                                function pad(value) {
                                                    return (value < 10 ? '0' : '') + value;
                                                }

                                                /* os dados trazidos na requisição GET colocandos nos inputs do modal Adicionar / Editar */
                                                $("#nomeCliente").val(response.nomeCliente);
                                                var estadoRgCliente = $('#estadoRgCliente')[0].selectize;
                                                    estadoRgCliente.setValue(response.estadoRgCliente);
                                                $("#rgCliente").val(response.rgCliente);
                                                $("#cpfCliente").val(response.cpfCliente);
                                                $("#emailCliente").val(response.emailCliente);
                                                $("#celularCliente").val(response.celularCliente);
                                                $("#telefoneCliente").val(response.telefoneCliente);
                                                $("#enderecoCliente").val(response.enderecoCliente);
                                                $("#numeroCliente").val(response.numeroCliente);
                                                $("#complementoCliente").val(response.complementoCliente);
                                                var estadoCliente = $('#estadoCliente')[0].selectize;
                                                    estadoCliente.setValue(response.estadoCliente);
                                                var cidadeCliente = $('#cidadeCliente')[0].selectize;
                                                    cidadeCliente.setValue(response.cidadeCliente);
                                                $("#ultimaAtualizacaoCliente").val(formatarData(response.updated_at));
                                                $("#dataCadastroCliente").val(formatarData(response.created_at));
                                            }
                                        });

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

    /* ao finalizar o carregamento da página, o spinner é mostrado e o jsGrid ocultado, até que o GET dos 
    Clientes seja finalizado */
    $(document).ready(function() {
        $("#loadingSpinner").show();
        $("#jsGridClientes").hide();

        /* carrega de fato a função acima de GET */
        listarClientes();
    });
</script>
