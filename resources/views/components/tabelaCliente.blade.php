<style>
    #loadingSpinner {
        display: none;
    }

    input[disabled], select[disabled], textarea[disabled] {
    background-color: #e9ecef;
    cursor: not-allowed;
}

.btn-atualizar {
        color: #fff; /* Define a cor do texto para branco */
        background-color: #198754; /* Define a cor de fundo como a cor de sucesso do Bootstrap */
        border-color: #198754; /* Define a cor da borda como a cor de sucesso do Bootstrap */
    }

    .btn-atualizar:hover {
        color: #fff; /* Mantém o texto branco em hover */
        background-color: #218838; /* Define a cor de fundo um pouco mais escura em hover */
        border-color: #1e7e34; /* Define a cor da borda um pouco mais escura em hover */
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

                                        // Substituir o botão
                                        var botaoAtualizar = '<button type="button" class="btn btn-success btn-atualizar" id="atualizarCliente"><i class="fas fa-sync"></i> Atualizar</button>';
                                        $("#cadastrarCliente").replaceWith(botaoAtualizar);

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

                                        $('#atualizarCliente').click(function (e) { 
                                            e.preventDefault();
                                            // Coleta dos valores dos campos e selects usando serializeArray
                                            var nomeCliente = $("#nomeCliente").val();
                                            var estadoRgCliente = $("#estadoRgCliente").val();
                                            var rgCliente = $("#rgCliente").val();
                                            var cpfCliente = $("#cpfCliente").val();
                                            var emailCliente = $("#emailCliente").val();
                                            var celularCliente = $("#celularCliente").val();
                                            var telefoneCliente = $("#telefoneCliente").val();
                                            var enderecoCliente = $("#enderecoCliente").val();
                                            var numeroCliente = $("#numeroCliente").val();
                                            var complementoCliente = $("#complementoCliente").val();
                                            var estadoCliente = $("#estadoCliente").val();
                                            var cidadeCliente = $("#cidadeCliente").val();

                                            var data = {
                                                nomeCliente: nomeCliente,
                                                estadoRgCliente: estadoRgCliente,
                                                rgCliente: rgCliente,
                                                cpfCliente: cpfCliente,
                                                emailCliente: emailCliente,
                                                celularCliente: celularCliente,
                                                telefoneCliente: telefoneCliente,
                                                enderecoCliente: enderecoCliente,
                                                numeroCliente: numeroCliente,
                                                complementoCliente: complementoCliente,
                                                estadoCliente: estadoCliente,
                                                cidadeCliente: cidadeCliente,
                                            };

                                            console.log(data);

                                            // Pegue o token CSRF da meta tag
                                            let csrfToken = $('meta[name="csrf-token"]').attr('content');

                                            $.ajax({
                                                type: "PUT",
                                                url: "/editarCliente/" + item.id,
                                                data: data,
                                                headers: {
                                                // Adicione o token CSRF ao cabeçalho da solicitação
                                                'X-CSRF-TOKEN': csrfToken
                                            },
                                                dataType: "json",
                                                success: function (response) {
                                                    
                                                }
                                            });
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
