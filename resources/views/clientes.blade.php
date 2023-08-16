<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight"><i class="fas fa-users"></i>
            {{ __('Clientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <button type="button" id="adicionarCliente" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalAdicionarEditarCliente"><i class="fas fa-plus"></i> Adicionar</button>
                </div>
            </div>
            {{-- trazendo o conteudo da referida view --}}
            @include('components.tabelaCliente')
        </div>
    </div>
</x-app-layout>

<!-- Incluir o modal -->
@include('components.modalAdicionarEditarCliente')
@include('components.modalVisualizarCliente')

<script>
    $(document).ready(function() {
        /* função que lista os clientes, está em tabelaCLiente.blade.php */
        listarClientes();
    });

    $('#adicionarCliente').click(function(e) {
        e.preventDefault();
        /* alert("teste") */

    });
</script>

{{-- incluindo a biblioteca jsGrid após toda página ser carregada, evita o erro --}}
<script src="{{ asset('js/jsgrid.min.js') }}"></script>
