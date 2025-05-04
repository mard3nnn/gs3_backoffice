<div>

    <form wire:submit.prevent="save">

        @include('components.alert-message')

        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cardNumber">Número do Cartão</label>
                    <input type="text" class="form-control" id="cardNumber" wire:model.live="cardNumber"
                           placeholder="Digite o número do cartão">
                    @error('cardNumber') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="limit">Limite</label>
                    <input type="number" class="form-control" id="limit" wire:model.live="limit"
                           placeholder="Digite o limite do cartão">
                    @error('limit') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

        </div>
        <div class="form-group">
            <label for="cardName">Nome do Cartão</label>
            <input type="text" class="form-control" id="cardName" wire:model.live="cardName"
                   placeholder="Digite o nome do cartão">
            @error('cardName') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="bestPurchaseDay">Melhor Dia de Compra</label>
            <input type="number" class="form-control" id="bestPurchaseDay" placeholder="Digite o melhor dia de compra"
                   wire:model="bestPurchaseDay">
            @error('bestPurchaseDay') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>

        @if($isUpdate)
            <div class="form-group">
                <label for="userList">Usuários</label>
                <select class="form-control" id="userList" wire:model="userId">
                    <option value="">Selecione um usuário</option>
                    @foreach ($userList as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>

                @error('userId') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
        @else
            <div class="form-group">
                <label for="userList">Usuários</label>
                <select class="form-control" id="userList" wire:model.live="userId">
                    <option value="">Selecione um usuário</option>
                    @foreach ($userList as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>

                @error('userId') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

        @endif

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>

</div>
