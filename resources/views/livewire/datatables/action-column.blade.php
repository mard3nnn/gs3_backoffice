<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-cog"></i>
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">


        @isset($editLink)
            <a class="dropdown-item" href="{{ $editLink }}">
                <i class="fa fa-edit me-2"></i> Editar
            </a>
        @endisset

        @isset($deleteLink)
            <form action="{{ $deleteLink }}" method="POST" x-data
                @submit.prevent="if (confirm('Você tem certeza que deseja excluir?')) $el.submit()">
                @method('DELETE')
                @csrf
                <button type="submit" class="dropdown-item text-danger">
                    <i class="fa fa-trash me-2"></i> Excluir
                </button>
            </form>
        @endisset
    </div>
</div>
