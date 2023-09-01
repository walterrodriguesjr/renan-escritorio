<div class="modal fade" id="modalEditarClientePessoaJuridica" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #198754">
                <h5 style="color: white" class="modal-title" id="cabecalhoModalAdicionarEditarClientePessoaJuridica"><i class="fas fa-user"></i> Cadastrar dados do Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" id="formEditarClientePessoaJuridica">
                    @csrf

                    <!-- tag de dados pessoais -->
                    <div class="mb-3">
                        <h1 class="d-flex align-items-center justify-content-center" style="background-color: rgb(240, 240, 240)">DADOS DA EMPRESA</h1>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="mt-2">
                            <x-input-label for="pesquisarCnpjClientePessoaJuridica" id="pesquisarCepLabel" :value="__('CNPJ (Preencha todos os campos usando o CNPJ, digite apenas números)')" 
                                style="font-weight: bold;" />
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                                <x-text-input id="pesquisarCnpjClientePessoaJuridica" class="form-control" type="text"
                                 :value="old('pesquisarCnpjClientePessoaJuridica')" placeholder="Digite para pesquisar o CNPJ"
                                     autofocus />
                            </div>
                          
                        </div>
                    </div>
                    </div>

                    <br>

                    <div>
                        <x-input-label for="nomeFantasiaEditar" :value="__('Nome Fantasia')" />
                        <x-text-input id="nomeFantasiaEditar" class="block mt-1 w-full" type="text" name="nomeFantasiaEditar"
                            :value="old('nomeFantasiaEditar')" placeholder="Digite" required autofocus />
                        <x-input-error :messages="$errors->get('nomeFantasiaEditar')" class="mt-2" />
                    </div>

                    <div class="mt-2">
                        <x-input-label for="razaoSocialEditar" :value="__('Razão Social')" />
                        <x-text-input id="razaoSocialEditar" class="block mt-1 w-full" type="text" name="razaoSocialEditar"
                            :value="old('razaoSocialEditar')" placeholder="Digite" required autofocus />
                        <x-input-error :messages="$errors->get('razaoSocialEditar')" class="mt-2" />
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="cnpjEditar" :value="__('CNPJ')" />
                                <x-text-input id="cnpjEditar" class="block mt-1 w-full" type="text" name="cnpjEditar"
                                    :value="old('cnpjEditar')" placeholder="Digite" required autofocus />
                                <x-input-error :messages="$errors->get('cnpjEditar')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="statusEditar" :value="__('Status')" />
                                <x-text-input id="statusEditar" class="block mt-1 w-full" type="text" name="statusEditar"
                                    :value="old('statusEditar')" placeholder="Digite" required autofocus />
                                <x-input-error :messages="$errors->get('statusEditar')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="dataAberturaEditar" :value="__('Data de Abertura')" />
                                <x-text-input id="dataAberturaEditar" class="block mt-1 w-full" type="text" name="dataAberturaEditar"
                                    :value="old('dataAberturaEditar')" placeholder="Digite" required autofocus />
                                <x-input-error :messages="$errors->get('dataAberturaEditar')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-8">
                            <div class="mt-2">
                                <x-input-label for="cnaePrincipalDescricaoEditar" :value="__('CNAE Principal Descrição')" />
                                <x-text-input id="cnaePrincipalDescricaoEditar" class="block mt-1 w-full" type="text" name="cnaePrincipalDescricaoEditar"
                                    :value="old('cnaePrincipalDescricaoEditar')" placeholder="Digite" required autofocus />
                                <x-input-error :messages="$errors->get('cnaePrincipalDescricaoEditar')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="cnaePrincipalCodigoEditar" :value="__('CNAE Principal Código')" />
                                <x-text-input id="cnaePrincipalCodigoEditar" class="block mt-1 w-full" type="number" name="cnaePrincipalCodigoEditar"
                                    :value="old('cnaePrincipalCodigoEditar')" placeholder="Digite" required autofocus />
                                <x-input-error :messages="$errors->get('cnaePrincipalCodigoEditar')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <br>

                    <!-- tag de contatos -->
                    <div class="mb-2">
                        <h1 class="d-flex align-items-center justify-content-center" style="background-color: rgb(240, 240, 240)">CONTATOS</h1>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-8">
                            <div class="mt-2">
                                <x-input-label for="emailEditar" :value="__('E-mail')" />
                                <x-text-input id="emailEditar" class="block mt-1 w-full" type="emailEditar"
                                    name="emailEditar" :value="old('emailEditar')" placeholder="Digite" required autofocus />
                                <x-input-error :messages="$errors->get('emailEditar')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="telefoneEditar" :value="__('Telefone')" />
                                <x-text-input id="telefoneEditar" class="block mt-1 w-full" type="text"
                                    name="telefoneEditar" :value="old('telefoneEditar')" placeholder="Digite" autofocus />
                                <x-input-error :messages="$errors->get('telefoneEditar')" class="mt-2" />
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
                            <x-input-label for="pesquisarCepClientePessoaJuridica" id="pesquisarCepLabel" :value="__('Pesquisar CEP')"
                                style="font-weight: bold;" />
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                                <x-text-input id="pesquisarCepClientePessoaJuridica" class="form-control" type="text"
                                 :value="old('pesquisarCepClientePessoaJuridica')" placeholder="Digite para pesquisar o CEP"
                                     autofocus />
                            </div>
                          
                        </div>
                    </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-8">
                            <div class="mt-2">
                                <x-input-label for="logradouroEditar" :value="__('Endereço')" />
                                <x-text-input id="logradouroEditar" class="block mt-1 w-full" type="text"
                                    name="logradouroEditar" :value="old('logradouroEditar')" placeholder="Digite" autofocus />
                                <x-input-error :messages="$errors->get('logradouroEditar')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mt-2">
                                <x-input-label for="numeroEditar" :value="__('Número')" />
                                <x-text-input id="numeroEditar" class="block mt-1 w-full" type="number"
                                    name="numeroEditar" :value="old('numeroEditar')" placeholder="Digite" autofocus />
                                <x-input-error :messages="$errors->get('numeroEditar')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mt-2">
                                <x-input-label for="complementoEditar" :value="__('Complemento')" />
                                <x-text-input id="complementoEditar" class="block mt-1 w-full" type="text"
                                    name="complementoEditar" :value="old('complementoEditar')" placeholder="Digite" autofocus />
                                <x-input-error :messages="$errors->get('complementoEditar')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <!-- Select de Estado -->
                            <div class="mt-2">
                                <x-input-label for="ufEditar" :value="__('Estado')" />
                                <select id="ufEditar" class="form-select" name="ufEditar" autofocus>
                                    
                                </select>
                                {{-- <x-input-error :messages="$errors->get('estadoCliente')" class="mt-2" /> --}}
                            </div>
                        </div>

                        <div class="col-md-8">
                            <!-- Select de Cidade -->
                            <div class="mt-2">
                                <x-input-label for="municipioEditar" :value="__('Cidade')" />
                                <select id="municipioEditar" class="form-select" name="municipioEditar" autofocus>

                                </select>
                                <x-input-error :messages="$errors->get('municipioEditar')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer" id="modalFooter">
                <button type="button" class="btn btn-secondary" id="fecharModalEditarClientePessoaJuridica" data-bs-dismiss="modal" title="Clique para fechar este formulário"><i class="fas fa-times"></i> Fechar</button>
                <button type="button" class="btn btn-success" id="editarClientePessoaJuridica" title="Clique para atualizar"><i class="fas fa-sync"></i> Atualizar</button>
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

$('#nomeFantasiaEditar').on('input', function() {
        var inputVal = $(this).val();
        var words = inputVal.toLowerCase().split(' ');
        for (var i = 0; i < words.length; i++) {
            words[i] = words[i].charAt(0).toUpperCase() + words[i].substring(1);
        }
        var formattedVal = words.join(' ');
        $(this).val(formattedVal);
    });

$('#razaoSocialEditar').on('input', function() {
        var inputVal = $(this).val();
        var words = inputVal.toLowerCase().split(' ');
        for (var i = 0; i < words.length; i++) {
            words[i] = words[i].charAt(0).toUpperCase() + words[i].substring(1);
        }
        var formattedVal = words.join(' ');
        $(this).val(formattedVal);
    });

$('#cnaePrincipalDescricaoEditar').on('input', function() {
        var inputVal = $(this).val();
        var words = inputVal.toLowerCase().split(' ');
        for (var i = 0; i < words.length; i++) {
            words[i] = words[i].charAt(0).toUpperCase() + words[i].substring(1);
        }
        var formattedVal = words.join(' ');
        $(this).val(formattedVal);
    });

    $('#logradouroEditar').on('input', function() {
        var inputVal = $(this).val();
        var words = inputVal.toLowerCase().split(' ');
        for (var i = 0; i < words.length; i++) {
            words[i] = words[i].charAt(0).toUpperCase() + words[i].substring(1);
        }
        var formattedVal = words.join(' ');
        $(this).val(formattedVal);
    });

    /* Inserção de Masc */
    $('#cnpjEditar').inputmask("99.999.999/9999-99");
    $('#pesquisarCnpjClientePessoaJuridica').inputmask("99.999.999/9999-99");
    $('#telefoneEditar').inputmask("(99) 9999-9999");


function limparInputsModalEditarClientePessoaJuridica() {
        $("#nomeFantasiaEditar").val('');
        /* var estadoRgClienteSelectize = $('#estadoRgCliente')[0].selectize;
            estadoRgClienteSelectize.clear(); */
        $("#razaoSocialEditar").val('');
        $("#pesquisarCnpjClientePessoaJuridica").val('');
        $("#cnpjEditar").val('');
        $("#statusEditar").val('');
        $("#cnaePrincipalDescricaoEditar").val('');
        $("#cnaePrincipalCodigoEditar").val('');
        $("#pesquisarCepClientePessoaJuridica").val('');
        $("#dataAberturaEditar").val('');
        $("#telefoneEditar").val('');
        $("#emailEditar").val('');
        $("#logradouroEditar").val('');
        $("#numeroEditar").val('');
        $("#complementoEditar").val('');
        var estadoClientePessoaJuridicaSelectize = $('#ufEditar')[0].selectize;
            estadoClientePessoaJuridicaSelectize.clear();
        var cidadeClientePessoaJuridicaSelectize = $('#municipioEditar')[0].selectize;
            cidadeClientePessoaJuridicaSelectize.clear();

        // Restaurar o botão Cadastrar
        /* var botaoCadastrarClientePessoaJuridica = '<button type="button" class="btn btn-primary" id="editarClientePessoaJuridica"><i class="fas fa-check"></i> Cadastrar</button>';
        $("#atualizarClientePessoaJuridica").replaceWith(botaoCadastrarClientePessoaJuridica); */
        };

    $("#modalEditarClientePessoaJuridica").on("hidden.bs.modal", function () {
        limparInputsModalEditarClientePessoaJuridica();
    });

    // Função para preencher o select "cidadeCliente" com os municípios
    function popularCidadesClientePessoaJuridica(data) {
        var selectMunicipio = $('#municipioEditar');

        // Limpar o selectMunicipio antes de preencher novamente
        selectMunicipio.empty();

        // Adicionar opção padrão
        selectMunicipio.append('<option value="">Selecione a Cidade</option>');

        // Ordenar os municípios em ordem alfabética
        data.sort(function(a, b) {
            return a.nome.localeCompare(b.nome);
        });

        // Adicionar as opções dos municípios em ordem alfabética
        $.each(data, function(index, cidade) {
            var option = $('<option></option>').attr('value', cidade.sigla).text(cidade.nome);
            selectMunicipio.append(option);
        });

        // Inicialize o Selectize para o elemento selectMunicipio "cidadeCliente"
        selectMunicipio.selectize({
            create: false,
            sortField: 'text',
            allowEmptyOption: true,
            placeholder: 'Selecione a cidade'
        });
    }

    // Função para buscar os municípios da API do IBGE e chamar a função para preencher o select
    function obterMunicipiosClientePessoaJuridica() {
        $.ajax({
            url: 'https://servicodados.ibge.gov.br/api/v1/localidades/municipios',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                popularCidadesClientePessoaJuridica(data);
            },
            error: function(xhr, status, error) {
                console.error('Erro ao obter os municípios:', error);
            }
        });
    }

    /* DESNECESSÁRIO */
    
    /* POST função click que envia os dados do form #formEditarClientePessoaJuridica por ajax*/
    //$("#editarClientePessoaJuridica").click(function(e) {
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
    //     $("#modalEditarClientePessoaJuridica .modal-body").prepend(spinnerHtml);
//
    //    /* objeto vazio para receber os dados dos inputs do form #formEditarClientePessoaJuridica*/
    //    let $dadosClientePessoaJuridica = {};
//
    //    // todos os dados do form são adicionados em um array um a um, em $dadosClientePessoaJuridica
    //    $("#formEditarClientePessoaJuridica").serializeArray().forEach(function(field) {
    //        $dadosClientePessoaJuridica[field.name] = field.value;
    //    });
//
    //    // Pegue o token CSRF da meta tag
    //    let csrfToken = $('meta[name="csrf-token"]').attr('content');
//
    //    /* $data recebe o conteudo de $dadosClientePessoaJuridica no formato json string */
    //    let $data = JSON.stringify($dadosClientePessoaJuridica);
//
    //    
    //    /* ajax POST adicionar novo cliente */
    //    $.ajax({
    //        type: "POST",
    //        url: "/adicionarClientePessoaJuridica",
    //        data: $data,
    //        headers: {
    //            // Adicione o token CSRF ao cabeçalho da solicitação
    //            'X-CSRF-TOKEN': csrfToken
    //        },
    //        contentType: "application/json",
    //        dataType: "json",
    //        success: function(response) {
    //            $("#adicionarSpinnerModal").remove();
    //            $("#modalEditarClientePessoaJuridica").modal('hide');
    //             // Exibir o SweetAlert de sucesso
    //    swal("Cliente Adicionado com Sucesso!", "", "success");
    //            /* método que recarrega o grid de clientes, já atualizado */
    //            listarClientesPessoaJuridica();
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
    //     }
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
                var estadoSelect = $('#ufEditar');

                // Ordenar os estados em ordem alfabética
                data.sort(function(a, b) {
                    return a.nome.localeCompare(b.nome);
                });

                // Adicionar o option default 'Selecione o Estado'
                estadoSelect.append('<option value="" selected disabled>Selecione o Estado</option>');


                $.each(data, function(index, estado) {
                    estadoSelect.append('<option value="' + estado.sigla + '">' + estado
                        .nome + '</option>');
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
        obterMunicipiosClientePessoaJuridica();

    });
</script>
