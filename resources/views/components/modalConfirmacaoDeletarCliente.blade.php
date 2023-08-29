<div class="modal fade" tabindex="-1" id="modalConfirmacaoDeletarCliente">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #dc3545; color: white">
          <h5 class="modal-title"><i class="fas fa-exclamation-circle"></i> Atenção!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Deseja realmente DELETAR este Cliente?</p>
        </div>
        <div class="modal-footer">
          <div id="deletarSpinnerModal" class="text-center" style="display: none">
            <button class="btn btn-danger" type="button" disabled>
                <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                Deletando...
            </button>
        </div>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="Clique para fechar este formulário"><i class="fas fa-times"></i> Fechar</button>
          <button type="button" class="btn btn-danger deletar" id="buttonDeletarCliente" title="Clique para Deletar este Cliente"><i class="fas fa-trash"></i> Deletar</button>
        </div>
      </div>
    </div>
  </div>

  