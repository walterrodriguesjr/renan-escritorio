

<div class="modal fade" id="modalAdicionarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #007bff">
                <h5 style="color: white" class="modal-title"><i class="fas fa-user"></i> Cadastrar dados do Usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" id="formAdicionarUsuario">
                    @csrf

                    <!-- tag de dados pessoais -->
                    <div class="mb-3">
                        <h1 class="d-flex align-items-center justify-content-center" style="background-color: rgb(240, 240, 240)">DADOS PESSOAIS</h1>
                    </div>

                    <div>
                        <x-input-label for="nomeUsuario" :value="__('Nome Completo')" />
                        <x-text-input id="nomeUsuario" class="block mt-1 w-full" type="text" name="nomeUsuario"
                            :value="old('nomeUsuario')" placeholder="Digite" required autofocus />
                        <x-input-error :messages="$errors->get('nomeUsuario')" class="mt-2" />
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="estadoRgUsuario" :value="__('Estado do RG')" />
                                <select id="estadoRgUsuario" name="estadoRgUsuario"
                                    class="block mt-1 w-full shadow-sm border-gray-300 rounded-md" required autofocus>

                                </select>
                                <x-input-error :messages="$errors->get('estadoRgUsuario')" class="mt-2" />
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="rgUsuario" :value="__('RG')" />
                                <x-text-input id="rgUsuario" class="block mt-1 w-full" type="number" name="rgUsuario"
                                    :value="old('rgUsuario')" placeholder="Digite" required autofocus />
                                <x-input-error :messages="$errors->get('rgUsuario')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="cpfUsuario" :value="__('CPF')" />
                                <x-text-input id="cpfUsuario" class="block mt-1 w-full" type="text" name="cpfUsuario"
                                    :value="old('cpfUsuario')" placeholder="Digite" required autofocus />
                                <x-input-error :messages="$errors->get('cpfUsuario')" class="mt-2" />
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
                                <x-input-label for="emailUsuario" :value="__('E-mail')" />
                                <x-text-input id="emailUsuario" class="block mt-1 w-full" type="email"
                                    name="emailUsuario" :value="old('emailUsuario')" placeholder="Digite" required autofocus />
                                <x-input-error :messages="$errors->get('emailUsuario')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="celularUsuario" :value="__('Celular')" />
                                <x-text-input id="celularUsuario" class="block mt-1 w-full" type="text"
                                    name="celularUsuario" :value="old('celularUsuario')" placeholder="Digite" autofocus />
                                <x-input-error :messages="$errors->get('celularUsuario')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="telefoneUsuario" :value="__('Telefone')" />
                                <x-text-input id="telefoneUsuario" class="block mt-1 w-full" type="text"
                                    name="telefoneUsuario" :value="old('telefoneUsuario')" placeholder="Digite" autofocus />
                                <x-input-error :messages="$errors->get('telefoneUsuario')" class="mt-2" />
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
                            <x-input-label for="pesquisarCepUsuario" id="pesquisarCepUsuarioLabel" :value="__('Pesquisar CEP')"
                                style="font-weight: bold;" />
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                                <x-text-input id="pesquisarCepUsuario" class="form-control" type="text"
                                 :value="old('pesquisarCepUsuario')" placeholder="Digite para pesquisar o CEP"
                                     autofocus />
                            </div>
                          
                        </div>
                    </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-8">
                            <div class="mt-2">
                                <x-input-label for="enderecoUsuario" :value="__('Endereço')" />
                                <x-text-input id="enderecoUsuario" class="block mt-1 w-full" type="text"
                                    name="enderecoUsuario" :value="old('enderecoUsuario')" placeholder="Digite" autofocus />
                                <x-input-error :messages="$errors->get('enderecoUsuario')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mt-2">
                                <x-input-label for="numeroUsuario" :value="__('Número')" />
                                <x-text-input id="numeroUsuario" class="block mt-1 w-full" type="number"
                                    name="numeroUsuario" :value="old('numeroUsuario')" placeholder="Digite" autofocus />
                                <x-input-error :messages="$errors->get('numeroUsuario')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mt-2">
                                <x-input-label for="complementoUsuario" :value="__('Complemento')" />
                                <x-text-input id="complementoUsuario" class="block mt-1 w-full" type="text"
                                    name="complementoUsuario" :value="old('complementoUsuario')" placeholder="Digite" autofocus />
                                <x-input-error :messages="$errors->get('complementoUsuario')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <!-- Select de Estado -->
                            <div class="mt-2">
                                <x-input-label for="estadoUsuario" :value="__('Estado')" />
                                <select id="estadoUsuario" class="form-select" name="estadoUsuario" autofocus>
                                    
                                </select>
                                {{-- <x-input-error :messages="$errors->get('estadoUsuario')" class="mt-2" /> --}}
                            </div>
                        </div>

                        <div class="col-md-8">
                            <!-- Select de Cidade -->
                            <div class="mt-2">
                                <x-input-label for="cidadeUsuario" :value="__('Cidade')" />
                                <select id="cidadeUsuario" class="form-select" name="cidadeUsuario" autofocus>

                                </select>
                                <x-input-error :messages="$errors->get('cidadeUsuario')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <br>

                    <!-- tag de endereços -->
                    <div class="mb-2">
                        <h1 class="d-flex align-items-center justify-content-center" style="background-color: rgb(240, 240, 240)">TIPO DE ACESSO</h1>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <!-- Select de Cidade -->
                            <div class="mt-2">
                                <x-input-label for="tipoAcessoUsuario" :value="__('Nível de Acesso')" />
                                <select id="tipoAcessoUsuario" class="form-select" name="tipoAcessoUsuario" autofocus>
                                    <option value="">Selecione</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Usuário">Usuário</option>
                                </select>
                                <x-input-error :messages="$errors->get('tipoAcessoUsuario')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Clique para fechar este formulário"><i class="fas fa-times"></i> Fechar</button>
                <button type="button" class="btn btn-primary" id="cadastrarUsuario" title="Clique para salvar"><i class="fas fa-check"></i> Cadastrar</button>
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

$('#nomeUsuario').on('input', function() {
        var inputVal = $(this).val();
        var words = inputVal.toLowerCase().split(' ');
        for (var i = 0; i < words.length; i++) {
            words[i] = words[i].charAt(0).toUpperCase() + words[i].substring(1);
        }
        var formattedVal = words.join(' ');
        $(this).val(formattedVal);
    });

    $('#enderecoUsuario').on('input', function() {
        var inputVal = $(this).val();
        var words = inputVal.toLowerCase().split(' ');
        for (var i = 0; i < words.length; i++) {
            words[i] = words[i].charAt(0).toUpperCase() + words[i].substring(1);
        }
        var formattedVal = words.join(' ');
        $(this).val(formattedVal);
    });

    /* Inserção de Masc */
    $('#cpfUsuario').inputmask("999.999.999-99");
    $('#celularUsuario').inputmask("(99) 99999-9999");
    $('#telefoneUsuario').inputmask("(99) 9999-9999");

    $(document).ready(function() {
        function popularCidades(data) {
        var select = $('#cidadeUsuario');

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

        // Inicialize o Selectize para o elemento select "cidadeUsuario"
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
        
        // Busque os dados da API do IBGE e preencha o select "estadoUsuario"
        $.ajax({
            url: 'https://servicodados.ibge.gov.br/api/v1/localidades/estados',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                var rgEstadoSelect = $('#estadoRgUsuario');
                var estadoSelect = $('#estadoUsuario');

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

                // Inicialize o Selectize para os selects "rgEstado" e "estadoUsuario"
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

        // Chamar a função para buscar e preencher o select "cidadeUsuario"
        obterMunicipios();

        var tipoAcessoUsuario = $("#tipoAcessoUsuario");
        // Inicialize o Selectize para o elemento select "cidadeUsuario"
        tipoAcessoUsuario.selectize({
            create: false,
            sortField: 'text',
            allowEmptyOption: true,
            placeholder: 'Selecione o tipo de Usuario'
        });

    });

</script>