<style>
    .spinner-container {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.spinner-backdrop {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.8); /* Backdrop color with transparency */
}

</style>

<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-bottom: 6px"><i class="fas fa-lock"></i>
            {{ __('Administrador') }}
        </h2>
        
        
        <div class="row">
            <div class="col-sm-4">
                <div class="small-box bg-gradient" style="background-color: #0049b6">
                    <div class="inner" style="color: white">
                        <p>Total de Usuários Cadastrados:</p>
                        <div class="spinner-border text-light" id="spinnerTotalUsuario" role="status" style="margin-bottom: 20px">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <h3 id="quantidadeUsuario" style="display: none;"></h3>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        {{-- More info <i class="fas fa-arrow-circle-right"></i> --}}
                    </a>
                </div>
            </div>                  
        </div>
    </x-slot>

    <div class="py-1">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-1">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" id="areaUsuario">
                <div class="p-6 bg-white border-b border-gray-200 button-container row align-items-center">
                    {{-- <h2>Pessoa Física</h2> --}}
                    <div class="col-md mb-2">
                        <button type="button" id="adicionarUsuario" class="btn btn-primary w-100"
                            data-bs-toggle="modal" data-bs-target="#modalAdicionarUsuario">
                            <i class="fas fa-plus"></i> Adicionar Usuário
                        </button>
                    </div>
                    <div class="col-md mb-2">
                        <button type="button" id="buttonListarUsuario" class="btn btn-primary w-100">
                            <i class="fas fa-list-ul"></i> Listar Usuários
                        </button>
                    </div>
                    <div class="col-md mb-2">
                        <button type="button" id="buttonLimparTabelaUsuario" class="btn btn-primary w-100">
                            <i class="fas fa-eraser"></i> Limpar Pesquisa
                        </button>
                    </div>
                    <div class="col-md-4 mb-4" style="margin-bottom: 30px !important">
                        <x-input-label for="pesquisquantidadeUsuario" id="psesquisarUsuarioLabel" :value="__('Pesquisar Usuario')"
                            style="font-weight: bold;" />
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                            <x-text-input id="pesquisarUsuario" class="form-control" type="text"
                                name="pesquisarUsuario" :value="old('pesquisarUsuario')" placeholder="Digite para pesquisar Cliente..."
                                required autofocus />
                        </div>
                        <x-input-error :messages="$errors->get('pesquisarUsuario')" class="mt-2" />
                    </div>
                </div>
                <div id="loadingSpinner" class="text-center spinner-container" style="display: none;">
                    <div class="spinner-backdrop"></div>
                    <button class="btn btn-primary spinner-button" type="button" disabled>
                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                        Carregando...
                    </button>
                </div>
            </div>

            
            
            {{-- trazendo o conteúdo da referida view --}}
            @include('components.administrador.tabelaAdministrador')
        </div>
    </div>
    

</x-app-layout>

@include('components.administrador.modalAdicionarUsuario')

<script>
    /* POST função click que envia os dados do form #formAdicionarEditarCliente por ajax*/
    $("#cadastrarUsuario").click(function(e) {
            e.preventDefault();
            /* esta variável recebe as propriedades de um spinner de atualizando */
            var spinnerHtml = `
             <div id="adicionarSpinnerModalAdicionarUsuario" class="text-center">
                 <button class="btn btn-primary" type="button" disabled>
                     <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                     Adicionando...
                 </button>
             </div>
         `;

          // Função para mostrar o spinner no lugar do botão "Cadastrar"
function mostrarSpinner() {
    var spinnerButton = $(spinnerHtml);
    $("#cadastrarUsuario").replaceWith(spinnerButton);
}
mostrarSpinner();

// Função para restaurar o botão "Cadastrar" no lugar do spinner
function restaurarBotaoCadastrarUsuario() {
    var cadastrarButton = $("<button type='button' class='btn btn-primary' id='cadastrarUsuario' title='Clique para salvar'><i class='fas fa-check'></i> Cadastrar</button>");
    $("#adicionarSpinnerModalAdicionarUsuario").replaceWith(cadastrarButton);
}


            /* objeto vazio para receber os dados dos inputs do form #formAdicionarEditarCliente*/
            let $dadosUsuario = {};

            // todos os dados do form são adicionados em um array um a um, em $dadosUsuario
            $("#formAdicionarUsuario").serializeArray().forEach(function(field) {
                $dadosUsuario[field.name] = field.value;
            });

            // Pegue o token CSRF da meta tag
            let csrfToken = $('meta[name="csrf-token"]').attr('content');

            /* $data recebe o conteudo de $dadosUsuario no formato json string */
            let $data = JSON.stringify($dadosUsuario);
            console.log($data);

            /* ajax POST adicionar novo cliente */
            $.ajax({
                type: "POST",
                url: "/adicionarUsuario",
                data: $data,
                headers: {
                    // Adicione o token CSRF ao cabeçalho da solicitação
                    'X-CSRF-TOKEN': csrfToken
                },
                contentType: "application/json",
                dataType: "json",
                success: function(response) {
                    $("#modalAdicionarUsuario").modal('hide');
                    restaurarBotaoCadastrarUsuario();
                    // Exibir o SweetAlert de sucesso
                    swal("Usuário Adicionado com Sucesso!", "", "success");
                    /* método que recarrega o grid de clientes, já atualizado */
                    listarUsuario();
                },
                error: function(xhr, status, error) {
                    restaurarBotaoCadastrarUsuario();
                    // Se a resposta da API incluir mensagens de erro
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        var errorMessages = Object.values(xhr.responseJSON.errors).join("\n");
                        restaurarBotaoCadastrarUsuario();
                        swal("Erro ao Adicionar Usuário", errorMessages, "error");
                    } else {
                        // Caso contrário, exiba uma mensagem genérica
                        restaurarBotaoCadastrarUsuario();
                        swal("Erro ao Adicionar Usuário",
                            "Verifique sua conexão com a internet.", "error");
                    }
                }
            });

        });
</script>


<script src="{{ asset('js/jsgrid.min.js') }}"></script>