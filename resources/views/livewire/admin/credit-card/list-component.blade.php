<div>
    <div class="card mt-3">
        <div class="card-header bg-primary d-flex justify-content-between ">
            <span>Todos cartões</span>
            <a class="btn btn-light btn-sm ml-auto" href="{{ route('admin.credit-cards.create') }}">
                <i class="fas fa-plus text-dark"></i>
            </a>
        </div>


        <div class="card-body">
            <livewire:credit-cards-table />
        </div>
    </div>


</div>