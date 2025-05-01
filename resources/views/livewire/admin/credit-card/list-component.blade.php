<div>
    <div class="card mt-3">
        <div class="card-header bg-primary d-flex justify-content-between ">
            <span>Todos cartões</span>
            <button class="btn btn-light btn-sm ml-auto" data-toggle="modal" data-target="#newCardModal">
                <i class="fas fa-plus"></i>
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="newCardModal" tabindex="-1" role="dialog" aria-labelledby="newCardModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newCardModalLabel">Novo Cartão</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Form content for creating a new card goes here -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <livewire:credit-cards-table />
        </div>
    </div>


</div>