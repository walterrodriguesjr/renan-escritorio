<style>
    .jsgrid-header-cell {
        text-align: center;
    }

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
    
</style>

<div id="jsGridAdministrador"></div>

@include('components.administrador.modalVisualizarUsuario')
@include('components.administrador.modalEditarUsuario')

<script>
    function atualizarQuantidadeUsuarios() {
        $.ajax({
            type: "GET",
            url: "/listarUsuarios",
            data: "data",
            dataType: "json",
            success: function (response) {
                /* console.log(response); */
            var quantidade = response.length;
            $("#spinnerTotalUsuario").hide();
            $("#quantidadeUsuario").css("display", "block");
            $("#quantidadeUsuario").text(quantidade);

            $("#jsGridAdministrador").jsGrid({
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
                name: "nomeUsuario",
                title: "Nome",
                type: "text",
                width: 200,
            },
            {
                name: "emailUsuario",
                title: "E-mail",
                type: "text",
                width: 200,
            },
            {
                name: "celularUsuario",
                title: "Celular",
                type: "number",
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
                    title: "Clique para Visualizar todos os dados do Usuário."
                });
                var $iconEditar = $("<i>").attr({
                    class: "fas fa-edit",
                    title: "Clique para Editar qualquer dado do Usuário."
                });
                var $iconDeletar = $("<i>").attr({
                    class: "fas fa-trash",
                    title: "Clique para Deletar o Usuário."
                });

                var $visualizarButton = $("<button>").attr({
                    class: "btn btn-sm btn-secondary ml-3",
                })

                .click(function(e) {
                $("#loadingSpinner").show();
                                    $.ajax({
                                        type: "GET",
                                        url: "/visualizarUsuario/" + item.id,
                                        data: "data",
                                        dataType: "json",
                                        success: function(response) {
                                            console.log(response);
                                            /* finalizando o GET o spinner é destruído */

                                            $("#loadingSpinnerModal").hide();

                                            function formatarData(dataString) {
                                                // Converte a string para um objeto Date
                                                var data = new Date(dataString);

                                                // Formata a data e a hora
                                                var formatado = pad(data
                                                        .getHours()) + ":" +
                                                    pad(data.getMinutes()) +
                                                    ":" + pad(data
                                                .getSeconds()) + " - " + pad(
                                                        data.getDate()) + "/" +
                                                    pad(data.getMonth() + 1) +
                                                    "/" + data.getFullYear();

                                                return formatado;
                                            }

                                            // Função para adicionar zeros à esquerda (para valores menores que 10)
                                            function pad(value) {
                                                return (value < 10 ? '0' : '') +
                                                    value;
                                            }
                                            $("#modalVisualizarUsuario").modal("show");
                                            $("#loadingSpinner").hide();

                                            /* os dados trazidos na requisição GET colocandos nos inputs do modal visualizar */
                                            $("#visualizarNomeUsuario").val(response.nomeUsuario);
                                            $("#visualizarEstadoRgUsuario").val(response.estadoRgUsuario);
                                            $("#visualizarRgUsuario").val(response.rgUsuario);
                                            $("#visualizarCpfUsuario").val(response.cpfUsuario);
                                            $("#visualizarEmailUsuario").val(response.emailUsuario);
                                            var emailUsuario = response.emailUsuario;
                                            var linkParaEmail =
                                                'https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox?compose=new&to=' +
                                                encodeURIComponent(emailUsuario);

                                            var linkHtml = '<a href="' +
                                                linkParaEmail +
                                                '" target="_blank" class="email-link"><span class="email-text purple-text"> - Abrir Gmail <i class="far fa-envelope"></i></span></a>';

                                            if ($(
                                                    "#visualizarEmailCliente .email-link")
                                                .length === 0) {
                                                $("#visualizarEmailUsuario")
                                                    .append(linkHtml);
                                            }
                                            $("#visualizarCelularUsuario").val(response.celularUsuario);
                                            var celularUsuario = response.celularUsuario;
                                            var linkParaWhatsapp =
                                                'https://web.whatsapp.com/send?phone=' +
                                                celularUsuario;

                                            var linkHtml = '<a href="' +
                                                linkParaWhatsapp +
                                                '" target="_blank">Celular - <span class="whatsapp-text .whatsapp-link">Abrir WhatsApp <i class="fab fa-whatsapp"></i></span></a>';

                                            $("#visualizarCelularWhatsappUsuario").html(linkHtml);

                                            $("#visualizarTelefoneUsuario").val(response.telefoneUsuario);
                                            $("#visualizarEnderecoUsuario").val(response.enderecoUsuario);
                                            $("#visualizarNumeroUsuario").val(response.numeroUsuario);
                                            $("#visualizarComplementoUsuario").val(response.complementoUsuario);
                                            $("#visualizarEstadoUsuario").val(response.estadoUsuario);
                                            $("#visualizarCidadeUsuario").val(response.cidadeUsuario);
                                            $("#visualizarTipoAcessoUsuario").val(response.tipoAcessoUsuario);
                                            $("#visualizarUltimaAtualizacaoUsuario").val(formatarData(response.updated_at));
                                            $("#visualizarDataCadastroUsuario").val(formatarData(response.created_at));
                                        },
                                        error: function(xhr, status, error) {
                                            $("#loadingSpinner").hide();

                                            // Se a resposta da API incluir mensagens de erro
                                            if (xhr.responseJSON && xhr
                                                .responseJSON.errors) {
                                                var errorMessages = Object
                                                    .values(xhr.responseJSON
                                                        .errors).join("\n");
                                                swal("Erro ao Exibir Cliente",
                                                    errorMessages, "error");
                                            } else {
                                                // Caso contrário, exiba uma mensagem genérica
                                                swal("Erro ao Exibir Usuário",
                                                    "Verifique sua conexão com a internet.",
                                                    "error");
                                            }
                                        }
                                    });

                                }).append($iconVisualizar);

                            var $editarButton = $("<button>").attr({
                                    class: "btn btn-sm btn-success ml-2",
                                })
                                .click(function(e) {
                                    e.stopPropagation();
                                    $("#loadingSpinner").show();

                                    $.ajax({
                                        type: "GET",
                                        url: "/visualizarUsuario/" + item.id,
                                        data: "data",
                                        dataType: "json",
                                        success: function(response) {
                                            console.log(response);
                                            function formatarData(dataString) {
                                                // Converte a string para um objeto Date
                                                var data = new Date(dataString);

                                                // Formata a data e a hora
                                                var formatado = pad(data
                                                        .getHours()) + ":" +
                                                    pad(data.getMinutes()) +
                                                    ":" + pad(data
                                                .getSeconds()) + " - " + pad(
                                                        data.getDate()) + "/" +
                                                    pad(data.getMonth() + 1) +
                                                    "/" + data.getFullYear();

                                                return formatado;
                                            }

                                            // Função para adicionar zeros à esquerda (para valores menores que 10)
                                            function pad(value) {
                                                return (value < 10 ? '0' : '') +
                                                    value;
                                            }

                                            /* os dados trazidos na requisição GET colocandos nos inputs do modal Editar */
                                            $("#nomeEditarUsuario").val(response.nomeUsuario);
                                            var estadoRgEditarUsuario = $('#estadoRgEditarUsuario')[0].selectize;
                                                estadoRgEditarUsuario.setValue(response.estadoRgUsuario);
                                            $("#rgEditarUsuario").val(response.rgUsuario);
                                            $("#cpfEditarUsuario").val(response.cpfUsuario);
                                            $("#emailEditarUsuario").val(response.emailUsuario);
                                            $("#celularEditarUsuario").val(response.celularUsuario);
                                            $("#telefoneEditarUsuario").val(response.telefoneUsuario);
                                            $("#enderecoEditarUsuario").val(response.enderecoUsuario);
                                            $("#numeroEditarUsuario").val(response.numeroUsuario);
                                            $("#complementoEditarUsuario").val(response.complementoUsuario);
                                            var estadoEditarUsuario = $('#estadoEditarUsuario')[0].selectize;
                                                estadoEditarUsuario.setValue(response.estadoUsuario);
                                            var cidadeEditarUsuario = $('#cidadeEditarUsuario')[0].selectize;
                                                cidadeEditarUsuario.setValue(response.cidadeUsuario);
                                            $("#ultimaAtualizacaoUsuario").val(formatarData(response.updated_at));
                                            $("#dataCadastroUsuario").val(formatarData(response.created_at));

                                            $("#modalEditarUsuario").modal('show');
                                            $("#loadingSpinner").hide();
                                        },
                                        error: function(xhr, status, error) {
                                            $("#loadingSpinner").remove();

                                            // Se a resposta da API incluir mensagens de erro
                                            if (xhr.responseJSON && xhr
                                                .responseJSON.errors) {
                                                var errorMessages = Object
                                                    .values(xhr.responseJSON
                                                        .errors).join("\n");
                                                swal("Erro ao Exibir Usuario",
                                                    errorMessages, "error");
                                            } else {
                                                // Caso contrário, exiba uma mensagem genérica
                                                swal("Erro ao Exibir Usuario",
                                                    "Verifique sua conexão com a internet.",
                                                    "error");
                                            }
                                        }
                                    });

                                    $('#atualizarUsuario').click(function(e) {
                                        e.preventDefault();
                                        
                                        /* esta variável recebe as propriedades de um spinner de atualizando */
                                       /*  var spinnerHtml = `
                                     <div id="SpinnerModalEditarCliente" class="text-center">
                                         <button class="btn btn-success" type="button" disabled>
                                             <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                             Atualizando...
                                         </button>
                                     </div>
                                 `; */
                                        // Função para mostrar o spinner no lugar do botão "Cadastrar"
                                        /* function mostrarSpinnerEditarCliente() {
                                            var spinnerButton = $(spinnerHtml);
                                            $("#editarCliente").replaceWith(spinnerButton);
                                        }
                                        mostrarSpinnerEditarCliente(); */

                                        // Função para restaurar o botão "Cadastrar" no lugar do spinner
                                       /*  function restaurarBotaoEditarCliente() {
                                            var editarButton = $("<button type='button' class='btn btn-success' id='editarCliente' title='Clique para atualizar'><i class='fas fa-sync'></i> Atualizar</button>");
                                            $("#SpinnerModalEditarCliente").replaceWith(editarButton);
                                        } */

                                        // Coleta dos valores dos campos e selects usando serializeArray
                                        var nomeEditarUsuario = $("#nomeEditarUsuario").val();
                                        var estadoRgEditarUsuario = $("#estadoRgEditarUsuario").val();
                                        var rgEditarUsuario = $("#rgEditarUsuario").val();
                                        var cpfEditarUsuario = $("#cpfEditarUsuario").val();
                                        var emailEditarUsuario = $("#emailEditarUsuario").val();
                                        var celularEditarUsuario = $("#celularEditarUsuario").val();
                                        var telefoneEditarUsuario = $("#telefoneEditarUsuario").val();
                                        var enderecoEditarUsuario = $("#enderecoEditarUsuario").val();
                                        var numeroEditarUsuario = $("#numeroEditarUsuario").val();
                                        var complementoEditarUsuario = $("#complementoEditarUsuario").val();
                                        var estadoEditarUsuario = $("#estadoEditarUsuario").val();
                                        var cidadeEditarUsuario = $("#cidadeEditarUsuario").val();
                                       
                                        var data = {
                                            nomeUsuario: nomeEditarUsuario,
                                            estadoRgUsuario: estadoRgEditarUsuario,
                                            rgUsuario: rgEditarUsuario,
                                            cpfUsuario: cpfEditarUsuario,
                                            emailUsuario: emailEditarUsuario,
                                            celularUsuario: celularEditarUsuario,
                                            telefoneUsuario: telefoneEditarUsuario,
                                            enderecoUsuario: enderecoEditarUsuario,
                                            numeroUsuario: numeroEditarUsuario,
                                            complementoUsuario: complementoEditarUsuario,
                                            estadoUsuario: estadoEditarUsuario,
                                            cidadeUsuario: cidadeEditarUsuario,
                                        };
                                        console.log(data);
                                        // Pegue o token CSRF da meta tag
                                        let csrfToken = $('meta[name="csrf-token"]')
                                            .attr('content');

                                        $.ajax({
                                            type: "PUT",
                                            url: "/editarUsuario/" + item.id,
                                            data: data,
                                            headers: {
                                                // Adicione o token CSRF ao cabeçalho da solicitação
                                                'X-CSRF-TOKEN': csrfToken
                                            },
                                            dataType: "json",
                                            success: function(response) {
                                                alert("deu certo");
                                                $("#modalEditarUsuario").modal('hide');
                                                swal("Dados do Usuário Editado com Sucesso!", errorMessages, "success");
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

                                    $("#buttonDeletarCliente").click(function(e) {
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
                                            var deletarButton = $("<button type='button' class='btn btn-danger' id='buttonDeletarCliente' title='Clique para deletar'><i class='fas fa-trash'></i> Deletar</button>");
                                            $("#deletarSpinnerModalCliente").replaceWith(deletarButton);
                                        }

                                        // Pegue o token CSRF da meta tag
                                        let csrfToken = $('meta[name="csrf-token"]')
                                            .attr('content');
                                        $.ajax({
                                            type: "DELETE",
                                            url: "/deletarCliente/" + item
                                                .id,
                                            data: "data",
                                            headers: {
                                                // Adicione o token CSRF ao cabeçalho da solicitação
                                                'X-CSRF-TOKEN': csrfToken
                                            },
                                            dataType: "json",
                                            success: function(response) {
                                                $("#modalConfirmacaoDeletarCliente").modal("hide");
                                                restaurarBotaoDeletarCliente();
                                                swal("Cliente Deletado com Sucesso!", "", "success");
                                                listarClientes();
                                            },
                                            error: function(xhr, status,
                                                error) {
                                                    $("#modalConfirmacaoDeletarCliente").modal("hide");
                                                    restaurarBotaoDeletarCliente();
                                                // Exibir o SweetAlert de erro
                                                swal("Erro ao Deletar Cliente",
                                                    "Verifique sua conexão com a internet.",
                                                    "error");
                                            }
                                        });

                                    });

                                }).append($iconDeletar);

                            return $("<div>").append($visualizarButton).append(
                                $editarButton).append($deletarButton);
                        }
                    }
            ]
            })
            }
        });
    }
atualizarQuantidadeUsuarios();

   

</script>