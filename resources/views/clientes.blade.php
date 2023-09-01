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

    .centered-switch {
  display: flex;
  justify-content: center;
  align-items: center;
 
}

.form-switch {
  display: inline-block;
  cursor: pointer;
  -webkit-tap-highlight-color: transparent;
}

.form-switch i {
  position: relative;
  display: inline-block;
  margin-right: .5rem;
  width: 46px;
  height: 26px;
  background-color: #e6e6e6;
  border-radius: 23px;
  vertical-align: text-bottom;
  transition: all 0.3s linear;
}

.form-switch i::before {
  content: "";
  position: absolute;
  left: 0;
  width: 42px;
  height: 22px;
  background-color: #fff;
  border-radius: 11px;
  transform: translate3d(2px, 2px, 0) scale3d(1, 1, 1);
  transition: all 0.25s linear;
}

.form-switch i::after {
  content: "";
  position: absolute;
  left: 0;
  width: 22px;
  height: 22px;
  background-color: #fff;
  border-radius: 11px;
  box-shadow: 0 2px 2px rgba(0, 0, 0, 0.24);
  transform: translate3d(2px, 2px, 0);
  transition: all 0.2s ease-in-out;
}

.form-switch:active i::after {
  width: 28px;
  transform: translate3d(2px, 2px, 0);
}

.form-switch:active input:checked + i::after {
  transform: translate3d(16px, 2px, 0);
}

.form-switch input {
  display: none;
}

.form-switch input:checked + i {
  background-color: #0dcaf0; 
}

.form-switch input:checked + i::before {
  transform: translate3d(18px, 2px, 0) scale3d(0, 0, 0);
}

.form-switch input:checked + i::after {
  transform: translate3d(22px, 2px, 0);
}

.form-switch input + i::before {
  left: 2px;
  background-color: #007bff; /* Azul */
}

</style>

<!-- Incluir o custom css -->
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-bottom: 6px"><i class="fas fa-users"></i>
            {{ __('Clientes') }}
        </h2>
        <div class="row">
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1" style="background-color: #0049b6"><i class="fas fa-users" style="color: white"></i></span>
                    <x-text-input class="form-control" type="text" value="Total de Clientes Cadastrados: " disabled style="background-color: #0049b6; color: white" />
                    <span class="input-group-text" id="quantidadeClientes" style="background-color: #0049b6; color: white"></span>
                </div>
                <x-input-error :messages="$errors->get('quantidadeClientes')" class="mt-2" />
            </div>
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1" style="background-color: #007bff"><i class="fas fa-user" style="width: 20px; color: white"></i></span>
                    <x-text-input class="form-control" type="text" value="Total de Clientes Pessoa Física: " disabled style="background-color: #007bff; color: white" />
                    <span class="input-group-text" id="quantidadeClientesPessoaFisica" style="background-color: #007bff; color: white"></span>
                </div>
                <x-input-error :messages="$errors->get('quantidadeClientesPessoaFisica')" class="mt-2" />
            </div>
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1" style="background-color: #0dcaf0; color: white"><i class="fas fa-building" style="width: 20px"></i></span>
                    <x-text-input class="form-control" type="text" style="background-color: #0dcaf0; color: white" value="Total de Clientes Pessoa Jurídica: " disabled />
                    <span class="input-group-text" id="quantidadeClientesPessoaJuridica" style="background-color: #0dcaf0; color: white"></span>
                </div>
                <x-input-error :messages="$errors->get('quantidadeClientesPessoaJuridica')" class="mt-2" />
            </div>
        </div>
    </x-slot>

    <div class="centered-switch" style="margin: 5px">
        <label class="form-switch">
            <span class="switch-label">Pessoa Física</span>
            <input type="checkbox" class="apple-switch-checkbox" id="appleSwitch">
            <i></i>
            <span class="switch-label">Pessoa Jurídica</span>
        </label>
    </div>

    <div class="py-1">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-1">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" id="areaClientePessoaFisica">
                <div class="p-6 bg-white border-b border-gray-200 button-container row align-items-center">
                    <h2>Pessoa Física</h2>
                    <div class="col-md mb-2">
                        <button type="button" id="adicionarCliente" class="btn btn-primary w-100"
                            data-bs-toggle="modal" data-bs-target="#modalAdicionarEditarCliente">
                            <i class="fas fa-plus"></i> Adicionar Cliente
                        </button>
                    </div>
                    <div class="col-md mb-2">
                        <button type="button" id="buttonListarClientes" class="btn btn-primary w-100">
                            <i class="fas fa-list-ul"></i> Listar todos os Clientes
                        </button>
                    </div>
                    <div class="col-md mb-2">
                        <button type="button" id="buttonLimparTabelaClientes" class="btn btn-primary w-100">
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

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" id="areaClientePessoaJuridica" style="display: none">
                <div class="p-6 bg-white border-b border-gray-200 button-container row align-items-center">
                    <h2>Pessoa Jurídica</h2>
                    <div class="col-md mb-2">
                        <button type="button" id="adicionarClientePessoaJuridica" class="btn btn-info w-100"
                            data-bs-toggle="modal" data-bs-target="#modalAdicionarEditarClientePessoaJuridica">
                            <i class="fas fa-plus"></i> Adicionar Cliente
                        </button>
                    </div>
                    <div class="col-md mb-2">
                        <button type="button" id="buttonListarClientesPessoaJuridica" class="btn btn-info w-100">
                            <i class="fas fa-list-ul"></i> Listar todos os Clientes
                        </button>
                    </div>
                    <div class="col-md mb-2">
                        <button type="button" id="buttonLimparTabelaClientesPessoaJuridica" class="btn btn-info w-100">
                            <i class="fas fa-eraser"></i> Limpar Pesquisa
                        </button>
                    </div>
                    <div class="col-md-4 mb-4" style="margin-bottom: 30px !important">
                        <x-input-label for="pesquisquantidade" id="psesquisarClienteLabel" :value="__('Pesquisar Cliente')"
                            style="font-weight: bold;" />
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                            <x-text-input id="pesquisarClientePessoaJuridica" class="form-control" type="text"
                                name="pesquisarClientePessoaJuridica" :value="old('pesquisarClientePessoaJuridica')" placeholder="Digite para pesquisar Cliente..."
                                required autofocus />
                        </div>
                        <x-input-error :messages="$errors->get('pesquisarClientePessoaJuridica')" class="mt-2" />
                    </div>
                </div>
                <div id="loadingSpinnerPessoaJuridica" class="text-center" style="display: none;">
                    <button class="btn btn-info" type="button" disabled>
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
@include('components.modalEditarCliente')
@include('components.modalVisualizarCliente')
@include('components.modalConfirmacaoDeletarCliente')
@include('components.modalAdicionarEditarClientePessoaJuridica')
@include('components.modalEditarClientePessoaJuridica')
@include('components.modalVisualizarClientePessoaJuridica')
@include('components.modalConfirmacaoDeletarClientePessoaJuridica')

<script>
    $(document).ready(function() {

        $('#appleSwitch').change(function () {
            if ($(this).is(':checked')) {
                $('#areaClientePessoaFisica').hide();
                $('#areaClientePessoaJuridica').show();
                renderJsGridCliente([]);
                $("#pesquisarCliente").val('');
                $("#jsGridClientes").hide();
                $("#jsGridClientesPessoaJuridica").show();
            } else {
                $('#areaClientePessoaFisica').show();
                $('#areaClientePessoaJuridica').hide();
                renderJsGridClientePessoaJuridica([]);
                $("#pesquisarClientePessoaJuridica").val('');
                $("#jsGridClientesPessoaJuridica").hide();
                $("#jsGridClientes").show();
            }
        });

        /* ------------------------------------------------------------------------------------------------------------------------------ */
        /* ------------------------------------------------------------------------------------------------------------------------------ */
        /* INICIO AREA CLIENTE PESSOA FÍSICA*/

        $("#spinnerListarTodosClientes").hide();
        var minimoDigitosPesquisar = 3;
        var adicionarSpinner = false;

        // button que aciona limpeza do grid de clientes
        $("#buttonLimparTabelaClientes").on("click", function() {
            // Limpa o conteúdo do jsGrid chamando a função de renderização com um array vazio
            renderJsGridCliente([]);
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
                renderJsGridCliente([]);
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
                    renderJsGridCliente(response);
                },
                error: function(error) {
                    console.error("Erro na pesquisa de clientes:", error);
                }
            });
        }

        // Função para renderizar o jsGrid
        function renderJsGridCliente(data) {
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
                                    
                                    /* var icon = '<i class="fas fa-user"></i>';
                                    var texto = "Editar dados do Cliente";
                                    $("#cabecalhoModalAdicionarEditarCliente").html(icon +
                                        " " + texto);
                                    $("#corCabecalhoModalAdicionarEditarCliente").css({
                                        "background-color": "#198754",
                                        "color": "white"
                                    }); */

                                    // Substituir o botão
                                    /* var botaoAtualizar =
                                    '<button type="button" class="btn btn-success btn-atualizar" id="atualizarCliente"><i class="fas fa-sync"></i> Atualizar</button>';
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

                                    $('#editarCliente').click(function(e) {
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
                                        let csrfToken = $('meta[name="csrf-token"]')
                                            .attr('content');

                                        $.ajax({
                                            type: "PUT",
                                            url: "/editarCliente/" + item.id,
                                            data: data,
                                            headers: {
                                                // Adicione o token CSRF ao cabeçalho da solicitação
                                                'X-CSRF-TOKEN': csrfToken
                                            },
                                            dataType: "json",
                                            success: function(response) {
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
            });
        }
        /* FIM AREA CLIENTE PESSOA FISICA*/
/* ------------------------------------------------------------------------------------------------------- */
/* ------------------------------------------------------------------------------------------------------- */


/* ------------------------------------------------------------------------------------------------------- */        
/* ------------------------------------------------------------------------------------------------------- */        
/* INICIO AREA CLIENTE PESSOA JURIDICA*/

$("#spinnerListarTodosClientesPessoaJuridica").hide();
        var minimoDigitosPesquisar = 3;
        var adicionarSpinner = false;

        // button que aciona limpeza do grid de clientes
        $("#buttonLimparTabelaClientesPessoaJuridica").on("click", function() {
            // Limpa o conteúdo do jsGrid chamando a função de renderização com um array vazio
            renderJsGridClientePessoaJuridica([]);
            $("#pesquisarClientePessoaJuridica").val('');
        });

        $("#pesquisarClientePessoaJuridica").on("input", function() {
            var dadoPesquisado = $(this).val();

            if (dadoPesquisado.length >= minimoDigitosPesquisar) {
                if (!adicionarSpinner) {
                    listarClientesPessoaJuridicaAjax(dadoPesquisado);
                    adicionarSpinner = true;
                }
            } else {
                $("#spinnerPesquisarClientePessoaJuridica").remove();
                adicionarSpinner = false;
                renderJsGridClientePessoaJuridica([]);
            }
        });

        function listarClientesPessoaJuridicaAjax(dadoPesquisado) {
            /* esta variável recebe as propriedades de um spinner de atualizando */
            var spinnerPesquisarClientePessoaJuridica = `
                                     <div id="spinnerPesquisarCliente" class="text-center">
                                         <button class="btn btn-info" type="button" disabled>
                                             <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                             Pesquisando...
                                         </button>
                                     </div>
                                 `;
                                 
            $("#jsGridClientesPessoaJuridica").prepend(spinnerPesquisarClientePessoaJuridica);
            $.ajax({
                type: "GET",
                url: "/listarClientesPessoaJuridica",
                data: {
                    search: dadoPesquisado
                },
                dataType: "json",
                success: function(response) {
                    $("#spinnerPesquisarClientePessoaJuridica").remove();
                    renderJsGridClientePessoaJuridica(response);
                },
                error: function(error) {
                    console.error("Erro na pesquisa de clientes:", error);
                }
            });
        }

        // Função para renderizar o jsGrid
        function renderJsGridClientePessoaJuridica(data) {
            $("#jsGridClientesPessoaJuridica").jsGrid({
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

                                    $("#loadingSpinnerPessoaJuridica").show();

                                    $.ajax({
                                        type: "GET",
                                        url: "/visualizarClientePessoaJuridica/" + item.id,
                                        data: "data",
                                        dataType: "json",
                                        success: function(response) {
                                            $("#loadingSpinnerPessoaJuridica").hide();

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

                                    /* var icon = '<i class="fas fa-user"></i>';
                                    var texto = "Editar dados do Cliente";
                                    $("#cabecalhoModalAdicionarEditarClientePessoaJuridica").html(icon + " " + texto);
                                    $("#corCabecalhoModalAdicionarEditarClientePessoaJuridica").css({
                                        "background-color": "#198754",
                                        "color": "white"
                                    }); */

                                    // Substituir o botão
                                    /* var botaoAtualizar =
                                        '<button type="button" class="btn btn-success btn-atualizar" id="atualizarClientePessoaJuridica"><i class="fas fa-sync"></i> Atualizar</button>';
                                    $("#cadastrarClientePessoaJuridica").replaceWith(botaoAtualizar); */
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
                                            var ufEditar = $('#ufEditar')[0].selectize;
                                                ufEditar.setValue(response.uf);
                                            var municipioEditar = $('#municipioEditar')[0].selectize;
                                                municipioEditar.setValue(response.municipio);

                                            $("#modalEditarClientePessoaJuridica").modal("show");
                                            $("#loadingSpinnerPessoaJuridica").hide();
                                            },
                                        error: function(xhr, status, error) {
                                            $("#loadingSpinnerPessoaJuridica").remove();

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

                                    $('#editarClientePessoaJuridica').click(function(e) {
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
                                            url: "/editarClientePessoaJuridica/" + item
                                                .id,
                                            data: data,
                                            headers: {
                                                // Adicione o token CSRF ao cabeçalho da solicitação
                                                'X-CSRF-TOKEN': csrfToken
                                            },
                                            dataType: "json",
                                            success: function(response) {
                                                $("#modalEditarClientePessoaJuridica").modal('hide');
                                                restaurarBotaoAtualizarClientePessoaJuridica();
                                                swal("Cliente Atualizado com Sucesso!", "", "success");
                                                /* método que recarrega o grid de clientes, já atualizado */
                                                listarClientesPessoaJuridica();
                                            },
                                            error: function(xhr, status, error) {
                                                restaurarBotaoAtualizarClientePessoaJuridica();

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
                                    "data-bs-target": "#modalConfirmacaoDeletarClientePessoaJuridica"
                                })
                                .click(function(e) {
                                    e.stopPropagation();
                                   
                                    $("#buttonDeletarClientePessoaJuridica").click(function(e) {
                                        e.preventDefault();

                                        /* esta variável recebe as propriedades de um spinner de atualizando */
                                        var spinnerHtml = `
                                     <div id="adicionarSpinnerModalDeletarPessoaJuridica" class="text-center">
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
                                            var atualizarButton = $("<button type='button' class='btn btn-danger' id='buttonDeletarClientePessoaJuridica' title='Clique para deletar'><i class='fas fa-trash'></i> Deletar</button>");
                                            $("#adicionarSpinnerModalDeletarPessoaJuridica").replaceWith(atualizarButton);
                                        }

                                        // Pegue o token CSRF da meta tag
                                        let csrfToken = $('meta[name="csrf-token"]')
                                            .attr('content');
                                        $.ajax({
                                            type: "DELETE",
                                            url: "/deletarClientePessoaJuridica/" + item
                                                .id,
                                            data: "data",
                                            headers: {
                                                // Adicione o token CSRF ao cabeçalho da solicitação
                                                'X-CSRF-TOKEN': csrfToken
                                            },
                                            dataType: "json",
                                            success: function(response) {
                                                $("#modalConfirmacaoDeletarClientePessoaJuridica").modal("hide");
                                                restaurarBotaoDeletarClientePessoaJuridica();
                                                swal("Cliente Deletado com Sucesso!", "", "success");
                                                listarClientesPessoaJuridica();
                                            },
                                            error: function(xhr, status, error) {
                                                $("#modalConfirmacaoDeletarClientePessoaJuridica").modal("hide");
                                                restaurarBotaoDeletarClientePessoaJuridica();
                                                // Exibir o SweetAlert de erro
                                                swal("Erro ao Deletar Cliente",
                                                    "Verifique sua conexão com a internet.", "error");
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

/* FIM AREA CLIENTE PESSOA JURIDICA*/
/* ------------------------------------------------------------------------------------------------------- */        
/* ------------------------------------------------------------------------------------------------------- */  

});



/* INICIO AREA CLIENTE PESSOA FÍSICA BUG MODAL ADICIONAR*/
/* ------------------------------------------------------------------------------------------------------- */        
/* ------------------------------------------------------------------------------------------------------- */ 

/* ao fechar este modal, o button que estava com verde editar, volta ao azul de cadastrar */
$('#modalAdicionarEditarCliente').on('hidden.bs.modal', function() {
    limparInputsModalAdicionarEditarCliente(); 
    var botaoCadastrarClientePessoaFisica =
    '<button type="button" class="btn btn-primary" id="cadastrarCliente"><i class="fas fa-check"></i> Cadastrar</button>';
    $("#atualizarCliente").replaceWith(botaoCadastrarClientePessoaFisica);
});

/* ação click do button Adicionar Cliente */
    $('#adicionarCliente').click(function(e) {
        e.preventDefault();

        function restaurar() {
    var button = $("<button type='button' class='btn btn-primary' id='adicionarCliente' title='Clique para adicionar'><i class='fas fa-check'></i> Cadastrar</button>");
    $("#atualizarCliente").replaceWith(button);
}
restaurar();


        /* insere dinamicamente icon e text no header do modal AdicionarEditarCliente */
        var icon = '<i class="fas fa-user"></i>';
        var texto = "Cadastrar novo Cliente";
        $("#cabecalhoModalAdicionarEditarCliente").html(icon + " " + texto);
        $("#corCabecalhoModalAdicionarEditarCliente").css({
            "background-color": "#007bff",
            "color": "white"
        });

        var minimoDigitosPesquisar = 8; // Defina o número mínimo de dígitos para a pesquisa
    var adicionarSpinner = false;

    /* metódo que captura os dados digitados no input de cepCliente */
    $("#pesquisarCepCliente").on("input", function() {
        var dadoPesquisado = $(this).val();
        

        if (dadoPesquisado.length >= minimoDigitosPesquisar) {
            if (!adicionarSpinner) {
                listarCepViaCEP(dadoPesquisado);
                adicionarSpinner = true;
            }
        } else {
            $("#spinnerPesquisarCepCliente").remove();
            adicionarSpinner = false;
            // Limpe ou atualize a área de resultados, se necessário
        }
    });

    /* método que chama o spinner e em seguida faz a requisição GET no via CEP e traz os dados para os respectivos inputs */
    function listarCepViaCEP(dadoPesquisado) {
        /* Código do spinner */
        var spinnerPesquisarCepCliente = `
            <div id="spinnerPesquisarCepCliente" class="text-center">
                <button class="btn btn-primary" type="button" disabled>
                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                    Pesquisando...
                </button>
            </div>
        `;
        $("#resultadoPesquisaCep").html(spinnerPesquisarCepCliente);
        

        // Realize a consulta na API do ViaCEP
        $.ajax({
            type: "GET",
            url: "https://viacep.com.br/ws/" + dadoPesquisado + "/json/",
            dataType: "json",
            success: function(response) {
                $("#spinnerPesquisarCepCliente").remove();
                console.log(response);
                $("#enderecoCliente").val(response.logradouro);
                // Atualize o valor selecionado para o estado
                var estadoSelectize = $("#estadoCliente")[0].selectize;
                estadoSelectize.setValue(response.uf, true);

                // Atualize o valor selecionado para a cidade
                var cidadeSelectize = $("#cidadeCliente")[0].selectize;
                cidadeSelectize.setValue(response.localidade, true);
            },
            error: function(error) {
                console.error("Erro na pesquisa de CEP:", error);
            }
        });
    }


        /* POST função click que envia os dados do form #formAdicionarEditarCliente por ajax*/
        $("#cadastrarCliente").click(function(e) {
            e.preventDefault();

            /* esta variável recebe as propriedades de um spinner de atualizando */
            var spinnerHtml = `
             <div id="adicionarSpinnerModalAdicionarEditarCliente" class="text-center">
                 <button class="btn btn-primary" type="button" disabled>
                     <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                     Adicionando...
                 </button>
             </div>
         `;

          // Função para mostrar o spinner no lugar do botão "Cadastrar"
function mostrarSpinner() {
    var spinnerButton = $(spinnerHtml);
    $("#cadastrarCliente").replaceWith(spinnerButton);
}
mostrarSpinner();

// Função para restaurar o botão "Cadastrar" no lugar do spinner
function restaurarBotaoCadastrarCliente() {
    var cadastrarButton = $("<button type='button' class='btn btn-primary' id='cadastrarCliente' title='Clique para salvar'><i class='fas fa-check'></i> Cadastrar</button>");
    $("#adicionarSpinnerModalAdicionarEditarCliente").replaceWith(cadastrarButton);
}


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
                    $("#modalAdicionarEditarCliente").modal('hide');
                    restaurarBotaoCadastrarCliente();
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

    /* FIM AREA CLIENTE PESSOA FISICA BUG MODAL ADICONAR*/
/* ------------------------------------------------------------------------------------------------------- */        
/* ------------------------------------------------------------------------------------------------------- */ 


/* INICIO AREA CLIENTE PESSOA JURÍDICA BUG MODAL ADICIONAR*/
/* ------------------------------------------------------------------------------------------------------- */        
/* ------------------------------------------------------------------------------------------------------- */  
    /* ação click do button Adicionar Cliente */
    $('#adicionarClientePessoaJuridica').click(function(e) {
        e.preventDefault();
        $('#modalAdicionarEditarClientePessoaJuridica').on('hidden.bs.modal', function() {
            var botaoCadastrar =
                '<button type="button" class="btn btn-primary" id="cadastrarClientePessoaJuridica"><i class="fas fa-check"></i> Cadastrar</button>';
            $("#cadastrarClientePessoaJuridica").replaceWith(botaoCadastrar);
        });

        /* insere dinamicamente icon e text no header do modal AdicionarEditarCliente */
        var icon = '<i class="fas fa-user"></i>';
        var texto = "Cadastrar novo Cliente";
        $("#cabecalhoModalAdicionarEditarClientePessoaJuridica").html(icon + " " + texto);
        $("#corCabecalhoModalAdicionarEditarClientePessoaJuridica").css({
            "background-color": "#007bff",
            "color": "white"
        });

        var minimoDigitosPesquisar = 8; // Defina o número mínimo de dígitos para a pesquisa
    var adicionarSpinner = false;

    /* metódo que captura os dados digitados no input de cepCliente */
    $("#pesquisarCepClientePessoaJuridica").on("input", function() {
        var dadoPesquisado = $(this).val();
        

        if (dadoPesquisado.length >= minimoDigitosPesquisar) {
            if (!adicionarSpinner) {
                listarCepViaCEPPessoaJuridica(dadoPesquisado);
                adicionarSpinner = true;
            }
        } else {
            $("#spinnerPesquisarCepCliente").remove();
            adicionarSpinner = false;
            // Limpe ou atualize a área de resultados, se necessário
        }
    });

    /* método que chama o spinner e em seguida faz a requisição GET no via CEP e traz os dados para os respectivos inputs */
    function listarCepViaCEPPessoaJuridica(dadoPesquisado) {
        /* Código do spinner */
        var spinnerPesquisarCepClientePessoaJuridica = `
            <div id="spinnerPesquisarCepClientePessoaJuridica" class="text-center">
                <button class="btn btn-primary" type="button" disabled>
                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                    Pesquisando...
                </button>
            </div>
        `;
        $("#resultadoPesquisaCepPessoaJuridica").html(spinnerPesquisarCepClientePessoaJuridica);
        

        // Realize a consulta na API do ViaCEP
        $.ajax({
            type: "GET",
            url: "https://viacep.com.br/ws/" + dadoPesquisado + "/json/",
            dataType: "json",
            success: function(response) {
                $("#spinnerPesquisarCepClientePessoaJuridica").remove();
                console.log(response);
                $("#logradouro").val(response.logradouro);
                // Atualize o valor selecionado para o estado
                var estadoSelectize = $("#uf")[0].selectize;
                estadoSelectize.setValue(response.uf, true);

                // Atualize o valor selecionado para a cidade
                var cidadeSelectize = $("#municipio")[0].selectize;
                cidadeSelectize.setValue(response.localidade, true);
            },
            error: function(error) {
                console.error("Erro na pesquisa de CEP:", error);
            }
        });
    }

    /* metódo que captura os dados digitados no input de cepCliente */
    $("#pesquisarCnpjClientePessoaJuridica").on("input", function() {
        var dadoPesquisado = $(this).val();
        var numeroSomente = dadoPesquisado.replace(/\D/g, '');
        console.log(numeroSomente);

       // if (numeroSomente.length >= minimoDigitosPesquisar) {
       //     if (!adicionarSpinner) {
              listarCnpjPessoaJuridica(numeroSomente);
       //         adicionarSpinner = true;
       //     }
       // } else {
       //     $("#spinnerPesquisarCepCliente").remove();
       //     adicionarSpinner = false;
       //     // Limpe ou atualize a área de resultados, se necessário
       // }
    });
    /* método que chama o spinner e em seguida faz a requisição GET no via CEP e traz os dados para os respectivos inputs */
    function listarCnpjPessoaJuridica(numeroSomente) {
        /* Código do spinner */
        /* var spinnerPesquisarCepClientePessoaJuridica = `
            <div id="spinnerPesquisarCepClientePessoaJuridica" class="text-center">
                <button class="btn btn-primary" type="button" disabled>
                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                    Pesquisando...
                </button>
            </div>
        `;
        $("#resultadoPesquisaCepPessoaJuridica").html(spinnerPesquisarCepClientePessoaJuridica); */

        //função que formata e trata o response.endereco.municipio antes de inserir no sellect
        function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1).toLowerCase();
}

        // Realize a consulta na API do ViaCEP
        $.ajax({
            type: "GET",
            url: "https://api.cnpjs.dev/v1/" + numeroSomente,
            dataType: "json",
            success: function(response) {
                console.log(response);
                $("#spinnerPesquisarCepClientePessoaJuridica").remove();
                console.log(response);
                $("#nomeFantasia").val(response.nome_fantasia);
                $("#razaoSocial").val(response.razao_social);
                $("#cnpj").val(response.cnpj);
                $("#status").val(response.situacao_cadastral);
                $("#dataAbertura").val(response.data_inicio_atividade);
                $("#cnaePrincipalDescricao").val(response.cnae_fiscal_principal.nome);
                $("#cnaePrincipalCodigo").val(response.cnae_fiscal_principal.codigo);
                $("#email").val(response.email);
                $("#telefone").val(response.telefone1);
                $("#pesquisarCepClientePessoaJuridica").val(response.endereco.cep);
                $("#logradouro").val(response.endereco.logradouro);
                $("#numero").val(response.endereco.numero);
                $("#complemento").val(response.endereco.complemento);

                // Atualize o valor selecionado para o estado
                var estadoSelectize = $("#uf")[0].selectize;
                estadoSelectize.setValue(response.endereco.uf, true);

                 // Formate o nome da cidade antes de inseri-lo no campo select
                 var formattedCidade = capitalizeFirstLetter(response.endereco.municipio);

// Atualize o valor selecionado para a cidade
var cidadeSelectize = $("#municipio")[0].selectize;
cidadeSelectize.setValue(formattedCidade, true);
            },
            error: function(error) {
                console.error("Erro na pesquisa de CEP:", error);
            }
        });
    }


        /* POST função click que envia os dados do form #formAdicionarEditarCliente por ajax*/
        $("#cadastrarClientePessoaJuridica").click(function(e) {
            e.preventDefault();

            /* esta variável recebe as propriedades de um spinner de atualizando */
            var spinnerHtml = `
             <div id="adicionarSpinnerModalAdicionarEditarPessoaJuridica" class="text-center">
                 <button class="btn btn-primary" type="button" disabled>
                     <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                     Adicionando...
                 </button>
             </div>
         `;

         // Função para mostrar o spinner no lugar do botão "Cadastrar"
function mostrarSpinner() {
    var spinnerButton = $(spinnerHtml);
    $("#cadastrarClientePessoaJuridica").replaceWith(spinnerButton);
}
mostrarSpinner();

// Função para restaurar o botão "Cadastrar" no lugar do spinner
function restaurarBotaoCadastrar() {
    var cadastrarButton = $("<button type='button' class='btn btn-primary' id='cadastrarClientePessoaJuridica' title='Clique para salvar'><i class='fas fa-check'></i> Cadastrar</button>");
    $("#adicionarSpinnerModalAdicionarEditarPessoaJuridica").replaceWith(cadastrarButton);
}


            /* objeto vazio para receber os dados dos inputs do form #formAdicionarEditarCliente*/
            let $dadosClientePessoaJuridica = {};

            // todos os dados do form são adicionados em um array um a um, em $dadosCliente
            $("#formAdicionarEditarClientePessoaJuridica").serializeArray().forEach(function(field) {
                $dadosClientePessoaJuridica[field.name] = field.value;
            });

            // Pegue o token CSRF da meta tag
            let csrfToken = $('meta[name="csrf-token"]').attr('content');

            /* $data recebe o conteudo de $dadosCliente no formato json string */
            let $data = JSON.stringify($dadosClientePessoaJuridica);


            /* ajax POST adicionar novo cliente */
            $.ajax({
                type: "POST",
                url: "/adicionarClientePessoaJuridica",
                data: $data,
                headers: {
                    // Adicione o token CSRF ao cabeçalho da solicitação
                    'X-CSRF-TOKEN': csrfToken
                },
                contentType: "application/json",
                dataType: "json",
                success: function(response) {
                    $("#modalAdicionarEditarClientePessoaJuridica").modal('hide');
                    restaurarBotaoCadastrar();
                    // Exibir o SweetAlert de sucesso
                    swal("Cliente Adicionado com Sucesso!", "", "success");
                    /* método que recarrega o grid de clientes, já atualizado */
                    listarClientesPessoaJuridica();
                },
                error: function(xhr, status, error) {
                    restaurarBotaoCadastrar();

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

    /* FIM AREA CLIENTE PESSOA JURÍDICA BUG MODAL ADICONAR*/
/* ------------------------------------------------------------------------------------------------------- */        
/* ------------------------------------------------------------------------------------------------------- */

    

    $("#buttonListarClientes").click(function(e) {
        e.preventDefault();
        $("#loadingSpinner").show();
        listarClientes();
    });
    $("#buttonListarClientesPessoaJuridica").click(function(e) {
        e.preventDefault();
        $("#loadingSpinnerPessoaJuridica").show();
        listarClientesPessoaJuridica();
    });
</script>

{{-- incluindo a biblioteca jsGrid após toda página ser carregada, evita o erro --}}
<script src="{{ asset('js/jsgrid.min.js') }}"></script>
