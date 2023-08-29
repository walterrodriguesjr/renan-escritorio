<div class="modal fade" id="modalAdicionarEditarCliente" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header corCabecalhoModalAdicionarEditarCliente" id="corCabecalhoModalAdicionarEditarCliente">
                <h5 style="color: white" class="modal-title" id="cabecalhoModalAdicionarEditarCliente"><i class="fas fa-user"></i> Cadastrar dados do Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" id="formAdicionarEditarCliente">
                    @csrf

                    <!-- tag de dados pessoais -->
                    <div class="mb-3">
                        <h1 class="d-flex align-items-center justify-content-center" style="background-color: rgb(240, 240, 240)">DADOS PESSOAIS</h1>
                    </div>

                    <div>
                        <x-input-label for="nomeCliente" :value="__('Nome Completo')" />
                        <x-text-input id="nomeCliente" class="block mt-1 w-full" type="text" name="nomeCliente"
                            :value="old('nomeCliente')" placeholder="Digite" required autofocus />
                        <x-input-error :messages="$errors->get('nomeCliente')" class="mt-2" />
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="estadoRgCliente" :value="__('Estado do RG')" />
                                <select id="estadoRgCliente" name="estadoRgCliente"
                                    class="block mt-1 w-full shadow-sm border-gray-300 rounded-md" required autofocus>

                                </select>
                                <x-input-error :messages="$errors->get('estadoRgCliente')" class="mt-2" />
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="rgCliente" :value="__('RG')" />
                                <x-text-input id="rgCliente" class="block mt-1 w-full" type="number" name="rgCliente"
                                    :value="old('rgCliente')" placeholder="Digite" required autofocus />
                                <x-input-error :messages="$errors->get('rgCliente')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="cpfCliente" :value="__('CPF')" />
                                <x-text-input id="cpfCliente" class="block mt-1 w-full" type="text" name="cpfCliente"
                                    :value="old('cpfCliente')" placeholder="Digite" required autofocus />
                                <x-input-error :messages="$errors->get('cpfCliente')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <br>

                    <!-- tag de contatos -->
                    <div class="mb-2">
                        <h1 class="d-flex align-items-center justify-content-center" style="background-color: rgb(240, 240, 240)">CONTATOS</h1>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="emailCliente" :value="__('E-mail')" />
                                <x-text-input id="emailCliente" class="block mt-1 w-full" type="email"
                                    name="emailCliente" :value="old('emailCliente')" placeholder="Digite" required autofocus />
                                <x-input-error :messages="$errors->get('emailCliente')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="celularCliente" :value="__('Celular')" />
                                <x-text-input id="celularCliente" class="block mt-1 w-full" type="text"
                                    name="celularCliente" :value="old('celularCliente')" placeholder="Digite" autofocus />
                                <x-input-error :messages="$errors->get('celularCliente')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="telefoneCliente" :value="__('Telefone')" />
                                <x-text-input id="telefoneCliente" class="block mt-1 w-full" type="text"
                                    name="telefoneCliente" :value="old('telefoneCliente')" placeholder="Digite" autofocus />
                                <x-input-error :messages="$errors->get('telefoneCliente')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <br>

                    <!-- tag de endereços -->
                    <div class="mb-2">
                        <h1 class="d-flex align-items-center justify-content-center" style="background-color: rgb(240, 240, 240)">ENDEREÇOS</h1>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-5">
                            <div class="mt-2">
                            <x-input-label for="pesquisarCepCliente" id="pesquisarCepClienteLabel" :value="__('Pesquisar CEP')"
                                style="font-weight: bold;" />
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                                <x-text-input id="pesquisarCepCliente" class="form-control" type="text"
                                 :value="old('pesquisarCepCliente')" placeholder="Digite para pesquisar o CEP"
                                     autofocus />
                            </div>
                          
                        </div>
                    </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-8">
                            <div class="mt-2">
                                <x-input-label for="enderecoCliente" :value="__('Endereço')" />
                                <x-text-input id="enderecoCliente" class="block mt-1 w-full" type="text"
                                    name="enderecoCliente" :value="old('enderecoCliente')" placeholder="Digite" autofocus />
                                <x-input-error :messages="$errors->get('enderecoCliente')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mt-2">
                                <x-input-label for="numeroCliente" :value="__('Número')" />
                                <x-text-input id="numeroCliente" class="block mt-1 w-full" type="number"
                                    name="numeroCliente" :value="old('numeroCliente')" placeholder="Digite" autofocus />
                                <x-input-error :messages="$errors->get('numeroCliente')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mt-2">
                                <x-input-label for="complementoCliente" :value="__('Complemento')" />
                                <x-text-input id="complementoCliente" class="block mt-1 w-full" type="text"
                                    name="complementoCliente" :value="old('complementoCliente')" placeholder="Digite" autofocus />
                                <x-input-error :messages="$errors->get('complementoCliente')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <!-- Select de Estado -->
                            <div class="mt-2">
                                <x-input-label for="estadoCliente" :value="__('Estado')" />
                                <select id="estadoCliente" class="form-select" name="estadoCliente" autofocus>
                                    
                                </select>
                                {{-- <x-input-error :messages="$errors->get('estadoCliente')" class="mt-2" /> --}}
                            </div>
                        </div>

                        <div class="col-md-8">
                            <!-- Select de Cidade -->
                            <div class="mt-2">
                                <x-input-label for="cidadeCliente" :value="__('Cidade')" />
                                <select id="cidadeCliente" class="form-select" name="cidadeCliente" autofocus>

                                </select>
                                <x-input-error :messages="$errors->get('cidadeCliente')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Clique para fechar este formulário"><i class="fas fa-times"></i> Fechar</button>
                <button type="button" class="btn btn-primary" id="cadastrarCliente" title="Clique para salvar"><i class="fas fa-check"></i> Cadastrar</button>
            </div>
        </div>
    </div>
</div>

{{-- <div id="loadingSpinner" class="text-center">
    <button class="btn btn-primary" type="button" disabled>
        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
        Carregando...
    </button>
</div> --}}

{{-- incluindo o jquery nesta view --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- incluindo o input masc nesta view --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>

{{-- inclui o sweet alert nesta view --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


{{-- inclui o selectize nesta view --}}
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.bootstrap4.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js"></script>

<script>

$('#nomeCliente').on('input', function() {
        var inputVal = $(this).val();
        var words = inputVal.toLowerCase().split(' ');
        for (var i = 0; i < words.length; i++) {
            words[i] = words[i].charAt(0).toUpperCase() + words[i].substring(1);
        }
        var formattedVal = words.join(' ');
        $(this).val(formattedVal);
    });

    $('#enderecoCliente').on('input', function() {
        var inputVal = $(this).val();
        var words = inputVal.toLowerCase().split(' ');
        for (var i = 0; i < words.length; i++) {
            words[i] = words[i].charAt(0).toUpperCase() + words[i].substring(1);
        }
        var formattedVal = words.join(' ');
        $(this).val(formattedVal);
    });

    /* Inserção de Masc */
    $('#cpfCliente').inputmask("999.999.999-99");
    $('#celularCliente').inputmask("(99) 99999-9999");
    $('#telefoneCliente').inputmask("(99) 9999-9999");


function limparInputsModalAdicionarEditarCliente() {
        $("#nomeCliente").val('');
        var estadoRgClienteSelectize = $('#estadoRgCliente')[0].selectize;
            estadoRgClienteSelectize.clear();
        $("#rgCliente").val('');
        $("#cpfCliente").val('');
        $("#emailCliente").val('');
        $("#celularCliente").val('');
        $("#telefoneCliente").val('');
        $("#pesquisarCepCliente").val('');
        $("#enderecoCliente").val('');
        $("#numeroCliente").val('');
        $("#complementoCliente").val('');
        var estadoClienteSelectize = $('#estadoCliente')[0].selectize;
            estadoClienteSelectize.clear();
        var cidadeClienteSelectize = $('#cidadeCliente')[0].selectize;
            cidadeClienteSelectize.clear();

        // Restaurar o botão Cadastrar
        var botaoCadastrar = '<button type="button" class="btn btn-primary" id="cadastrarCliente"><i class="fas fa-check"></i> Cadastrar</button>';
        $("#atualizarCliente").replaceWith(botaoCadastrar);
        };

    $("#modalAdicionarEditarCliente").on("hidden.bs.modal", function () {
        limparInputsModalAdicionarEditarCliente(); 
            });

    // Função para preencher o select "cidadeCliente" com os municípios
    function popularCidades(data) {
        var select = $('#cidadeCliente');

        // Limpar o select antes de preencher novamente
        select.empty();

        // Adicionar opção padrão
        select.append('<option value="">Selecione a Cidade</option>');

        // Ordenar os municípios em ordem alfabética
        data.sort(function(a, b) {
            return a.nome.localeCompare(b.nome);
        });

        // Adicionar as opções dos municípios em ordem alfabética
        $.each(data, function(index, cidade) {
            var option = $('<option></option>').attr('value', cidade.sigla).text(cidade.nome);
            select.append(option);
        });

        // Inicialize o Selectize para o elemento select "cidadeCliente"
        select.selectize({
            create: false,
            sortField: 'text',
            allowEmptyOption: true,
            placeholder: 'Selecione a cidade'
        });
    }

    // Função para buscar os municípios da API do IBGE e chamar a função para preencher o select
    function obterMunicipios() {
        $.ajax({
            url: 'https://servicodados.ibge.gov.br/api/v1/localidades/municipios',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                popularCidades(data);
            },
            error: function(xhr, status, error) {
                console.error('Erro ao obter os municípios:', error);
            }
        });
    }

     /* DESNECESSÁRIO */
     
    /* POST função click que envia os dados do form #formAdicionarEditarCliente por ajax*/
    //$("#cadastrarCliente").click(function(e) {
    //    e.preventDefault();
    //    
    //    /* esta variável recebe as propriedades de um spinner de atualizando */
    //    var spinnerHtml = `
    //         <div id="adicionarSpinnerModal" class="text-center">
    //             <button class="btn btn-primary" type="button" disabled>
    //                 <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
    //                 Adicionando...
    //             </button>
    //         </div>
    //     `;
//
    //     // insere o spinner dinamicamente dentro do body do modal visualizar
    //     $("#modalAdicionarEditarCliente .modal-body").prepend(spinnerHtml);
//
    //    /* objeto vazio para receber os dados dos inputs do form #formAdicionarEditarCliente*/
    //    let $dadosCliente = {};
//
    //    // todos os dados do form são adicionados em um array um a um, em $dadosCliente
    //    $("#formAdicionarEditarCliente").serializeArray().forEach(function(field) {
    //        $dadosCliente[field.name] = field.value;
    //    });
//
    //    // Pegue o token CSRF da meta tag
    //    let csrfToken = $('meta[name="csrf-token"]').attr('content');
//
    //    /* $data recebe o conteudo de $dadosCliente no formato json string */
    //    let $data = JSON.stringify($dadosCliente);
//
    //    
    //    /* ajax POST adicionar novo cliente */
    //    $.ajax({
    //        type: "POST",
    //        url: "/adicionarCliente",
    //        data: $data,
    //        headers: {
    //            // Adicione o token CSRF ao cabeçalho da solicitação
    //            'X-CSRF-TOKEN': csrfToken
    //        },
    //        contentType: "application/json",
    //        dataType: "json",
    //        success: function(response) {
    //            $("#adicionarSpinnerModal").remove();
    //            $("#modalAdicionarEditarCliente").modal('hide');
    //             // Exibir o SweetAlert de sucesso
    //    swal("Cliente Adicionado com Sucesso!", "", "success");
    //            /* método que recarrega o grid de clientes, já atualizado */
    //            listarClientes();
    //        },
    //        error: function(xhr, status, error) {
    //    $("#adicionarSpinnerModal").remove();
    //    
    //    // Se a resposta da API incluir mensagens de erro
    //    if (xhr.responseJSON && xhr.responseJSON.errors) {
    //        var errorMessages = Object.values(xhr.responseJSON.errors).join("\n");
    //        swal("Erro ao Adicionar Cliente", errorMessages, "error");
    //    } else {
    //        // Caso contrário, exiba uma mensagem genérica
    //        swal("Erro ao Adicionar Cliente", "Verifique sua conexão com a internet.", "error");
    //    }
    //}
    //    });
//
    //});
    

    $(document).ready(function() {
        
        // Busque os dados da API do IBGE e preencha o select "estadoCliente"
        $.ajax({
            url: 'https://servicodados.ibge.gov.br/api/v1/localidades/estados',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                var rgEstadoSelect = $('#estadoRgCliente');
                var estadoSelect = $('#estadoCliente');

                // Ordenar os estados em ordem alfabética
                data.sort(function(a, b) {
                    return a.nome.localeCompare(b.nome);
                });

                // Adicionar o option default 'Selecione o Estado'
                rgEstadoSelect.append('<option value="" selected disabled>Selecione o Estado do RG</option>');
                estadoSelect.append('<option value="" selected disabled>Selecione o Estado</option>');

                // Adicionar as opções dos estados em ordem alfabética
                $.each(data, function(index, estado) {
                    rgEstadoSelect.append('<option value="' + estado.sigla + '">' + estado
                        .nome + '</option>');
                });

                $.each(data, function(index, estado) {
                    estadoSelect.append('<option value="' + estado.sigla + '">' + estado
                        .nome + '</option>');
                });

                // Inicialize o Selectize para os selects "rgEstado" e "estadoCliente"
                rgEstadoSelect.selectize({
                    create: false,
                    sortField: 'text',
                    allowEmptyOption: true,
                    placeholder: 'Selecione o estado'
                });

                estadoSelect.selectize({
                    create: false,
                    sortField: 'text',
                    allowEmptyOption: true,
                    placeholder: 'Selecione o estado'
                });
            },
            error: function(xhr, status, error) {
                console.error('Erro ao obter os estados:', error);
            }
        });

        // Chamar a função para buscar e preencher o select "cidadeCliente"
        obterMunicipios();

    });
</script>
