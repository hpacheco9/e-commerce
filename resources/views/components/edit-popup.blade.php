<!-- resources/views/components/edit-popup.blade.php -->

<div class="modal fade" id="editMedicamentoModal" tabindex="-1" aria-labelledby="editMedicamentoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editMedicamentoModalLabel">Edit Medicamento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Form to edit medicamento details -->
          <form id="editMedicamentoForm" method="POST" action="{{ route('medicamentos.update')}}">
            @csrf
            @method('PATCH')

            <div class="mb-3">
              <label for="editNome" class="form-label">Nome</label>
              <input type="text" class="form-control" id="editNome" name="nome" required>
            </div>
            <div class="mb-3">
              <label for="editQuantidade" class="form-label">Quantidade</label>
              <input type="number" class="form-control" id="editQuantidade" name="quantidade" required>
            </div>
            <div class="mb-3">
              <label for="editIndustria" class="form-label">Indústria</label>
              <input type="text" class="form-control" id="editIndustria" name="industria" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
