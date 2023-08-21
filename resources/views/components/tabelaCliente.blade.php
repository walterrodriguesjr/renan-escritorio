<style>

.purple-text {
    color: purple;
}

    .whatsapp-link {
    color: green; /* Define a cor verde para o texto e ícone */
    text-decoration: none; /* Remove sublinhado do link */
}

.whatsapp-text {
    color: green; /* Define a cor verde apenas para o texto "Abrir WhatsApp" */
}

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
.deletar {
        color: #fff; /* Define a cor do texto para branco */
        background-color: #dc3545; /* Define a cor de fundo como a cor de sucesso do Bootstrap */
        border-color: ##dc3545; /* Define a cor da borda como a cor de sucesso do Bootstrap */
    }

    .deletar:hover {
        color: #fff; /* Mantém o texto branco em hover */
        background-color: #dc3545; /* Define a cor de fundo um pouco mais escura em hover */
        border-color: #b33d49; /* Define a cor da borda um pouco mais escura em hover */
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
                    height: "350px",
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
                                        
                                    })
                                      
                                    .click(function(e) {

                                       $("#loadingSpinner").show();
                                 
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
                                                $("#modalVisualizarCliente").modal("show");
                                                $("#loadingSpinner").hide();

                                                /* os dados trazidos na requisição GET colocandos nos inputs do modal visualizar */
                                                $("#visualizarNomeCliente").val(response.nomeCliente);
                                                $("#visualizarEstadoRgCliente").val(response.estadoRgCliente);
                                                $("#visualizarRgCliente").val(response.rgCliente);
                                                $("#visualizarCpfCliente").val(response.cpfCliente);
                                                $("#visualizarEmailCliente").val(response.emailCliente);
                                                var emailCliente = response.emailCliente;
var linkParaEmail = 'https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox?compose=new&to=' + encodeURIComponent(emailCliente);

var linkHtml = '<a href="' + linkParaEmail + '" target="_blank" class="email-link"><span class="email-text purple-text"> - Abrir Gmail <i class="far fa-envelope"></i></span></a>';

if ($("#visualizarEmailCliente .email-link").length === 0) {
    $("#visualizarEmailCliente").append(linkHtml);
}
                                                $("#visualizarCelularCliente").val(response.celularCliente);
                                                var celularCliente = response.celularCliente;
var linkParaWhatsapp = 'https://web.whatsapp.com/send?phone=' + celularCliente;

var linkHtml = '<a href="' + linkParaWhatsapp + '" target="_blank">Celular - <span class="whatsapp-text .whatsapp-link">Abrir WhatsApp <i class="fab fa-whatsapp"></i></span></a>';

$("#visualizarCelularWhatsappCliente").html(linkHtml);

                                                $("#visualizarTelefoneCliente").val(response.telefoneCliente);
                                                $("#visualizarEnderecoCliente").val(response.enderecoCliente);
                                                $("#visualizarNumeroCliente").val(response.numeroCliente);
                                                $("#visualizarComplementoCliente").val(response.complementoCliente);
                                                $("#visualizarEstadoCliente").val(response.estadoCliente);
                                                $("#visualizarCidadeCliente").val(response.cidadeCliente);
                                                $("#visualizarUltimaAtualizacaoCliente").val(formatarData(response.updated_at));
                                                $("#visualizarDataCadastroCliente").val(formatarData(response.created_at));
                                            },
                                            error: function(xhr, status, error) {
                                            $("#loadingSpinner").hide();

                                            // Se a resposta da API incluir mensagens de erro
                                            if (xhr.responseJSON && xhr.responseJSON.errors) {
                                                var errorMessages = Object.values(xhr.responseJSON.errors).join("\n");
                                                swal("Erro ao Exibir Cliente", errorMessages, "error");
                                            } else {
                                                // Caso contrário, exiba uma mensagem genérica
                                                swal("Erro ao Exibir Cliente", "Verifique sua conexão com a internet.", "error");
                                            }
                                        }
                                        });

                                    }).append($iconVisualizar);

                                var $editarButton = $("<button>").attr({
                                        class: "btn btn-sm btn-success ml-2",
                                        
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

                                        $("#loadingSpinner").show();

                                 
                                        $.ajax({
                                            type: "GET",
                                            url: "/visualizarCliente/" + item.id,
                                            data: "data",
                                            dataType: "json",
                                            success: function(response) {                                            
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

                                                $("#modalAdicionarEditarCliente").modal("show");
                                            $("#loadingSpinner").hide();
                                            },
                                            error: function(xhr, status, error) {
                                            $("#loadingSpinner").remove();

                                            // Se a resposta da API incluir mensagens de erro
                                            if (xhr.responseJSON && xhr.responseJSON.errors) {
                                                var errorMessages = Object.values(xhr.responseJSON.errors).join("\n");
                                                swal("Erro ao Exibir Cliente", errorMessages, "error");
                                            } else {
                                                // Caso contrário, exiba uma mensagem genérica
                                                swal("Erro ao Exibir Cliente", "Verifique sua conexão com a internet.", "error");
                                            }
                                        }
                                        
                                        });

                                        $('#atualizarCliente').click(function (e) { 
                                            e.preventDefault();

                                            /* esta variável recebe as propriedades de um spinner de atualizando */
                                        var spinnerHtml = `
                                     <div id="loadingSpinnerModal" class="text-center">
                                         <button class="btn btn-success" type="button" disabled>
                                             <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                             Atualizando...
                                         </button>
                                     </div>
                                 `;

                                 // insere o spinner dinamicamente dentro do body do modal visualizar
                                 $("#modalAdicionarEditarCliente .modal-body").prepend(spinnerHtml);

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
                                                $("#modalAdicionarEditarCliente").modal('hide');
                                                $("#loadingSpinnerModal").remove();
                                                swal("Cliente Atualizado com Sucesso!", "", "success");
                                                    /* método que recarrega o grid de clientes, já atualizado */
                                                listarClientes();
                                                },
                                                error: function(xhr, status, error) {
                                            $("#loadingSpinnerModal").remove();

                                            // Se a resposta da API incluir mensagens de erro
                                            if (xhr.responseJSON && xhr.responseJSON.errors) {
                                                var errorMessages = Object.values(xhr.responseJSON.errors).join("\n");
                                                swal("Erro ao Editar Cliente", errorMessages, "error");
                                            } else {
                                                // Caso contrário, exiba uma mensagem genérica
                                                swal("Erro ao Editar Cliente", "Verifique sua conexão com a internet.", "error");
                                            }
                                        }
                                            });
                                        });

                                    }).append($iconEditar);

                                // botão de exclusão
                                var $deletarButton = $("<button>").attr({
                                        class: "btn btn-sm btn-danger ml-2",
                                        "data-bs-toggle": "modal",
                                        "data-bs-target": "#modalConfirmacaoDeletarCliente"
                                    })
                                    .click(function(e) {
                                        e.stopPropagation();

                                    $("#buttonDeletarCliente").click(function (e) { 
                                        e.preventDefault();

                                        /* esta variável recebe as propriedades de um spinner de atualizando */
                                        var spinnerHtml = `
                                     <div id="deletarSpinnerModal" class="text-center">
                                         <button class="btn btn-danger" type="button" disabled>
                                             <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                             Deletando...
                                         </button>
                                     </div>
                                 `;

                                 // insere o spinner dinamicamente dentro do body do modal visualizar
                                 $("#modalConfirmacaoDeletarCliente .modal-body").prepend(spinnerHtml);

                                        // Pegue o token CSRF da meta tag
                                        let csrfToken = $('meta[name="csrf-token"]').attr('content');
                                        $.ajax({
                                            type: "DELETE",
                                            url: "/deletarCliente/" + item.id,
                                            data: "data",
                                            headers: {
                                                // Adicione o token CSRF ao cabeçalho da solicitação
                                                'X-CSRF-TOKEN': csrfToken
                                                },
                                            dataType: "json",
                                            success: function (response) {
                                                $("#deletarSpinnerModal").remove();
                                                $("#modalConfirmacaoDeletarCliente").modal("hide");
                                                swal("Cliente Deletado com Sucesso!", "", "success");
                                                listarClientes();
                                            },
                                            error: function(xhr, status, error) {
                                                $("#deletarSpinnerModal").remove();
                                                $("#modalConfirmacaoDeletarCliente").modal("hide");
                                            // Exibir o SweetAlert de erro
                                            swal("Erro ao Deletar Cliente", "Verifique sua conexão com a internet.", "error");
                                        }
                                        });
                                        
                                    });
                                        
                                    }).append($iconDeletar);

                                return $("<div>").append($visualizarButton).append(
                                    $editarButton).append($deletarButton);
                            }
                        }
                    ]
                });
            },
            error: function(xhr, status, error) {
                $("#loadingSpinner").hide();
                // Exibir o SweetAlert de erro
                swal("Erro ao Carregar Clientes", "Verifique sua conexão com a internet.", "error");
            }
        });
    }

    /* ao finalizar o carregamento da página, o spinner é mostrado e o jsGrid ocultado, até que o GET dos 
    Clientes seja finalizado */
    $(document).ready(function() {
       /*  $("#loadingSpinner").show();
        $("#jsGridClientes").hide(); */

        /* carrega de fato a função acima de GET */
        /* listarClientes(); */
    });
    

</script>
