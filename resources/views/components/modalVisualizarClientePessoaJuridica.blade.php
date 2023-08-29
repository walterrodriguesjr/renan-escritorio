<div class="modal fade" id="modalVisualizarClientePessoaJuridica" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #6c757d; color: white">
                <h5 class="modal-title" id="cabecalhoModalAdicionarEditarClientePessoaJuridica"><i class="fas fa-address-card"></i> Dados Completos do Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="GET" action="" id="formVisualizarCliente">
                    @csrf
 
                    <!-- tag de dados pessoais -->
                    <div class="mb-3">
                        <h1 class="d-flex align-items-center justify-content-center" style="background-color: rgb(240, 240, 240)">DADOS DA EMPRESA</h1>
                    </div>

                    <div>
                        <x-input-label for="visualizarNomeFantasia" :value="__('Nome Fantasia')" />
                        <x-text-input id="visualizarNomeFantasia" class="block mt-1 w-full" type="text" name="visualizarNomeFantasia"
                            :value="old('visualizarNomeFantasia')" placeholder="Digite" disabled autofocus />
                        <x-input-error :messages="$errors->get('visualizarNomeFantasia')" class="mt-2" />
                    </div>

                    <div class="mt-2">
                        <x-input-label for="visualizarRazaoSocial" :value="__('Razão Social')" />
                        <x-text-input id="visualizarRazaoSocial" class="block mt-1 w-full" type="text" name="visualizarRazaoSocial"
                            :value="old('visualizarRazaoSocial')" placeholder="Digite" disabled autofocus />
                        <x-input-error :messages="$errors->get('visualizarRazaoSocial')" class="mt-2" />
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="visualizarCnpj" :value="__('CNPJ')" />
                                <x-text-input id="visualizarCnpj" class="block mt-1 w-full" type="number" name="visualizarCnpj"
                                    :value="old('visualizarCnpj')" placeholder="Digite" disabled autofocus />
                                <x-input-error :messages="$errors->get('visualizarCnpj')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="visualizarStatus" :value="__('Status')" />
                                <x-text-input id="visualizarStatus" class="block mt-1 w-full" type="text" name="visualizarStatus"
                                    :value="old('visualizarStatus')" placeholder="Digite" disabled autofocus />
                                <x-input-error :messages="$errors->get('visualizarStatus')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="visualizarDataAbertura" :value="__('Data de Abertura')" />
                                <x-text-input id="visualizarDataAbertura" class="block mt-1 w-full" type="text" name="visualizarDataAbertura"
                                    :value="old('visualizarDataAbertura')" placeholder="Digite" disabled autofocus />
                                <x-input-error :messages="$errors->get('visualizarDataAbertura')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-8">
                            <div class="mt-2">
                                <x-input-label for="visualizarCnaePrincipalDescricao" :value="__('CNAE Principal Descrição')" />
                                <x-text-input id="visualizarCnaePrincipalDescricao" class="block mt-1 w-full" type="text" name="visualizarCnaePrincipalDescricao"
                                    :value="old('visualizarCnaePrincipalDescricao')" placeholder="Digite" disabled autofocus />
                                <x-input-error :messages="$errors->get('visualizarCnaePrincipalDescricao')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="visualizarCnaePrincipalCodigo" :value="__('CNAE Principal Código')" />
                                <x-text-input id="visualizarCnaePrincipalCodigo" class="block mt-1 w-full" type="number" name="visualizarCnaePrincipalCodigo"
                                    :value="old('visualizarCnaePrincipalCodigo')" placeholder="Digite" disabled autofocus />
                                <x-input-error :messages="$errors->get('visualizarCnaePrincipalCodigo')" class="mt-2" />
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
                                <x-input-label for="visualizarEmail" :value="__('E-mail')" />
                                <x-text-input id="visualizarEmail" class="block mt-1 w-full" type="email"
                                    name="visualizarEmail" :value="old('visualizarEmail')" placeholder="Digite" disabled autofocus />
                                <x-input-error :messages="$errors->get('visualizarEmail')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="visualizarDdd" :value="__('DDD')" />
                                <x-text-input id="visualizarDdd" class="block mt-1 w-full" type="text"
                                    name="visualizarDdd" :value="old('visualizarDdd')" placeholder="Digite" disabled autofocus />
                                <x-input-error :messages="$errors->get('visualizarDdd')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="visualizarTelefone" :value="__('Telefone')" />
                                <x-text-input id="visualizarTelefone" class="block mt-1 w-full" type="text"
                                    name="visualizarTelefone" :value="old('visualizarTelefone')" placeholder="Digite" disabled autofocus />
                                <x-input-error :messages="$errors->get('visualizarTelefone')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <br>

                    <!-- tag de endereços -->
                    <div class="mb-2">
                        <h1 class="d-flex align-items-center justify-content-center" style="background-color: rgb(240, 240, 240)">ENDEREÇOS</h1>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-8">
                            <div class="mt-2">
                                <x-input-label for="visualizarLogradouro" :value="__('Endereço')" />
                                <x-text-input id="visualizarLogradouro" class="block mt-1 w-full" type="text"
                                    name="visualizarLogradouro" :value="old('visualizarLogradouro')" placeholder="Digite" disabled autofocus />
                                <x-input-error :messages="$errors->get('visualizarLogradouro')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mt-2">
                                <x-input-label for="visualizarNumero" :value="__('Número')" />
                                <x-text-input id="visualizarNumero" class="block mt-1 w-full" type="number"
                                    name="visualizarNumero" :value="old('visualizarNumero')" placeholder="Digite" disabled autofocus />
                                <x-input-error :messages="$errors->get('visualizarNumero')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mt-2">
                                <x-input-label for="visualizarComplemento" :value="__('Complemento')" />
                                <x-text-input id="visualizarComplemento" class="block mt-1 w-full" type="text"
                                    name="visualizarComplemento" :value="old('visualizarComplemento')" placeholder="Digite" disabled autofocus />
                                <x-input-error :messages="$errors->get('visualizarComplemento')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="visualizarUf" :value="__('Estado')" />
                                <x-text-input id="visualizarUf" class="block mt-1 w-full" type="text"
                                    name="visualizarUf" :value="old('visualizarUf')" disabled
                                    autofocus disabled />
                                <x-input-error :messages="$errors->get('visualizarUf')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-8">
                            <!-- Select de Cidade -->
                            <div class="col-md-12">
                                <div class="mt-2">
                                    <x-input-label for="visualizarMunicipio" :value="__('Cidade')" />
                                    <x-text-input id="visualizarMunicipio" class="block mt-1 w-full"
                                        type="text" name="visualizarMunicipio" :value="old('visualizarMunicipio')"
                                     autofocus disabled />
                                    <x-input-error :messages="$errors->get('visualizarMunicipio')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mt-2">
                                        <x-input-label for="visualizarUltimaAtualizacaoClientePessoaJuridica" :value="__('Última Atualização')" />
                                        <x-text-input id="visualizarUltimaAtualizacaoClientePessoaJuridica" class="block mt-1 w-full"
                                            type="text" name="visualizarUltimaAtualizacaoClientePessoaJuridica" :value="old('visualizarUltimaAtualizacaoClientePessoaJuridica')"
                                            autofocus disabled />
                                        <x-input-error :messages="$errors->get('visualizarUltimaAtualizacaoClientePessoaJuridica')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mt-2">
                                        <x-input-label for="visualizarDataCadastroClientePessoaJuridica" :value="__('Data de Cadastro')" />
                                        <x-text-input id="visualizarDataCadastroClientePessoaJuridica" class="block mt-1 w-full"
                                            type="text" name="visualizarDataCadastroClientePessoaJuridica" :value="old('visualizarDataCadastroClientePessoaJuridica')"
                                            autofocus disabled />
                                        <x-input-error :messages="$errors->get('visualizarDataCadastroClientePessoaJuridica')" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Clique para fechar este formulário"><i class="fas fa-times"></i> Fechar</button>
            </div>
        </div>
    </div>
</div>


<script>
    /* função que limpa os inputs do modal visualizar */
    function limparInputsModalVisualizarClientePessoaJuridica() {
        $("#visualizarNomeFantasia").val('');
        $("#visualizarRazaoSocial").val('');
        $("#visualizarCnpj").val('');
        $("#visualizarStatus").val('');
        $("#visualizarDataAbertura").val('');
        $("#visualizarCnaePrincipalDescricao").val('');
        $("#visualizarCnaePrincipalCodigo").val('');
        $("#visualizarEmail").val('');
        $("#visualizarDdd").val('');
        $("#visualizarLogradouro").val('');
        $("#visualizarNumero").val('');
        $("#visualizarComplemento").val('');
        $("#visualizarUf").val('');
        $("#visualizarMunicipio").val('');
        $("#visualizarUltimaAtualizacaoClientePessoaJuridica").val('');
        $("#visualizarDataCadastroClientePessoaJuridica").val('');
    };

    $("#modalVisualizarClientePessoaJuridica").on("hidden.bs.modal", function () {
        limparInputsModalVisualizarClientePessoaJuridica(); 
            });
</script>


