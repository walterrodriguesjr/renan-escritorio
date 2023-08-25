<style>
    .btn-success {
        background-color: #28a745;
        /* Substitua pela cor desejada */
        color: #fff;
        /* Defina a cor do texto para garantir a legibilidade */
        border-color: #28a745;
        /* Defina a cor da borda para combinar */
    }

    /* Estilo personalizado */
    .custom-btn-warning {
        background-color: #ffc107 !important;
        color: #fff !important;
        border-color: #ffc107 !important;
    }

    /* Sobrescrevendo a classe .btn-warning */
    .btn-warning {
        background-color: #ffc107 !important;
        /* Substitua pela cor desejada */
        color: #fff !important;
        /* Defina a cor do texto para garantir a legibilidade */
        border-color: #ffc107 !important;
        /* Defina a cor da borda para combinar */
    }

    /* Sobrescrevendo a classe .btn-warning */
    .btn-info {
        background-color: #0dcaf0 !important;
        /* Substitua pela cor desejada */
        color: #fff !important;
        /* Defina a cor do texto para garantir a legibilidade */
        border-color: #0dcaf0 !important;
        /* Defina a cor da borda para combinar */
    }

    /* Centralizar os títulos das colunas no jsGrid */
    .jsgrid-header-cell {
        text-align: center;
    }
</style>

<!-- Incluir o custom css -->
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight"><i class="fas fa-users"></i>
            {{ __('Clientes') }}
        </h2>
        <div class="col-sm-4">
            <div class="input-group">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-users"></i></span>
                <x-text-input class="form-control" type="text" value="Total de Clientes Cadastrados: " disabled />
                <span class="input-group-text" id="quantidadeClientes"></span>
            </div>
            <x-input-error :messages="$errors->get('quantidadeClientes')" class="mt-2" />
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 button-container row align-items-center">
                    <div class="col-md mb-2">
                        <button type="button" id="adicionarCliente" class="btn btn-primary w-100"
                            data-bs-toggle="modal" data-bs-target="#modalAdicionarEditarCliente">
                            <i class="fas fa-plus"></i> Adicionar Cliente
                        </button>
                    </div>
                    <div class="col-md mb-2">
                        <button type="button" id="buttonListarClientes" class="btn btn-info w-100">
                            <i class="fas fa-list-ul"></i> Listar todos os Clientes
                        </button>
                    </div>
                    <div class="col-md mb-2">
                        <button type="button" id="buttonLimparTabelaClientes" class="btn btn-info w-100">
                            <i class="fas fa-eraser"></i> Limpar Pesquisa
                        </button>
                    </div>
                    <div class="col-md-4 mb-4" style="margin-bottom: 30px !important">
                        <x-input-label for="pesquisquantidade" id="psesquisarClienteLabel" :value="__('Pesquisar Cliente')"
                            style="font-weight: bold;" />
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                            <x-text-input id="pesquisarCliente" class="form-control" type="text"
                                name="pesquisarCliente" :value="old('pesquisarCliente')" placeholder="Digite para pesquisar Cliente..."
                                required autofocus />
                        </div>
                        <x-input-error :messages="$errors->get('pesquisarCliente')" class="mt-2" />
                    </div>
                </div>
                <div id="loadingSpinner" class="text-center" style="display: none;">
                    <button class="btn btn-primary" type="button" disabled>
                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                        Carregando...
                    </button>
                </div>
            </div>


            {{-- trazendo o conteúdo da referida view --}}
            @include('components.tabelaCliente')
        </div>
    </div>


</x-app-layout>

<!-- Incluir o modal -->
@include('components.modalAdicionarEditarCliente')
@include('components.modalVisualizarCliente')
@include('components.modalConfirmacaoDeletarCliente')

<script>
    $(document).ready(function() {



        $("#spinnerListarTodosClientes").hide();
        var minimoDigitosPesquisar = 3;
        var adicionarSpinner = false;

        // button que aciona limpeza do grid de clientes
        $("#buttonLimparTabelaClientes").on("click", function() {
            // Limpa o conteúdo do jsGrid chamando a função de renderização com um array vazio
            renderJsGrid([]);
            $("#pesquisarCliente").val('');
        });

        $("#pesquisarCliente").on("input", function() {
            var dadoPesquisado = $(this).val();

            if (dadoPesquisado.length >= minimoDigitosPesquisar) {
                if (!adicionarSpinner) {
                    listarClientesAjax(dadoPesquisado);
                    adicionarSpinner = true;
                }
            } else {
                $("#spinnerPesquisarCliente").remove();
                adicionarSpinner = false;
                renderJsGrid([]);
            }
        });

        function listarClientesAjax(dadoPesquisado) {
            /* esta variável recebe as propriedades de um spinner de atualizando */
            var spinnerPesquisarCliente = `
                                     <div id="spinnerPesquisarCliente" class="text-center">
                                         <button class="btn btn-primary" type="button" disabled>
                                             <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                             Pesquisando...
                                         </button>
                                     </div>
                                 `;
            $("#jsGridClientes").prepend(spinnerPesquisarCliente);
            $.ajax({
                type: "GET",
                url: "/listarClientes",
                data: {
                    search: dadoPesquisado
                },
                dataType: "json",
                success: function(response) {
                    $("#spinnerPesquisarCliente").remove();
                    renderJsGrid(response);
                },
                error: function(error) {
                    console.error("Erro na pesquisa de clientes:", error);
                }
            });
        }

        // Função para renderizar o jsGrid
        function renderJsGrid(data) {
            $("#jsGridClientes").jsGrid({
                width: "100%",
                height: "350px",
                inserting: false,
                editing: false,
                sorting: true,
                paging: true,
                data: data,

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
                                title: "Clique para Visualizar todos os dados do Cliente."
                            });
                            var $iconEditar = $("<i>").attr({
                                class: "fas fa-edit",
                                title: "Clique para Editar qualquer dado do Cliente."
                            });
                            var $iconDeletar = $("<i>").attr({
                                class: "fas fa-trash",
                                title: "Clique para Deletar o Cliente."
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
                                            $("#modalVisualizarCliente").modal(
                                                "show");
                                            $("#loadingSpinner").hide();

                                            /* os dados trazidos na requisição GET colocandos nos inputs do modal visualizar */
                                            $("#visualizarNomeCliente").val(
                                                response.nomeCliente);
                                            $("#visualizarEstadoRgCliente").val(
                                                response.estadoRgCliente);
                                            $("#visualizarRgCliente").val(
                                                response.rgCliente);
                                            $("#visualizarCpfCliente").val(
                                                response.cpfCliente);
                                            $("#visualizarEmailCliente").val(
                                                response.emailCliente);
                                            var emailCliente = response
                                                .emailCliente;
                                            var linkParaEmail =
                                                'https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox?compose=new&to=' +
                                                encodeURIComponent(
                                                emailCliente);

                                            var linkHtml = '<a href="' +
                                                linkParaEmail +
                                                '" target="_blank" class="email-link"><span class="email-text purple-text"> - Abrir Gmail <i class="far fa-envelope"></i></span></a>';

                                            if ($(
                                                    "#visualizarEmailCliente .email-link")
                                                .length === 0) {
                                                $("#visualizarEmailCliente")
                                                    .append(linkHtml);
                                            }
                                            $("#visualizarCelularCliente").val(
                                                response.celularCliente);
                                            var celularCliente = response
                                                .celularCliente;
                                            var linkParaWhatsapp =
                                                'https://web.whatsapp.com/send?phone=' +
                                                celularCliente;

                                            var linkHtml = '<a href="' +
                                                linkParaWhatsapp +
                                                '" target="_blank">Celular - <span class="whatsapp-text .whatsapp-link">Abrir WhatsApp <i class="fab fa-whatsapp"></i></span></a>';

                                            $("#visualizarCelularWhatsappCliente")
                                                .html(linkHtml);

                                            $("#visualizarTelefoneCliente").val(
                                                response.telefoneCliente);
                                            $("#visualizarEnderecoCliente").val(
                                                response.enderecoCliente);
                                            $("#visualizarNumeroCliente").val(
                                                response.numeroCliente);
                                            $("#visualizarComplementoCliente")
                                                .val(response
                                                    .complementoCliente);
                                            $("#visualizarEstadoCliente").val(
                                                response.estadoCliente);
                                            $("#visualizarCidadeCliente").val(
                                                response.cidadeCliente);
                                            $("#visualizarUltimaAtualizacaoCliente")
                                                .val(formatarData(response
                                                    .updated_at));
                                            $("#visualizarDataCadastroCliente")
                                                .val(formatarData(response
                                                    .created_at));
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
                                                swal("Erro ao Exibir Cliente",
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
                                    console.log("Edit clicked for item:", item);

                                    var icon = '<i class="fas fa-user"></i>';
                                    var texto = "Editar dados do Cliente";
                                    $("#cabecalhoModalAdicionarEditarCliente").html(icon +
                                        " " + texto);
                                    $("#corCabecalhoModalAdicionarEditarCliente").css({
                                        "background-color": "#198754",
                                        "color": "white"
                                    });

                                    // Substituir o botão
                                    var botaoAtualizar =
                                        '<button type="button" class="btn btn-success btn-atualizar" id="atualizarCliente"><i class="fas fa-sync"></i> Atualizar</button>';
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

                                            /* os dados trazidos na requisição GET colocandos nos inputs do modal Adicionar / Editar */
                                            $("#nomeCliente").val(response
                                                .nomeCliente);
                                            var estadoRgCliente = $(
                                                    '#estadoRgCliente')[0]
                                                .selectize;
                                            estadoRgCliente.setValue(response
                                                .estadoRgCliente);
                                            $("#rgCliente").val(response
                                                .rgCliente);
                                            $("#cpfCliente").val(response
                                                .cpfCliente);
                                            $("#emailCliente").val(response
                                                .emailCliente);
                                            $("#celularCliente").val(response
                                                .celularCliente);
                                            $("#telefoneCliente").val(response
                                                .telefoneCliente);
                                            $("#enderecoCliente").val(response
                                                .enderecoCliente);
                                            $("#numeroCliente").val(response
                                                .numeroCliente);
                                            $("#complementoCliente").val(
                                                response.complementoCliente);
                                            var estadoCliente = $(
                                                    '#estadoCliente')[0]
                                                .selectize;
                                            estadoCliente.setValue(response
                                                .estadoCliente);
                                            var cidadeCliente = $(
                                                    '#cidadeCliente')[0]
                                                .selectize;
                                            cidadeCliente.setValue(response
                                                .cidadeCliente);
                                            $("#ultimaAtualizacaoCliente").val(
                                                formatarData(response
                                                    .updated_at));
                                            $("#dataCadastroCliente").val(
                                                formatarData(response
                                                    .created_at));

                                            $("#modalAdicionarEditarCliente")
                                                .modal("show");
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
                                                swal("Erro ao Exibir Cliente",
                                                    errorMessages, "error");
                                            } else {
                                                // Caso contrário, exiba uma mensagem genérica
                                                swal("Erro ao Exibir Cliente",
                                                    "Verifique sua conexão com a internet.",
                                                    "error");
                                            }
                                        }

                                    });

                                    $('#atualizarCliente').click(function(e) {
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
                                        $("#modalAdicionarEditarCliente .modal-body")
                                            .prepend(spinnerHtml);

                                        // Coleta dos valores dos campos e selects usando serializeArray
                                        var nomeCliente = $("#nomeCliente").val();
                                        var estadoRgCliente = $("#estadoRgCliente")
                                            .val();
                                        var rgCliente = $("#rgCliente").val();
                                        var cpfCliente = $("#cpfCliente").val();
                                        var emailCliente = $("#emailCliente").val();
                                        var celularCliente = $("#celularCliente")
                                            .val();
                                        var telefoneCliente = $("#telefoneCliente")
                                            .val();
                                        var enderecoCliente = $("#enderecoCliente")
                                            .val();
                                        var numeroCliente = $("#numeroCliente")
                                        .val();
                                        var complementoCliente = $(
                                            "#complementoCliente").val();
                                        var estadoCliente = $("#estadoCliente")
                                        .val();
                                        var cidadeCliente = $("#cidadeCliente")
                                        .val();

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
                                        let csrfToken = $('meta[name="csrf-token"]')
                                            .attr('content');

                                        $.ajax({
                                            type: "PUT",
                                            url: "/editarCliente/" + item
                                                .id,
                                            data: data,
                                            headers: {
                                                // Adicione o token CSRF ao cabeçalho da solicitação
                                                'X-CSRF-TOKEN': csrfToken
                                            },
                                            dataType: "json",
                                            success: function(response) {
                                                $("#modalAdicionarEditarCliente")
                                                    .modal('hide');
                                                $("#loadingSpinnerModal")
                                                    .remove();
                                                swal("Cliente Atualizado com Sucesso!",
                                                    "", "success");
                                                /* método que recarrega o grid de clientes, já atualizado */
                                                listarClientes();
                                            },
                                            error: function(xhr, status,
                                                error) {
                                                $("#loadingSpinnerModal")
                                                    .remove();

                                                // Se a resposta da API incluir mensagens de erro
                                                if (xhr.responseJSON &&
                                                    xhr.responseJSON
                                                    .errors) {
                                                    var errorMessages =
                                                        Object.values(
                                                            xhr
                                                            .responseJSON
                                                            .errors)
                                                        .join("\n");
                                                    swal("Erro ao Editar Cliente",
                                                        errorMessages,
                                                        "error");
                                                } else {
                                                    // Caso contrário, exiba uma mensagem genérica
                                                    swal("Erro ao Editar Cliente",
                                                        "Verifique sua conexão com a internet.",
                                                        "error");
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
                                     <div id="deletarSpinnerModal" class="text-center">
                                         <button class="btn btn-danger" type="button" disabled>
                                             <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                             Deletando...
                                         </button>
                                     </div>
                                 `;

                                        // insere o spinner dinamicamente dentro do body do modal visualizar
                                        $("#modalConfirmacaoDeletarCliente .modal-body")
                                            .prepend(spinnerHtml);

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
                                                $("#deletarSpinnerModal")
                                                    .remove();
                                                $("#modalConfirmacaoDeletarCliente")
                                                    .modal("hide");
                                                swal("Cliente Deletado com Sucesso!",
                                                    "", "success");
                                                listarClientes();
                                            },
                                            error: function(xhr, status,
                                                error) {
                                                $("#deletarSpinnerModal")
                                                    .remove();
                                                $("#modalConfirmacaoDeletarCliente")
                                                    .modal("hide");
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
            });
        }
    });



    /* ação click do button Adicionar Cliente */
    $('#adicionarCliente').click(function(e) {
        e.preventDefault();
        $('#modalAdicionarEditarCliente').on('hidden.bs.modal', function() {
            var botaoCadastrar =
                '<button type="button" class="btn btn-primary" id="cadastrarCliente"><i class="fas fa-check"></i> Cadastrar</button>';
            $("#cadastrarCliente").replaceWith(botaoCadastrar);
        });

        /* insere dinamicamente icon e text no header do modal AdicionarEditarCliente */
        var icon = '<i class="fas fa-user"></i>';
        var texto = "Cadastrar novo Cliente";
        $("#cabecalhoModalAdicionarEditarCliente").html(icon + " " + texto);
        $("#corCabecalhoModalAdicionarEditarCliente").css({
            "background-color": "#007bff",
            "color": "white"
        });

        /* POST função click que envia os dados do form #formAdicionarEditarCliente por ajax*/
        $("#cadastrarCliente").click(function(e) {
            e.preventDefault();

            /* esta variável recebe as propriedades de um spinner de atualizando */
            var spinnerHtml = `
             <div id="adicionarSpinnerModal" class="text-center">
                 <button class="btn btn-primary" type="button" disabled>
                     <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                     Adicionando...
                 </button>
             </div>
         `;

            // insere o spinner dinamicamente dentro do body do modal visualizar
            $("#modalAdicionarEditarCliente .modal-body").prepend(spinnerHtml);

            /* objeto vazio para receber os dados dos inputs do form #formAdicionarEditarCliente*/
            let $dadosCliente = {};

            // todos os dados do form são adicionados em um array um a um, em $dadosCliente
            $("#formAdicionarEditarCliente").serializeArray().forEach(function(field) {
                $dadosCliente[field.name] = field.value;
            });

            // Pegue o token CSRF da meta tag
            let csrfToken = $('meta[name="csrf-token"]').attr('content');

            /* $data recebe o conteudo de $dadosCliente no formato json string */
            let $data = JSON.stringify($dadosCliente);


            /* ajax POST adicionar novo cliente */
            $.ajax({
                type: "POST",
                url: "/adicionarCliente",
                data: $data,
                headers: {
                    // Adicione o token CSRF ao cabeçalho da solicitação
                    'X-CSRF-TOKEN': csrfToken
                },
                contentType: "application/json",
                dataType: "json",
                success: function(response) {
                    $("#adicionarSpinnerModal").remove();
                    $("#modalAdicionarEditarCliente").modal('hide');
                    // Exibir o SweetAlert de sucesso
                    swal("Cliente Adicionado com Sucesso!", "", "success");
                    /* método que recarrega o grid de clientes, já atualizado */
                    listarClientes();
                },
                error: function(xhr, status, error) {
                    $("#adicionarSpinnerModal").remove();

                    // Se a resposta da API incluir mensagens de erro
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        var errorMessages = Object.values(xhr.responseJSON.errors).join(
                            "\n");
                        swal("Erro ao Adicionar Cliente", errorMessages, "error");
                    } else {
                        // Caso contrário, exiba uma mensagem genérica
                        swal("Erro ao Adicionar Cliente",
                            "Verifique sua conexão com a internet.", "error");
                    }
                }
            });

        });

    });

    $("#buttonListarClientes").click(function(e) {
        e.preventDefault();
        $("#loadingSpinner").show();
        listarClientes();
    });
</script>

{{-- incluindo a biblioteca jsGrid após toda página ser carregada, evita o erro --}}
<script src="{{ asset('js/jsgrid.min.js') }}"></script>
