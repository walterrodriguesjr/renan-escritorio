<div class="modal fade" id="modalAdicionarEditarCliente" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastrar Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Nome -->
                    <div>
                        <x-input-label for="nomeCliente" :value="__('Nome Completo')" />
                        <x-text-input id="nomeCliente" class="block mt-1 w-full" type="text" name="nomeCliente"
                            :value="old('nomeCliente')" placeholder="Digite" required autofocus />
                        <x-input-error :messages="$errors->get('nomeCliente')" class="mt-2" />
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="rgEstado" :value="__('Estado do RG')" />
                                <select id="rgEstado" name="rgEstado"
                                    class="block mt-1 w-full shadow-sm border-gray-300 rounded-md" required autofocus>

                                </select>
                                <x-input-error :messages="$errors->get('rgEstado')" class="mt-2" />
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
                                <x-text-input id="cpfCliente" class="block mt-1 w-full" type="number" name="cpfCliente"
                                    :value="old('cpfCliente')" placeholder="Digite" required autofocus />
                                <x-input-error :messages="$errors->get('cpfCliente')" class="mt-2" />
                            </div>
                        </div>
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
                                <x-text-input id="celularCliente" class="block mt-1 w-full" type="number"
                                    name="celularCliente" :value="old('celularCliente')" placeholder="Digite" autofocus />
                                <x-input-error :messages="$errors->get('celularCliente')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="telefoneCliente" :value="__('Telefone')" />
                                <x-text-input id="telefoneCliente" class="block mt-1 w-full" type="number"
                                    name="telefoneCliente" :value="old('telefoneCliente')" placeholder="Digite" autofocus />
                                <x-input-error :messages="$errors->get('telefoneCliente')" class="mt-2" />
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
                                <x-input-label for="complementoEnderecoCliente" :value="__('Complento')" />
                                <x-text-input id="complementoEnderecoCliente" class="block mt-1 w-full"
                                    type="text" name="complementoEnderecoCliente" :value="old('complementoEnderecoCliente')"
                                    placeholder="Digite" autofocus />
                                <x-input-error :messages="$errors->get('complementoEnderecoCliente')" class="mt-2" />
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Cadastrar</button>
            </div>
        </div>
    </div>
</div>


<!-- Certifique-se de incluir o jQuery antes do código do Selectize -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Certifique-se de incluir a biblioteca Selectize -->
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.bootstrap4.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js"></script>

<script>
    // Função para preencher o select "cidadeCliente" com os municípios
    function popularCidades(data) {
        var select = $('#cidadeCliente');

        // Limpar o select antes de preencher novamente
        select.empty();

        // Adicionar opção padrão
        select.append('<option value="">Selecione a cidade</option>');

        // Ordenar os municípios em ordem alfabética
        data.sort(function(a, b) {
            return a.nome.localeCompare(b.nome);
        });

        // Adicionar as opções dos municípios em ordem alfabética
        $.each(data, function(index, cidade) {
            var option = $('<option></option>').attr('value', cidade.sigla).text(
                cidade.nome);
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

    // Aguarde o documento estar pronto
    $(document).ready(function() {
        // Busque os dados da API do IBGE e preencha o select "estadoCliente"
        $.ajax({
            url: 'https://servicodados.ibge.gov.br/api/v1/localidades/estados',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                var rgEstadoSelect = $('#rgEstado');
                var estadoSelect = $('#estadoCliente');

                // Ordenar os estados em ordem alfabética
                data.sort(function(a, b) {
                    return a.nome.localeCompare(b.nome);
                });

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
