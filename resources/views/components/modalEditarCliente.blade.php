<div class="modal fade" id="modalEditarCliente" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header corCabecalhoModalAdicionarEditarCliente" id="corCabecalhoModalAdicionarEditarCliente" style="background-color: #198754; color: white">
                <h5 style="color: white" class="modal-title" id="cabecalhoModalAdicionarEditarCliente"><i class="fas fa-user"></i> Cadastrar dados do Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" id="formEditarCliente">
                    @csrf

                    <!-- tag de dados pessoais -->
                    <div class="mb-3">
                        <h1 class="d-flex align-items-center justify-content-center" style="background-color: rgb(240, 240, 240)">DADOS PESSOAIS</h1>
                    </div>

                    <div>
                        <x-input-label for="nomeEditarCliente" :value="__('Nome Completo')" />
                        <x-text-input id="nomeEditarCliente" class="block mt-1 w-full" type="text" name="nomeEditarCliente"
                            :value="old('nomeEditarCliente')" placeholder="Digite" required autofocus />
                        <x-input-error :messages="$errors->get('nomeEditarCliente')" class="mt-2" />
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="estadoRgEditarCliente" :value="__('Estado do RG')" />
                                <select id="estadoRgEditarCliente" name="estadoRgEditarCliente"
                                    class="block mt-1 w-full shadow-sm border-gray-300 rounded-md" required autofocus>

                                </select>
                                <x-input-error :messages="$errors->get('estadoRgEditarCliente')" class="mt-2" />
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="rgEditarCliente" :value="__('RG')" />
                                <x-text-input id="rgEditarCliente" class="block mt-1 w-full" type="number" name="rgEditarCliente"
                                    :value="old('rgEditarCliente')" placeholder="Digite" required autofocus />
                                <x-input-error :messages="$errors->get('rgEditarCliente')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="cpfEditarCliente" :value="__('CPF')" />
                                <x-text-input id="cpfEditarCliente" class="block mt-1 w-full" type="text" name="cpfEditarCliente"
                                    :value="old('cpfEditarCliente')" placeholder="Digite" required autofocus />
                                <x-input-error :messages="$errors->get('cpfEditarCliente')" class="mt-2" />
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
                                <x-input-label for="emailEditarCliente" :value="__('E-mail')" />
                                <x-text-input id="emailEditarCliente" class="block mt-1 w-full" type="email"
                                    name="emailEditarCliente" :value="old('emailEditarCliente')" placeholder="Digite" required autofocus />
                                <x-input-error :messages="$errors->get('emailEditarCliente')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="celularEditarCliente" :value="__('Celular')" />
                                <x-text-input id="celularEditarCliente" class="block mt-1 w-full" type="text"
                                    name="celularEditarCliente" :value="old('celularEditarCliente')" placeholder="Digite" autofocus />
                                <x-input-error :messages="$errors->get('celularEditarCliente')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="telefoneEditarCliente" :value="__('Telefone')" />
                                <x-text-input id="telefoneEditarCliente" class="block mt-1 w-full" type="text"
                                    name="telefoneEditarCliente" :value="old('telefoneEditarCliente')" placeholder="Digite" autofocus />
                                <x-input-error :messages="$errors->get('telefoneEditarCliente')" class="mt-2" />
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
                            <x-input-label for="pesquisarCepEditarCliente" id="pesquisarCepEditarClienteLabel" :value="__('Pesquisar CEP')"
                                style="font-weight: bold;" />
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                                <x-text-input id="pesquisarCepEditarCliente" class="form-control" type="text"
                                 :value="old('pesquisarCepEditarCliente')" placeholder="Digite para pesquisar o CEP"
                                     autofocus />
                            </div>
                          
                        </div>
                    </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-8">
                            <div class="mt-2">
                                <x-input-label for="enderecoEditarCliente" :value="__('Endereço')" />
                                <x-text-input id="enderecoEditarCliente" class="block mt-1 w-full" type="text"
                                    name="enderecoEditarCliente" :value="old('enderecoEditarCliente')" placeholder="Digite" autofocus />
                                <x-input-error :messages="$errors->get('enderecoEditarCliente')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mt-2">
                                <x-input-label for="numeroEditarCliente" :value="__('Número')" />
                                <x-text-input id="numeroEditarCliente" class="block mt-1 w-full" type="number"
                                    name="numeroEditarCliente" :value="old('numeroEditarCliente')" placeholder="Digite" autofocus />
                                <x-input-error :messages="$errors->get('numeroEditarCliente')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mt-2">
                                <x-input-label for="complementoEditarCliente" :value="__('Complemento')" />
                                <x-text-input id="complementoEditarCliente" class="block mt-1 w-full" type="text"
                                    name="complementoEditarCliente" :value="old('complementoEditarCliente')" placeholder="Digite" autofocus />
                                <x-input-error :messages="$errors->get('complementoEditarCliente')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <!-- Select de Estado -->
                            <div class="mt-2">
                                <x-input-label for="estadoEditarCliente" :value="__('Estado')" />
                                <select id="estadoEditarCliente" class="form-select" name="estadoEditarCliente" autofocus>
                                    
                                </select>
                                {{-- <x-input-error :messages="$errors->get('estadoEditarCliente')" class="mt-2" /> --}}
                            </div>
                        </div>

                        <div class="col-md-8">
                            <!-- Select de Cidade -->
                            <div class="mt-2">
                                <x-input-label for="cidadeEditarCliente" :value="__('Cidade')" />
                                <select id="cidadeEditarCliente" class="form-select" name="cidadeEditarCliente" autofocus>

                                </select>
                                <x-input-error :messages="$errors->get('cidadeEditarCliente')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Clique para fechar este formulário"><i class="fas fa-times"></i> Fechar</button>
                <button type="button" class="btn btn-success" id="editarCliente" title="Clique para atualizar"><i class="fas fa-sync"></i> Atualizar</button>
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

$('#nomeEditarCliente').on('input', function() {
        var inputVal = $(this).val();
        var words = inputVal.toLowerCase().split(' ');
        for (var i = 0; i < words.length; i++) {
            words[i] = words[i].charAt(0).toUpperCase() + words[i].substring(1);
        }
        var formattedVal = words.join(' ');
        $(this).val(formattedVal);
    });

    $('#enderecoEditarCliente').on('input', function() {
        var inputVal = $(this).val();
        var words = inputVal.toLowerCase().split(' ');
        for (var i = 0; i < words.length; i++) {
            words[i] = words[i].charAt(0).toUpperCase() + words[i].substring(1);
        }
        var formattedVal = words.join(' ');
        $(this).val(formattedVal);
    });

    /* Inserção de Masc */
    $('#cpfEditarCliente').inputmask("999.999.999-99");
    $('#celularEditarCliente').inputmask("(99) 99999-9999");
    $('#telefoneEditarCliente').inputmask("(99) 9999-9999");


function limparInputsModalAdicionarEditarCliente() {
        $("#nomeEditarCliente").val('');
        var estadoRgEditarClienteSelectize = $('#estadoRgEditarCliente')[0].selectize;
            estadoRgEditarClienteSelectize.clear();
        $("#rgEditarCliente").val('');
        $("#cpfEditarCliente").val('');
        $("#emailEditarCliente").val('');
        $("#celularEditarCliente").val('');
        $("#telefoneEditarCliente").val('');
        $("#pesquisarCepEditarCliente").val('');
        $("#enderecoEditarCliente").val('');
        $("#numeroEditarCliente").val('');
        $("#complementoEditarCliente").val('');
        var estadoEditarClienteSelectize = $('#estadoEditarCliente')[0].selectize;
            estadoEditarClienteSelectize.clear();
        var cidadeEditarClienteSelectize = $('#cidadeEditarCliente')[0].selectize;
            cidadeEditarClienteSelectize.clear();
        };

        // Restaurar o botão Cadastrar (DESNECESSARIO)
       /*  var botaoCadastrarClientePessoaFisica =
    '<button type="button" class="btn btn-primary" id="editarCliente"><i class="fas fa-check"></i> Cadastrar</button>';
    $("#atualizarCliente").replaceWith(botaoCadastrarClientePessoaFisica);

    $("#modalEditarCliente").on("hidden.bs.modal", function () {
      
        limparInputsModalAdicionarEditarCliente(); 
            }); */ 
            //(DESNECESSARIO)

    // Função para preencher o select "cidadeEditarCliente" com os municípios
    function popularCidades(data) {
        var select = $('#cidadeEditarCliente');

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

        // Inicialize o Selectize para o elemento select "cidadeEditarCliente"
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
     
    /* POST função click que envia os dados do form #formEditarCliente por ajax*/
    //$("#editarCliente").click(function(e) {
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
    //     $("#modalEditarCliente .modal-body").prepend(spinnerHtml);
//
    //    /* objeto vazio para receber os dados dos inputs do form #formEditarCliente*/
    //    let $dadosCliente = {};
//
    //    // todos os dados do form são adicionados em um array um a um, em $dadosCliente
    //    $("#formEditarCliente").serializeArray().forEach(function(field) {
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
    //            $("#modalEditarCliente").modal('hide');
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
        
        // Busque os dados da API do IBGE e preencha o select "estadoEditarCliente"
        $.ajax({
            url: 'https://servicodados.ibge.gov.br/api/v1/localidades/estados',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                var rgEstadoSelect = $('#estadoRgEditarCliente');
                var estadoSelect = $('#estadoEditarCliente');

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

                // Inicialize o Selectize para os selects "rgEstado" e "estadoEditarCliente"
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

        // Chamar a função para buscar e preencher o select "cidadeEditarCliente"
        obterMunicipios();

    });
</script>
