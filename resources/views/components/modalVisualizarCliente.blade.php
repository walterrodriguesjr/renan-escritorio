<div class="modal fade" id="modalVisualizarCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dados Completo do Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="GET" action="" id="formVisualizarCliente">
                    @csrf

                    <div>
                        <x-input-label for="visualizarNomeCliente" :value="__('Nome Completo')" />
                        <x-text-input id="visualizarNomeCliente" class="block mt-1 w-full" type="text"
                            name="visualizarNomeCliente" :value="old('visualizarNomeCliente')" placeholder="Digite" required autofocus disabled />
                        <x-input-error :messages="$errors->get('visualizarNomeCliente')" class="mt-2" />
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="visualizarEstadoRgCliente" :value="__('RG')" />
                                <x-text-input id="visualizarEstadoRgCliente" class="block mt-1 w-full" type="text"
                                    name="visualizarEstadoRgCliente" :value="old('visualizarEstadoRgCliente')" placeholder="Digite" required
                                    autofocus disabled />
                                <x-input-error :messages="$errors->get('visualizarEstadoRgCliente')" class="mt-2" />
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="visualizarRgCliente" :value="__('RG')" />
                                <x-text-input id="visualizarRgCliente" class="block mt-1 w-full" type="text"
                                    name="visualizarRgCliente" :value="old('visualizarRgCliente')" placeholder="Digite" required
                                    autofocus disabled />
                                <x-input-error :messages="$errors->get('visualizarRgCliente')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="visualizarCpfCliente" :value="__('CPF')" />
                                <x-text-input id="visualizarCpfCliente" class="block mt-1 w-full" type="text"
                                    name="visualizarCpfCliente" :value="old('visualizarCpfCliente')" placeholder="Digite" required
                                    autofocus disabled />
                                <x-input-error :messages="$errors->get('visualizarCpfCliente')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="visualizarEmailCliente" :value="__('E-mail')" />
                                <x-text-input id="visualizarEmailCliente" class="block mt-1 w-full" type="email"
                                    name="visualizarEmailCliente" :value="old('visualizarEmailCliente')" placeholder="Digite" required
                                    autofocus disabled />
                                <x-input-error :messages="$errors->get('visualizarEmailCliente')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="visualizarCelularCliente" :value="__('Celular')" />
                                <x-text-input id="visualizarCelularCliente" class="block mt-1 w-full" type="text"
                                    name="visualizarCelularCliente" :value="old('visualizarCelularCliente')" placeholder="Digite" autofocus disabled />
                                <x-input-error :messages="$errors->get('visualizarCelularCliente')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="visualizarTelefoneCliente" :value="__('Telefone')" />
                                <x-text-input id="visualizarTelefoneCliente" class="block mt-1 w-full" type="text"
                                    name="visualizarTelefoneCliente" :value="old('visualizarTelefoneCliente')" placeholder="Digite"
                                    autofocus disabled />
                                <x-input-error :messages="$errors->get('visualizarTelefoneCliente')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-8">
                            <div class="mt-2">
                                <x-input-label for="visualizarEnderecoCliente" :value="__('Endereço')" />
                                <x-text-input id="visualizarEnderecoCliente" class="block mt-1 w-full" type="text"
                                    name="visualizarEnderecoCliente" :value="old('visualizarEnderecoCliente')" placeholder="Digite"
                                    autofocus disabled />
                                <x-input-error :messages="$errors->get('visualizarEnderecoCliente')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mt-2">
                                <x-input-label for="visualizarNumeroCliente" :value="__('Número')" />
                                <x-text-input id="visualizarNumeroCliente" class="block mt-1 w-full" type="text"
                                    name="visualizarNumeroCliente" :value="old('visualizarNumeroCliente')" placeholder="Digite" autofocus disabled />
                                <x-input-error :messages="$errors->get('visualizarNumeroCliente')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mt-2">
                                <x-input-label for="visualizarComplementoCliente" :value="__('Complento')" />
                                <x-text-input id="visualizarComplementoCliente" class="block mt-1 w-full"
                                    type="text" name="visualizarComplementoCliente" :value="old('visualizarComplementoCliente')"
                                    placeholder="Digite" autofocus disabled />
                                <x-input-error :messages="$errors->get('visualizarComplementoCliente')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="mt-2">
                                <x-input-label for="visualizarEstadoCliente" :value="__('Estado')" />
                                <x-text-input id="visualizarEstadoCliente" class="block mt-1 w-full" type="text"
                                    name="visualizarEstadoCliente" :value="old('visualizarEstadoCliente')" placeholder="Digite" required
                                    autofocus disabled />
                                <x-input-error :messages="$errors->get('visualizarEstadoCliente')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-8">
                            <!-- Select de Cidade -->
                            <div class="col-md-12">
                                <div class="mt-2">
                                    <x-input-label for="visualizarCidadeCliente" :value="__('Cidade')" />
                                    <x-text-input id="visualizarCidadeCliente" class="block mt-1 w-full"
                                        type="text" name="visualizarCidadeCliente" :value="old('visualizarCidadeCliente')"
                                        placeholder="Digite" autofocus disabled />
                                    <x-input-error :messages="$errors->get('visualizarCidadeCliente')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>

            </div>
        </div>
    </div>
</div>


