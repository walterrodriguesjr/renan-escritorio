<div class="modal fade" id="modalAdicionarEditarClientePessoaJuridica" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header corCabecalhoModalAdicionarEditarClientePessoaJuridica" id="corCabecalhoModalAdicionarEditarClientePessoaJuridica">
                <h5 style="color: white" class="modal-title" id="cabecalhoModalAdicionarEditarClientePessoaJuridica"><i class="fas fa-user"></i> Cadastrar dados do Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" id="formAdicionarEditarClientePessoaJuridica">
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
                        <x-input-label for="nomeFantasia" :value="__('Nome Fantasia')" />
                        <x-text-input id="nomeFantasia" class="block mt-1 w-full" type="text" name="nomeFantasia"
                            :value="old('nomeFantasia')" placeholder="Digite" required autofocus />
                        <x-input-error :messages="$errors->get('nomeFantasia')" class="mt-2" />
                    </div>

                    <div class="mt-2">
                        <x-input-label for="razaoSocial" :value="__('Razão Social')" />
                        <x-text-input id="razaoSocial" class="block mt-1 w-full" type="text" name="razaoSocial"
                            :value="old('razaoSocial')" placeholder="Digite" required autofocus />
                        <x-input-error :messages="$errors->get('razaoSocial')" class="mt-2" />
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="cnpj" :value="__('CNPJ')" />
                                <x-text-input id="cnpj" class="block mt-1 w-full" type="text" name="cnpj"
                                    :value="old('cnpj')" placeholder="Digite" required autofocus />
                                <x-input-error :messages="$errors->get('cnpj')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="status" :value="__('Status')" />
                                <x-text-input id="status" class="block mt-1 w-full" type="text" name="status"
                                    :value="old('status')" placeholder="Digite" required autofocus />
                                <x-input-error :messages="$errors->get('status')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="dataAbertura" :value="__('Data de Abertura')" />
                                <x-text-input id="dataAbertura" class="block mt-1 w-full" type="text" name="dataAbertura"
                                    :value="old('dataAbertura')" placeholder="Digite" required autofocus />
                                <x-input-error :messages="$errors->get('dataAbertura')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-8">
                            <div class="mt-2">
                                <x-input-label for="cnaePrincipalDescricao" :value="__('CNAE Principal Descrição')" />
                                <x-text-input id="cnaePrincipalDescricao" class="block mt-1 w-full" type="text" name="cnaePrincipalDescricao"
                                    :value="old('cnaePrincipalDescricao')" placeholder="Digite" required autofocus />
                                <x-input-error :messages="$errors->get('cnaePrincipalDescricao')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="cnaePrincipalCodigo" :value="__('CNAE Principal Código')" />
                                <x-text-input id="cnaePrincipalCodigo" class="block mt-1 w-full" type="number" name="cnaePrincipalCodigo"
                                    :value="old('cnaePrincipalCodigo')" placeholder="Digite" required autofocus />
                                <x-input-error :messages="$errors->get('cnaePrincipalCodigo')" class="mt-2" />
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
                                <x-input-label for="email" :value="__('E-mail')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email"
                                    name="email" :value="old('email')" placeholder="Digite" required autofocus />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="telefone" :value="__('Telefone')" />
                                <x-text-input id="telefone" class="block mt-1 w-full" type="text"
                                    name="telefone" :value="old('telefone')" placeholder="Digite" autofocus />
                                <x-input-error :messages="$errors->get('telefone')" class="mt-2" />
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
                                <x-input-label for="logradouro" :value="__('Endereço')" />
                                <x-text-input id="logradouro" class="block mt-1 w-full" type="text"
                                    name="logradouro" :value="old('logradouro')" placeholder="Digite" autofocus />
                                <x-input-error :messages="$errors->get('logradouro')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mt-2">
                                <x-input-label for="numero" :value="__('Número')" />
                                <x-text-input id="numero" class="block mt-1 w-full" type="number"
                                    name="numero" :value="old('numero')" placeholder="Digite" autofocus />
                                <x-input-error :messages="$errors->get('numero')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mt-2">
                                <x-input-label for="complemento" :value="__('Complemento')" />
                                <x-text-input id="complemento" class="block mt-1 w-full" type="text"
                                    name="complemento" :value="old('complemento')" placeholder="Digite" autofocus />
                                <x-input-error :messages="$errors->get('complemento')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <!-- Select de Estado -->
                            <div class="mt-2">
                                <x-input-label for="uf" :value="__('Estado')" />
                                <select id="uf" class="form-select" name="uf" autofocus>
                                    
                                </select>
                                {{-- <x-input-error :messages="$errors->get('estadoCliente')" class="mt-2" /> --}}
                            </div>
                        </div>

                        <div class="col-md-8">
                            <!-- Select de Cidade -->
                            <div class="mt-2">
                                <x-input-label for="municipio" :value="__('Cidade')" />
                                <select id="municipio" class="form-select" name="municipio" autofocus>

                                </select>
                                <x-input-error :messages="$errors->get('municipio')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer" id="modalFooter">
                <button type="button" class="btn btn-secondary" id="fecharModalAdicionarEditarClientePessoaJuridica" data-bs-dismiss="modal" title="Clique para fechar este formulário"><i class="fas fa-times"></i> Fechar</button>
                <button type="button" class="btn btn-primary" id="cadastrarClientePessoaJuridica" title="Clique para salvar"><i class="fas fa-check"></i> Cadastrar</button>
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

$('#nomeFantasia').on('input', function() {
        var inputVal = $(this).val();
        var words = inputVal.toLowerCase().split(' ');
        for (var i = 0; i < words.length; i++) {
            words[i] = words[i].charAt(0).toUpperCase() + words[i].substring(1);
        }
        var formattedVal = words.join(' ');
        $(this).val(formattedVal);
    });

$('#razaoSocial').on('input', function() {
        var inputVal = $(this).val();
        var words = inputVal.toLowerCase().split(' ');
        for (var i = 0; i < words.length; i++) {
            words[i] = words[i].charAt(0).toUpperCase() + words[i].substring(1);
        }
        var formattedVal = words.join(' ');
        $(this).val(formattedVal);
    });

$('#cnaePrincipalDescricao').on('input', function() {
        var inputVal = $(this).val();
        var words = inputVal.toLowerCase().split(' ');
        for (var i = 0; i < words.length; i++) {
            words[i] = words[i].charAt(0).toUpperCase() + words[i].substring(1);
        }
        var formattedVal = words.join(' ');
        $(this).val(formattedVal);
    });

    $('#logradouro').on('input', function() {
        var inputVal = $(this).val();
        var words = inputVal.toLowerCase().split(' ');
        for (var i = 0; i < words.length; i++) {
            words[i] = words[i].charAt(0).toUpperCase() + words[i].substring(1);
        }
        var formattedVal = words.join(' ');
        $(this).val(formattedVal);
    });

    /* Inserção de Masc */
    $('#cnpj').inputmask("99.999.999/9999-99");
    $('#pesquisarCnpjClientePessoaJuridica').inputmask("99.999.999/9999-99");
    $('#telefone').inputmask("(99) 9999-9999");


function limparInputsModalAdicionarEditarClientePessoaJuridica() {
        $("#nomeFantasia").val('');
        /* var estadoRgClienteSelectize = $('#estadoRgCliente')[0].selectize;
            estadoRgClienteSelectize.clear(); */
        $("#razaoSocial").val('');
        $("#pesquisarCnpjClientePessoaJuridica").val('');
        $("#cnpj").val('');
        $("#status").val('');
        $("#cnaePrincipalDescricao").val('');
        $("#cnaePrincipalCodigo").val('');
        $("#pesquisarCepClientePessoaJuridica").val('');
        $("#dataAbertura").val('');
        $("#telefone").val('');
        $("#email").val('');
        $("#logradouro").val('');
        $("#numero").val('');
        $("#complemento").val('');
        var estadoClientePessoaJuridicaSelectize = $('#uf')[0].selectize;
            estadoClientePessoaJuridicaSelectize.clear();
        var cidadeClientePessoaJuridicaSelectize = $('#municipio')[0].selectize;
            cidadeClientePessoaJuridicaSelectize.clear();

        // Restaurar o botão Cadastrar
        var botaoCadastrarClientePessoaJuridica = '<button type="button" class="btn btn-primary" id="cadastrarClientePessoaJuridica"><i class="fas fa-check"></i> Cadastrar</button>';
        $("#atualizarClientePessoaJuridica").replaceWith(botaoCadastrarClientePessoaJuridica);
        };

    $("#modalAdicionarEditarClientePessoaJuridica").on("hidden.bs.modal", function () {
        limparInputsModalAdicionarEditarClientePessoaJuridica();
    });

    // Função para preencher o select "cidadeCliente" com os municípios
    function popularCidadesClientePessoaJuridica(data) {
        var selectMunicipio = $('#municipio');

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
    
    /* POST função click que envia os dados do form #formAdicionarEditarClientePessoaJuridica por ajax*/
    //$("#cadastrarClientePessoaJuridica").click(function(e) {
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
    //     $("#modalAdicionarEditarClientePessoaJuridica .modal-body").prepend(spinnerHtml);
//
    //    /* objeto vazio para receber os dados dos inputs do form #formAdicionarEditarClientePessoaJuridica*/
    //    let $dadosClientePessoaJuridica = {};
//
    //    // todos os dados do form são adicionados em um array um a um, em $dadosClientePessoaJuridica
    //    $("#formAdicionarEditarClientePessoaJuridica").serializeArray().forEach(function(field) {
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
    //            $("#modalAdicionarEditarClientePessoaJuridica").modal('hide');
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
                var estadoSelect = $('#uf');

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
