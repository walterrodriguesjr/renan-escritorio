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

{{-- <div id="loadingSpinner" class="text-center">
    <button class="btn btn-primary" type="button" disabled>
        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
        Carregando...
    </button>
</div> --}}

{{-- <div id="loadingSpinner" class="text-center spinner-container" style="display: none;">
    <div class="spinner-backdrop"></div>
    <button class="btn btn-info spinner-button" type="button" disabled>
        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
        Carregando...
    </button>
</div> --}}


{{-- onde todo o grid de Clientes é montado --}}

<div id="jsGridClientes"></div>
<div id="jsGridClientesPessoaJuridica"></div>

<script>
    

function atualizarQuantidadeClientes() {

$.ajax({
    type: "GET",
    url: "/listarClientes",
    data: "data",
    dataType: "json",
    success: function (responsePessoaFisica) {
        let quantidadeClientesPessoaFisica = responsePessoaFisica.length;

        $.ajax({
            type: "GET",
            url: "/listarClientesPessoaJuridica",
            data: "data",
            dataType: "json",
            success: function (responsePessoaJuridica) {
    let quantidadeClientesPessoaJuridica = responsePessoaJuridica.length;

    let totalClientes = quantidadeClientesPessoaFisica + quantidadeClientesPessoaJuridica;

    // Substituir o spinner pelo número real de clientes
    $("#spinnerTotalCliente").hide();
    $("#spinnerTotalClientePessoaFisica").hide();
    $("#spinnerTotalClientePessoaJuridica").hide();
    $("#quantidadeClientes").text(totalClientes).show();
    $("#quantidadeClientesPessoaFisica").text(quantidadeClientesPessoaFisica).show();
    $("#quantidadeClientesPessoaJuridica").text(quantidadeClientesPessoaJuridica).show();

    $("#quantidadeClientesPessoaFisica").text(quantidadeClientesPessoaFisica);
    $("#quantidadeClientesPessoaJuridica").text(quantidadeClientesPessoaJuridica);
}
        });
    }
});

}

atualizarQuantidadeClientes();

    
    
    /* função GET na tabela CLIENTES, carregada de fato em DocReady abaixo e importada em clientes.blade.php */
    function listarClientes() {
        $.ajax({
            type: "GET",
            url: "/listarClientes",
            data: "data",
            dataType: "json",
            success: function(response) {
                atualizarQuantidadeClientes();

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
                            width: 200,

                        },
                        {
                            name: "rgCliente",
                            title: "RG",
                            type: "text",
                            width: 150,
                        },
                        {
                            name: "cpfCliente",
                            title: "CPF",
                            type: "text",
                            width: 150,
                        },
                        {
                            name: "emailCliente",
                            title: "E-mail",
                            type: "text",
                            width: 250,
                        },
                        {
                            name: "celularCliente",
                            title: "Celular",
                            type: "text",
                            width: 150,
                        },
                        {
                            title: "Ações",
                            width: 150,
                            sorting: false,
                            filtering: false,
                            itemTemplate: function(value, item) {
                                var $iconVisualizar = $("<i>").attr({
                                    class: "fas fa-eye",
                                    "data-bs-toggle": "tooltip",
                                     title: "Clique para Visualizar todos os dados do Cliente."
                                });
                                var $iconEditar = $("<i>").attr({
                                    class: "fas fa-edit",
                                    "data-bs-toggle": "tooltip",
                                    title: "Clique para Editar qualquer dado do Cliente."
                                });
                                var $iconDeletar = $("<i>").attr({
                                    class: "fas fa-trash",
                                    "data-bs-toggle": "tooltip",
                                     title: "Clique para Deletar o Cliente."
                                });

                                var $visualizarButton = $("<button>").attr({
                                        class: "btn btn-sm btn-secondary ml-3",
                                    })
                                      
                                    .click(function(e) {
                                        e.stopPropagation();
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
/* 
                                        var icon = '<i class="fas fa-user"></i>';
                                        var texto = "Editar dados do Cliente";
                                        $("#cabecalhoModalAdicionarEditarCliente").html(icon + " " + texto);
                                        $("#corCabecalhoModalAdicionarEditarCliente").css({
                                            "background-color": "#198754",
                                            "color": "white"
                                        }); */

                                        // Substituir o botão
                                        /* var botaoAtualizar = '<button type="button" class="btn btn-success btn-atualizar" id="atualizarCliente" title="Clique para Atualizar os dados do Cliente"><i class="fas fa-sync"></i> Atualizar</button>';
                                        $("#cadastrarCliente").replaceWith(botaoAtualizar); */
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
                                            $("#nomeEditarCliente").val(response.nomeCliente);
                                            var estadoRgEditarCliente = $('#estadoRgEditarCliente')[0].selectize;
                                                estadoRgEditarCliente.setValue(response.estadoRgCliente);
                                            $("#rgEditarCliente").val(response.rgCliente);
                                            $("#cpfEditarCliente").val(response.cpfCliente);
                                            $("#emailEditarCliente").val(response.emailCliente);
                                            $("#celularEditarCliente").val(response.celularCliente);
                                            $("#telefoneEditarCliente").val(response.telefoneCliente);
                                            $("#enderecoEditarCliente").val(response.enderecoCliente);
                                            $("#numeroEditarCliente").val(response.numeroCliente);
                                            $("#complementoEditarCliente").val(response.complementoCliente);
                                            var estadoEditarCliente = $('#estadoEditarCliente')[0].selectize;
                                                estadoEditarCliente.setValue(response.estadoCliente);
                                            var cidadeEditarCliente = $('#cidadeEditarCliente')[0].selectize;
                                                cidadeEditarCliente.setValue(response.cidadeCliente);
                                            $("#ultimaAtualizacaoCliente").val(formatarData(response.updated_at));
                                            $("#dataCadastroCliente").val(formatarData(response.created_at));

                                            $("#modalEditarCliente").modal('show');
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

                                        $('#editarCliente').click(function (e) { 
                                            e.preventDefault();
                                        
                                            /* esta variável recebe as propriedades de um spinner de atualizando */
                                        var spinnerHtml = `
                                        <div id="SpinnerModalEditarCliente" class="text-center">
                                         <button class="btn btn-success" type="button" disabled>
                                             <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                             Atualizando...
                                         </button>
                                     </div>
                                 `;

                                 // Função para mostrar o spinner no lugar do botão "Cadastrar"
                                 function mostrarSpinnerEditarCliente() {
                                            var spinnerButton = $(spinnerHtml);
                                            $("#editarCliente").replaceWith(spinnerButton);
                                        }
                                        mostrarSpinnerEditarCliente();

                                        // Função para restaurar o botão "Cadastrar" no lugar do spinner
                                        function restaurarBotaoEditarCliente() {
                                            var editarButton = $("<button type='button' class='btn btn-success' id='editarCliente' title='Clique para atualizar'><i class='fas fa-sync'></i> Atualizar</button>");
                                            $("#SpinnerModalEditarCliente").replaceWith(editarButton);
                                        }

                                            // Coleta dos valores dos campos e selects usando serializeArray
                                        var nomeEditarCliente = $("#nomeEditarCliente").val();
                                        var estadoRgEditarCliente = $("#estadoRgEditarCliente").val();
                                        var rgEditarCliente = $("#rgEditarCliente").val();
                                        var cpfEditarCliente = $("#cpfEditarCliente").val();
                                        var emailEditarCliente = $("#emailEditarCliente").val();
                                        var celularEditarCliente = $("#celularEditarCliente").val();
                                        var telefoneEditarCliente = $("#telefoneEditarCliente").val();
                                        var enderecoEditarCliente = $("#enderecoEditarCliente").val();
                                        var numeroEditarCliente = $("#numeroEditarCliente").val();
                                        var complementoEditarCliente = $("#complementoEditarCliente").val();
                                        var estadoEditarCliente = $("#estadoEditarCliente").val();
                                        var cidadeEditarCliente = $("#cidadeEditarCliente").val();

                                        var data = {
                                            nomeCliente: nomeEditarCliente,
                                            estadoRgCliente: estadoRgEditarCliente,
                                            rgCliente: rgEditarCliente,
                                            cpfCliente: cpfEditarCliente,
                                            emailCliente: emailEditarCliente,
                                            celularCliente: celularEditarCliente,
                                            telefoneCliente: telefoneEditarCliente,
                                            enderecoCliente: enderecoEditarCliente,
                                            numeroCliente: numeroEditarCliente,
                                            complementoCliente: complementoEditarCliente,
                                            estadoCliente: estadoEditarCliente,
                                            cidadeCliente: cidadeEditarCliente,
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
                                                    $("#modalEditarCliente").modal('hide');
                                                restaurarBotaoEditarCliente();
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
                                     <div id="deletarSpinnerModalCliente" class="text-center">
                                         <button class="btn btn-danger" type="button" disabled>
                                             <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                             Deletando...
                                         </button>
                                     </div>
                                 `;

                                 // Função para mostrar o spinner no lugar do botão "Cadastrar"
                                 function mostrarSpinnerDeletarCliente() {
                                            var spinnerButton = $(spinnerHtml);
                                            $("#buttonDeletarCliente").replaceWith(spinnerButton);
                                        }
                                        mostrarSpinnerDeletarCliente();

                                        // Função para restaurar o botão "Cadastrar" no lugar do spinner
                                        function restaurarBotaoDeletarCliente() {
                                            var deletarButton = $("<button type='button' class='btn btn-danger deletar' id='buttonDeletarCliente' title='Clique para deletar'><i class='fas fa-trash'></i> Deletar</button>");
                                            $("#deletarSpinnerModalCliente").replaceWith(deletarButton);
                                        }


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
                                                $("#modalConfirmacaoDeletarCliente").modal("hide");
                                                restaurarBotaoDeletarCliente();
                                                swal("Cliente Deletado com Sucesso!", "", "success");
                                                listarClientes();
                                                
                                            },
                                            error: function(xhr, status, error) {
                                                $("#modalConfirmacaoDeletarCliente").modal("hide");
                                                restaurarBotaoDeletarCliente();
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

    //FINAL GRID CLIENTES PESSOA FÍSICA

    /* ---------------------------------------------------------------------------------------------------------------------- */
    /* ---------------------------------------------------------------------------------------------------------------------- */
    /* ---------------------------------------------------------------------------------------------------------------------- */

    //INICIO GRID PESSOA JURIDICA

    /* function atualizarQuantidadeClientesPessoaJuridica() { 
        
        $.ajax({
            type: "GET",
            url: "/listarClientesPessoaJuridica",
            data: "data",
            dataType: "json",
            success: function (response) {
                let quantidadePessoaJuridica = response.length;
                $("#quantidadeClientesPessoaJuridica").text(quantidadePessoaJuridica);
            }
        });
    }
    atualizarQuantidadeClientesPessoaJuridica(); */
    
    
    /* função GET na tabela CLIENTES, carregada de fato em DocReady abaixo e importada em clientes.blade.php */
    function listarClientesPessoaJuridica() {
        $.ajax({
            type: "GET",
            url: "/listarClientesPessoaJuridica",
            data: "data",
            dataType: "json",
            success: function(response) {
                atualizarQuantidadeClientes();

                $("#loadingSpinnerPessoaJuridica").hide();
                $("#jsGridClientesPessoaJuridica").show();

                $("#jsGridClientesPessoaJuridica").jsGrid({
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
                            name: "razaoSocial",
                            title: "Razão Social",
                            type: "text",
                            width: 250,

                        },
                        {
                            name: "cnpj",
                            title: "CNPJ",
                            type: "text",
                            width: 200,
                        },
                        {
                            name: "email",
                            title: "E-mail",
                            type: "text",
                            width: 300,
                        },
                        {
                            name: "telefone",
                            title: "Telefone",
                            type: "text",
                            width: 200,
                        },
                        {
                            title: "Ações",
                            width: 150,
                            sorting: false,
                            filtering: false,
                            itemTemplate: function(value, item) {
                                var $iconVisualizar = $("<i>").attr({
                                    class: "fas fa-eye",
                                    "data-bs-toggle": "tooltip",
                                     title: "Clique para Visualizar todos os dados do Cliente."
                                });
                                var $iconEditar = $("<i>").attr({
                                    class: "fas fa-edit",
                                    "data-bs-toggle": "tooltip",
                                    title: "Clique para Editar qualquer dado do Cliente."
                                });
                                var $iconDeletar = $("<i>").attr({
                                    class: "fas fa-trash",
                                    "data-bs-toggle": "tooltip",
                                     title: "Clique para Deletar o Cliente."
                                });

                                var $visualizarButtonClientePessoaJuridica = $("<button>").attr({
                                        class: "btn btn-sm btn-secondary ml-3",
                                    })
                                      
                                    .click(function(e) {     
                                        $("#loadingSpinnerPessoaJuridica").show();               
                                       
                                        $.ajax({
                                            type: "GET",
                                            url: "/visualizarClientePessoaJuridica/" + item.id,
                                            data: "data",
                                            dataType: "json",
                                            success: function(response) {
                                                /* finalizando o GET o spinner é destruído */
                                                console.log(response);
                                                $("#loadingSpinnerPessoaJuridica").hide();
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
                                                $("#modalVisualizarClientePessoaJuridica").modal("show");
                                             
                                                /* os dados trazidos na requisição GET colocandos nos inputs do modal visualizar */
                                                $("#visualizarNomeFantasia").val(response.nomeFantasia);
                                                $("#visualizarRazaoSocial").val(response.razaoSocial);
                                                $("#visualizarCnpj").val(response.cnpj);
                                                $("#visualizarStatus").val(response.status);
                                                $("#visualizarDataAbertura").val(formatarData(response.dataAbertura));
                                                $("#visualizarEmail").val(response.email);
                                                /* var emailClientePessoaJuridica = response.email;
                                                var linkParaEmail = 'https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox?compose=new&to=' + encodeURIComponent(emailClientePessoaJuridica);
                                                                                            
                                                var linkHtml = '<a href="' + linkParaEmail + '" target="_blank" class="email-link"><span class="email-text purple-text"> - Abrir Gmail <i class="far fa-envelope"></i></span></a>';
                                                                                            
                                                if ($("#visualizarEmail .email-link").length === 0) {
                                                    $("#visualizarEmail").append(linkHtml);
                                                } */
                                                
                                                /* $("#visualizarCelularCliente").val(response.celularCliente);
                                                var celularCliente = response.celularCliente;
                                                var linkParaWhatsapp = 'https://web.whatsapp.com/send?phone=' + celularCliente;
                                                
                                                var linkHtml = '<a href="' + linkParaWhatsapp + '" target="_blank">Celular - <span class="whatsapp-text .whatsapp-link">Abrir WhatsApp <i class="fab fa-whatsapp"></i></span></a>';
                                                
                                                $("#visualizarCelularWhatsappCliente").html(linkHtml); */

                                                $("#visualizarCnaePrincipalDescricao").val(response.cnaePrincipalDescricao);
                                                $("#visualizarCnaePrincipalCodigo").val(response.cnaePrincipalCodigo);
                                                $("#visualizarDdd").val(response.ddd);
                                                $("#visualizarTelefone").val(response.telefone);
                                                $("#visualizarLogradouro").val(response.logradouro);
                                                $("#visualizarNumero").val(response.numero);
                                                $("#visualizarComplemento").val(response.complemento);
                                                $("#visualizarUf").val(response.uf);
                                                $("#visualizarMunicipio").val(response.municipio);
                                                $("#visualizarUltimaAtualizacaoClientePessoaJuridica").val(formatarData(response.updated_at));
                                                $("#visualizarDataCadastroClientePessoaJuridica").val(formatarData(response.created_at));
                                            },
                                            error: function(xhr, status, error) {
                                            $("#loadingSpinnerPessoaJuridica").hide();

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

                                        /* var icon = '<i class="fas fa-user"></i>';
                                        var texto = "Editar dados do Cliente";
                                        $("#cabecalhoModalAdicionarEditarClientePessoaJuridica").html(icon + " " + texto);
                                        $("#corCabecalhoModalAdicionarEditarClientePessoaJuridica").css({
                                            "background-color": "#198754",
                                            "color": "white"
                                        }); */

                                        // Substituir o botão
                                        /* var botaoAtualizarClientePessoaJuridica = '<button type="button" class="btn btn-success btn-atualizar" id="atualizarClientePessoaJuridica" title="Clique para Atualizar os dados do Cliente"><i class="fas fa-sync"></i> Atualizar</button>';
                                        $("#cadastrarClientePessoaJuridica").replaceWith(botaoAtualizarClientePessoaJuridica); */
                                        $("#loadingSpinnerPessoaJuridica").show();

                                 
                                        $.ajax({
                                            type: "GET",
                                            url: "/visualizarClientePessoaJuridica/" + item.id,
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
                                            $("#nomeFantasiaEditar").val(response.nomeFantasia);
                                            $("#razaoSocialEditar").val(response.razaoSocial);
                                            $("#cnpjEditar").val(response.cnpj);
                                            $("#statusEditar").val(response.status);
                                            $("#dataAberturaEditar").val(formatarData(response.dataAbertura));
                                            $("#cnaePrincipalDescricaoEditar").val(response.cnaePrincipalDescricao);
                                            $("#cnaePrincipalCodigoEditar").val(response.cnaePrincipalCodigo);
                                            $("#emailEditar").val(response.email);
                                            $("#telefoneEditar").val(response.telefone);
                                            $("#logradouroEditar").val(response.logradouro);
                                            $("#numeroEditar").val(response.numero);
                                            $("#complementoEditar").val(response.complemento);
                                                var uf = $('#uf')[0].selectize;
                                                    uf.setValue(response.uf);
                                                var municipio = $('#municipio')[0].selectize;
                                                    municipio.setValue(response.municipio);

                                                $("#modalEditarClientePessoaJuridica").modal("show");
                                            $("#loadingSpinnerPessoaJuridica").hide();
                                            },
                                            error: function(xhr, status, error) {
                                            $("#loadingSpinnerPessoaJuridica").remove();

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

                                        $('#editarClientePessoaJuridica').click(function (e) { 
                                            e.preventDefault();

                                            /* esta variável recebe as propriedades de um spinner de atualizando */
                                        var spinnerHtml = `
                                     <div id="adicionarSpinnerModalAtualizarClientePessoaJuridica" class="text-center">
                                         <button class="btn btn-success" type="button" disabled>
                                             <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                             Atualizando...
                                         </button>
                                     </div>
                                 `;

                                 // Função para mostrar o spinner no lugar do botão "Cadastrar"
                                 function mostrarSpinnerAtualizarClientePessoaJuridica() {
                                            var spinnerButton = $(spinnerHtml);
                                            $("#editarClientePessoaJuridica").replaceWith(spinnerButton);
                                        }
                                        mostrarSpinnerAtualizarClientePessoaJuridica();

                                        // Função para restaurar o botão "Cadastrar" no lugar do spinner
                                        function restaurarBotaoAtualizarClientePessoaJuridica() {
                                            var atualizarButton = $("<button type='button' class='btn btn-success' id='editarClientePessoaJuridica' title='Clique para atualizar'><i class='fas fa-sync'></i> Atualizar</button>");
                                            $("#adicionarSpinnerModalAtualizarClientePessoaJuridica").replaceWith(atualizarButton);
                                        }

                                            // Coleta dos valores dos campos e selects usando serializeArray
                                            var nomeFantasiaEditar = $("#nomeFantasiaEditar").val();
                                            var razaoSocialEditar = $("#razaoSocialEditar").val();
                                            var cnpjEditar = $("#cnpjEditar").val();
                                            var statusEditar = $("#statusEditar").val();
                                            var dataAberturaEditar = $("#dataAberturaEditar").val();
                                            var cnaePrincipalDescricaoEditar = $("#cnaePrincipalDescricaoEditar").val();
                                            var cnaePrincipalCodigoEditar = $("#cnaePrincipalCodigoEditar").val();
                                            var emailEditar = $("#emailEditar").val();
                                            var telefoneEditar = $("#telefoneEditar").val();
                                            var logradouroEditar = $("#logradouroEditar").val();
                                            var complementoEditar = $("#complementoEditar").val();
                                            var ufEditar = $("#ufEditar").val();
                                            var municipioEditar = $("#municipioEditar").val();

                                            var data = {
                                                nomeFantasia: nomeFantasiaEditar,
                                                razaoSocial: razaoSocialEditar,
                                                cnpj: cnpjEditar,
                                                status: statusEditar,
                                                dataAbertura: dataAberturaEditar,
                                                cnaePrincipalDescricao: cnaePrincipalDescricaoEditar,
                                                cnaePrincipalCodigo: cnaePrincipalCodigoEditar,
                                                email: emailEditar,
                                                telefone: telefoneEditar,
                                                logradouro: logradouroEditar,
                                                complemento: complementoEditar,
                                                uf: ufEditar,
                                                municipio: municipioEditar,
                                            };
                                          
                                            // Pegue o token CSRF da meta tag
                                            let csrfToken = $('meta[name="csrf-token"]').attr('content');

                                            $.ajax({
                                                type: "PUT",
                                                url: "/editarClientePessoaJuridica/" + item.id,
                                                data: data,
                                                headers: {
                                                // Adicione o token CSRF ao cabeçalho da solicitação
                                                'X-CSRF-TOKEN': csrfToken
                                                },
                                                dataType: "json",
                                                success: function (response) {
                                                $("#modalEditarClientePessoaJuridica").modal('hide');
                                                restaurarBotaoAtualizarClientePessoaJuridica();
                                                swal("Cliente Atualizado com Sucesso!", "", "success");
                                                    /* método que recarrega o grid de clientes, já atualizado */
                                                listarClientesPessoaJuridica();
                                                },
                                                error: function(xhr, status, error) {
                                                    restaurarBotaoAtualizarClientePessoaJuridica();

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
                                        "data-bs-target": "#modalConfirmacaoDeletarClientePessoaJuridica"
                                    })
                                    .click(function(e) {
                                        e.stopPropagation();
                                        
                                    $("#buttonDeletarClientePessoaJuridica").click(function (e) { 
                                        e.preventDefault();
                                        
                                        /* esta variável recebe as propriedades de um spinner de atualizando */
                                        var spinnerHtml = `
                                     <div id="deletarSpinnerModalClientePessoaJuridica" class="text-center">
                                         <button class="btn btn-danger" type="button" disabled>
                                             <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                             Deletando...
                                         </button>
                                     </div>
                                 `;

                                 // Função para mostrar o spinner no lugar do botão "Cadastrar"
                                 function mostrarSpinnerDeletarClientePessoaJuridica() {
                                            var spinnerButton = $(spinnerHtml);
                                            $("#buttonDeletarClientePessoaJuridica").replaceWith(spinnerButton);
                                        }
                                        mostrarSpinnerDeletarClientePessoaJuridica();

                                        // Função para restaurar o botão "Cadastrar" no lugar do spinner
                                        function restaurarBotaoDeletarClientePessoaJuridica() {
                                            var deletarButton = $("<button type='button' class='btn btn-danger deletar' id='buttonDeletarClientePessoaJuridica' title='Clique para deletar'><i class='fas fa-trash'></i> Deletar</button>");
                                            $("#deletarSpinnerModalClientePessoaJuridica").replaceWith(deletarButton);
                                        }
                                      
                                        // Pegue o token CSRF da meta tag
                                        let csrfToken = $('meta[name="csrf-token"]').attr('content');
                                        $.ajax({
                                            type: "DELETE",
                                            url: "/deletarClientePessoaJuridica/" + item.id,
                                            data: "data",
                                            headers: {
                                                // Adicione o token CSRF ao cabeçalho da solicitação
                                                'X-CSRF-TOKEN': csrfToken
                                                },
                                            dataType: "json",
                                            success: function (response) {
                                                $("#modalConfirmacaoDeletarClientePessoaJuridica").modal("hide");
                                                restaurarBotaoDeletarClientePessoaJuridica();
                                                swal("Cliente Deletado com Sucesso!", "", "success");
                                                listarClientesPessoaJuridica();
                                            },
                                            error: function(xhr, status, error) {
                                                $("#modalConfirmacaoDeletarClientePessoaJuridica").modal("hide");
                                                restaurarBotaoDeletarClientePessoaJuridica();
                                            // Exibir o SweetAlert de erro
                                            swal("Erro ao Deletar Cliente", "Verifique sua conexão com a internet.", "error");
                                        }
                                        });
                                    });
                                        
                                    }).append($iconDeletar);

                                return $("<div>").append($visualizarButtonClientePessoaJuridica).append(
                                    $editarButton).append($deletarButton);
                            }
                        }
                    ]
                });
            },
            error: function(xhr, status, error) {
                $("#loadingSpinnerPessoaJuridica").hide();
                // Exibir o SweetAlert de erro
                swal("Erro ao Carregar Clientes", "Verifique sua conexão com a internet.", "error");
            }
        });
    }

    //FINAL GRID PESSOA JURIDICA

    /* ao finalizar o carregamento da página, o spinner é mostrado e o jsGrid ocultado, até que o GET dos 
    Clientes seja finalizado */
    $(document).ready(function() {
        
       
    });
    

</script>
