<div class="modal fade" id="modalEditarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #198754; color: white">
                <h5 style="color: white" class="modal-title"><i class="fas fa-user"></i> Editar dados do Usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" id="formEditarUsuario">
                    @csrf

                    <!-- tag de dados pessoais -->
                    <div class="mb-3">
                        <h1 class="d-flex align-items-center justify-content-center" style="background-color: rgb(240, 240, 240)">DADOS PESSOAIS</h1>
                    </div>

                    <div>
                        <x-input-label for="nomeEditarUsuario" :value="__('Nome Completo')" />
                        <x-text-input id="nomeEditarUsuario" class="block mt-1 w-full" type="text" name="nomeEditarUsuario"
                            :value="old('nomeEditarUsuario')" placeholder="Digite" required autofocus />
                        <x-input-error :messages="$errors->get('nomeEditarUsuario')" class="mt-2" />
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="estadoRgEditarUsuario" :value="__('Estado do RG')" />
                                <select id="estadoRgEditarUsuario" name="estadoRgEditarUsuario"
                                    class="block mt-1 w-full shadow-sm border-gray-300 rounded-md" required autofocus>

                                </select>
                                <x-input-error :messages="$errors->get('estadoRgEditarUsuario')" class="mt-2" />
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="rgEditarUsuario" :value="__('RG')" />
                                <x-text-input id="rgEditarUsuario" class="block mt-1 w-full" type="number" name="rgEditarUsuario"
                                    :value="old('rgEditarUsuario')" placeholder="Digite" required autofocus />
                                <x-input-error :messages="$errors->get('rgEditarUsuario')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="cpfEditarUsuario" :value="__('CPF')" />
                                <x-text-input id="cpfEditarUsuario" class="block mt-1 w-full" type="text" name="cpfEditarUsuario"
                                    :value="old('cpfEditarUsuario')" placeholder="Digite" required autofocus />
                                <x-input-error :messages="$errors->get('cpfEditarUsuario')" class="mt-2" />
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
                                <x-input-label for="emailEditarUsuario" :value="__('E-mail')" />
                                <x-text-input id="emailEditarUsuario" class="block mt-1 w-full" type="email"
                                    name="emailEditarUsuario" :value="old('emailEditarUsuario')" placeholder="Digite" required autofocus />
                                <x-input-error :messages="$errors->get('emailEditarUsuario')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="celularEditarUsuario" :value="__('Celular')" />
                                <x-text-input id="celularEditarUsuario" class="block mt-1 w-full" type="text"
                                    name="celularEditarUsuario" :value="old('celularEditarUsuario')" placeholder="Digite" autofocus />
                                <x-input-error :messages="$errors->get('celularEditarUsuario')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="telefoneEditarUsuario" :value="__('Telefone')" />
                                <x-text-input id="telefoneEditarUsuario" class="block mt-1 w-full" type="text"
                                    name="telefoneEditarUsuario" :value="old('telefoneEditarUsuario')" placeholder="Digite" autofocus />
                                <x-input-error :messages="$errors->get('telefoneEditarUsuario')" class="mt-2" />
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
                            <x-input-label for="pesquisarCepEditarUsuario" id="pesquisarCepEditarUsuarioLabel" :value="__('Pesquisar CEP')"
                                style="font-weight: bold;" />
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                                <x-text-input id="pesquisarCepEditarUsuario" class="form-control" type="text"
                                 :value="old('pesquisarCepEditarUsuario')" placeholder="Digite para pesquisar o CEP"
                                     autofocus />
                            </div>
                          
                        </div>
                    </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-8">
                            <div class="mt-2">
                                <x-input-label for="enderecoEditarUsuario" :value="__('Endereço')" />
                                <x-text-input id="enderecoEditarUsuario" class="block mt-1 w-full" type="text"
                                    name="enderecoEditarUsuario" :value="old('enderecoEditarUsuario')" placeholder="Digite" autofocus />
                                <x-input-error :messages="$errors->get('enderecoEditarUsuario')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mt-2">
                                <x-input-label for="numeroEditarUsuario" :value="__('Número')" />
                                <x-text-input id="numeroEditarUsuario" class="block mt-1 w-full" type="number"
                                    name="numeroEditarUsuario" :value="old('numeroEditarUsuario')" placeholder="Digite" autofocus />
                                <x-input-error :messages="$errors->get('numeroEditarUsuario')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mt-2">
                                <x-input-label for="complementoEditarUsuario" :value="__('Complemento')" />
                                <x-text-input id="complementoEditarUsuario" class="block mt-1 w-full" type="text"
                                    name="complementoEditarUsuario" :value="old('complementoEditarUsuario')" placeholder="Digite" autofocus />
                                <x-input-error :messages="$errors->get('complementoEditarUsuario')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <!-- Select de Estado -->
                            <div class="mt-2">
                                <x-input-label for="estadoEditarUsuario" :value="__('Estado')" />
                                <select id="estadoEditarUsuario" class="form-select" name="estadoEditarUsuario" autofocus>
                                    
                                </select>
                                {{-- <x-input-error :messages="$errors->get('estadoEditarUsuario')" class="mt-2" /> --}}
                            </div>
                        </div>

                        <div class="col-md-8">
                            <!-- Select de Cidade -->
                            <div class="mt-2">
                                <x-input-label for="cidadeEditarUsuario" :value="__('Cidade')" />
                                <select id="cidadeEditarUsuario" class="form-select" name="cidadeEditarUsuario" autofocus>

                                </select>
                                <x-input-error :messages="$errors->get('cidadeEditarUsuario')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Clique para fechar este formulário"><i class="fas fa-times"></i> Fechar</button>
                <button type="button" class="btn btn-success" id="atualizarUsuario" title="Clique para atualizar"><i class="fas fa-sync"></i> Atualizar</button>
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

$('#nomeEditarUsuario').on('input', function() {
        var inputVal = $(this).val();
        var words = inputVal.toLowerCase().split(' ');
        for (var i = 0; i < words.length; i++) {
            words[i] = words[i].charAt(0).toUpperCase() + words[i].substring(1);
        }
        var formattedVal = words.join(' ');
        $(this).val(formattedVal);
    });

    $('#enderecoEditarUsuario').on('input', function() {
        var inputVal = $(this).val();
        var words = inputVal.toLowerCase().split(' ');
        for (var i = 0; i < words.length; i++) {
            words[i] = words[i].charAt(0).toUpperCase() + words[i].substring(1);
        }
        var formattedVal = words.join(' ');
        $(this).val(formattedVal);
    });

    /* Inserção de Masc */
    $('#cpfEditarUsuario').inputmask("999.999.999-99");
    $('#celularEditarUsuario').inputmask("(99) 99999-9999");
    $('#telefoneEditarUsuario').inputmask("(99) 9999-9999");


function limparInputsModalAdicionarEditarUsuario() {
        $("#nomeEditarUsuario").val('');
        var estadoRgEditarUsuarioSelectize = $('#estadoRgEditarUsuario')[0].selectize;
            estadoRgEditarUsuarioSelectize.clear();
        $("#rgEditarUsuario").val('');
        $("#cpfEditarUsuario").val('');
        $("#emailEditarUsuario").val('');
        $("#celularEditarUsuario").val('');
        $("#telefoneEditarUsuario").val('');
        $("#pesquisarCepEditarUsuario").val('');
        $("#enderecoEditarUsuario").val('');
        $("#numeroEditarUsuario").val('');
        $("#complementoEditarUsuario").val('');
        var estadoEditarUsuarioSelectize = $('#estadoEditarUsuario')[0].selectize;
            estadoEditarUsuarioSelectize.clear();
        var cidadeEditarUsuarioSelectize = $('#cidadeEditarUsuario')[0].selectize;
            cidadeEditarUsuarioSelectize.clear();
        };

        // Restaurar o botão Cadastrar (DESNECESSARIO)
       /*  var botaoCadastrarUsuarioPessoaFisica =
    '<button type="button" class="btn btn-primary" id="editarUsuario"><i class="fas fa-check"></i> Cadastrar</button>';
    $("#atualizarUsuario").replaceWith(botaoCadastrarUsuarioPessoaFisica);

    $("#modalEditarUsuario").on("hidden.bs.modal", function () {
      
        limparInputsModalAdicionarEditarUsuario(); 
            }); */ 
            //(DESNECESSARIO)

    // Função para preencher o select "cidadeEditarUsuario" com os municípios
    function popularCidades(data) {
        var select = $('#cidadeEditarUsuario');

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

        // Inicialize o Selectize para o elemento select "cidadeEditarUsuario"
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
     
    /* POST função click que envia os dados do form #formEditarUsuario por ajax*/
    //$("#editarUsuario").click(function(e) {
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
    //     $("#modalEditarUsuario .modal-body").prepend(spinnerHtml);
//
    //    /* objeto vazio para receber os dados dos inputs do form #formEditarUsuario*/
    //    let $dadosUsuario = {};
//
    //    // todos os dados do form são adicionados em um array um a um, em $dadosUsuario
    //    $("#formEditarUsuario").serializeArray().forEach(function(field) {
    //        $dadosUsuario[field.name] = field.value;
    //    });
//
    //    // Pegue o token CSRF da meta tag
    //    let csrfToken = $('meta[name="csrf-token"]').attr('content');
//
    //    /* $data recebe o conteudo de $dadosUsuario no formato json string */
    //    let $data = JSON.stringify($dadosUsuario);
//
    //    
    //    /* ajax POST adicionar novo cliente */
    //    $.ajax({
    //        type: "POST",
    //        url: "/adicionarUsuario",
    //        data: $data,
    //        headers: {
    //            // Adicione o token CSRF ao cabeçalho da solicitação
    //            'X-CSRF-TOKEN': csrfToken
    //        },
    //        contentType: "application/json",
    //        dataType: "json",
    //        success: function(response) {
    //            $("#adicionarSpinnerModal").remove();
    //            $("#modalEditarUsuario").modal('hide');
    //             // Exibir o SweetAlert de sucesso
    //    swal("Usuario Adicionado com Sucesso!", "", "success");
    //            /* método que recarrega o grid de clientes, já atualizado */
    //            listarUsuarios();
    //        },
    //        error: function(xhr, status, error) {
    //    $("#adicionarSpinnerModal").remove();
    //    
    //    // Se a resposta da API incluir mensagens de erro
    //    if (xhr.responseJSON && xhr.responseJSON.errors) {
    //        var errorMessages = Object.values(xhr.responseJSON.errors).join("\n");
    //        swal("Erro ao Adicionar Usuario", errorMessages, "error");
    //    } else {
    //        // Caso contrário, exiba uma mensagem genérica
    //        swal("Erro ao Adicionar Usuario", "Verifique sua conexão com a internet.", "error");
    //    }
    //}
    //    });
//
    //});
    

    $(document).ready(function() {
        
        // Busque os dados da API do IBGE e preencha o select "estadoEditarUsuario"
        $.ajax({
            url: 'https://servicodados.ibge.gov.br/api/v1/localidades/estados',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                var rgEstadoSelect = $('#estadoRgEditarUsuario');
                var estadoSelect = $('#estadoEditarUsuario');

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

                // Inicialize o Selectize para os selects "rgEstado" e "estadoEditarUsuario"
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

        // Chamar a função para buscar e preencher o select "cidadeEditarUsuario"
        obterMunicipios();

    });
</script>
