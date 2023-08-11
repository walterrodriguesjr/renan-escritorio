<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <button type="button" id="adicionarCliente" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalAdicionarEditarCliente">Adicionar</button>
                </div>
            </div>
            @include('components.tabelaCliente')
        </div>
    </div>



</x-app-layout>

<!-- Incluir o modal -->
@include('components.modalAdicionarEditarCliente')



<script>
    
    $(document).ready(function () {
        listarClientes();
    });

    $('#adicionarCliente').click(function(e) {
        e.preventDefault();
        /* alert("teste") */

    });
</script>
