<div class="modal fade" id="modalVisualizarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #6c757d">
                <h5 style="color: white" class="modal-title"><i class="fas fa-user"></i> Dados Completos do Usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              {{--   <form method="POST" action="" id="formAdicionarUsuario"> --}}
                    @csrf

                    <!-- tag de dados pessoais -->
                    <div class="mb-3">
                        <h1 class="d-flex align-items-center justify-content-center" style="background-color: rgb(240, 240, 240)">DADOS PESSOAIS</h1>
                    </div>

                    <div>
                        <x-input-label for="visualizarNomeUsuario" :value="__('Nome Completo')" />
                        <x-text-input id="visualizarNomeUsuario" class="block mt-1 w-full" type="text" name="visualizarNomeUsuario"
                            :value="old('visualizarNomeUsuario')" placeholder="Digite" disabled />
                        <x-input-error :messages="$errors->get('visualizarNomeUsuario')" class="mt-2" />
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="visualizarEstadoRgUsuario" :value="__('Estado do RG')" />
                                <x-text-input id="visualizarEstadoRgUsuario" name="visualizarEstadoRgUsuario"
                                    class="block mt-1 w-full shadow-sm border-gray-300 rounded-md" disabled />

                                <x-input-error :messages="$errors->get('visualizarEstadoRgUsuario')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="visualizarRgUsuario" :value="__('RG')" />
                                <x-text-input id="visualizarRgUsuario" class="block mt-1 w-full" type="number" name="visualizarRgUsuario"
                                    :value="old('visualizarRgUsuario')" disabled />
                                <x-input-error :messages="$errors->get('visualizarRgUsuario')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="visualizarCpfUsuario" :value="__('CPF')" />
                                <x-text-input id="visualizarCpfUsuario" class="block mt-1 w-full" type="text" name="visualizarCpfUsuario"
                                    :value="old('visualizarCpfUsuario')" disabled />
                                <x-input-error :messages="$errors->get('visualizarCpfUsuario')" class="mt-2" />
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
                                <x-input-label for="visualizarEmailUsuario" :value="__('E-mail')" />
                                <x-text-input id="visualizarEmailUsuario" class="block mt-1 w-full" type="email"
                                    name="visualizarEmailUsuario" :value="old('visualizarEmailUsuario')" disabled />
                                <x-input-error :messages="$errors->get('visualizarEmailUsuario')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="visualizarCelularUsuario" id="visualizarCelularWhatsappUsuario" :value="__('Celular')" />
                                <x-text-input id="visualizarCelularUsuario" class="block mt-1 w-full" type="text"
                                    name="visualizarCelularUsuario" :value="old('visualizarCelularUsuario')" disabled />
                                <x-input-error :messages="$errors->get('visualizarCelularUsuario')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="visualizarTelefoneUsuario" :value="__('Telefone')" />
                                <x-text-input id="visualizarTelefoneUsuario" class="block mt-1 w-full" type="text"
                                    name="visualizarTelefoneUsuario" :value="old('visualizarTelefoneUsuario')" disabled />
                                <x-input-error :messages="$errors->get('visualizarTelefoneUsuario')" class="mt-2" />
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
                                <x-input-label for="visualizarEnderecoUsuario" :value="__('Endereço')" />
                                <x-text-input id="visualizarEnderecoUsuario" class="block mt-1 w-full" type="text"
                                    name="visualizarEnderecoUsuario" :value="old('visualizarEnderecoUsuario')" disabled />
                                <x-input-error :messages="$errors->get('visualizarEnderecoUsuario')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mt-2">
                                <x-input-label for="visualizarNumeroUsuario" :value="__('Número')" />
                                <x-text-input id="visualizarNumeroUsuario" class="block mt-1 w-full" type="number"
                                    name="visualizarNumeroUsuario" :value="old('visualizarNumeroUsuario')" disabled />
                                <x-input-error :messages="$errors->get('visualizarNumeroUsuario')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mt-2">
                                <x-input-label for="visualizarComplementoUsuario" :value="__('Complemento')" />
                                <x-text-input id="visualizarComplementoUsuario" class="block mt-1 w-full" type="text"
                                    name="visualizarComplementoUsuario" :value="old('visualizarComplementoUsuario')" disabled />
                                <x-input-error :messages="$errors->get('visualizarComplementoUsuario')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <!-- Select de Estado -->
                            <div class="mt-2">
                                <x-input-label for="visualizarEstadoUsuario" :value="__('Estado')" />
                                <x-text-input id="visualizarEstadoUsuario" class="block mt-1 w-full" name="visualizarEstadoUsuario" disabled />
                                    
                                {{-- <x-input-error :messages="$errors->get('visualizarEstadoUsuario')" class="mt-2" /> --}}
                            </div>
                        </div>

                        <div class="col-md-8">
                            <!-- Select de Cidade -->
                            <div class="mt-2">
                                <x-input-label for="visualizarCidadeUsuario" :value="__('Cidade')" />
                                <x-text-input id="visualizarCidadeUsuario" class="lock mt-1 w-full" name="visualizarCidadeUsuario" disabled />

                             
                                <x-input-error :messages="$errors->get('visualizarCidadeUsuario')" class="mt-2" />
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
                                <x-input-label for="visualizarTipoAcessoUsuario" :value="__('Nível de Acesso')" />
                                <x-text-input id="visualizarTipoAcessoUsuario" class="lock mt-1 w-full" name="visualizarTipoAcessoUsuario" disabled />
                                    
                                <x-input-error :messages="$errors->get('visualizarTipoAcessoUsuario')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mt-2">
                                    <x-input-label for="visualizarUltimaAtualizacaoUsuario" :value="__('Última Atualização')" />
                                    <x-text-input id="visualizarUltimaAtualizacaoUsuario" class="block mt-1 w-full"
                                        type="text" name="visualizarUltimaAtualizacaoUsuario" :value="old('visualizarUltimaAtualizacaoUsuario')"
                                        autofocus disabled />
                                    <x-input-error :messages="$errors->get('visualizarUltimaAtualizacaoUsuario')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-2">
                                    <x-input-label for="visualizarDataCadastroUsuario" :value="__('Data de Cadastro')" />
                                    <x-text-input id="visualizarDataCadastroUsuario" class="block mt-1 w-full"
                                        type="text" name="visualizarDataCadastroUsuario" :value="old('visualizarDataCadastroUsuario')"
                                        autofocus disabled />
                                    <x-input-error :messages="$errors->get('visualizarDataCadastroUsuario')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                    </div>

              {{--   </form> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Clique para fechar este formulário"><i class="fas fa-times"></i> Fechar</button>
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

    /* Inserção de Masc */
    /* $('#visualizarCpfUsuario').inputmask("999.999.999-99");
    $('#visualizarCelularUsuario').inputmask("(99) 99999-9999");
    $('#visualizarTelefoneUsuario').inputmask("(99) 9999-9999"); */

   

</script>