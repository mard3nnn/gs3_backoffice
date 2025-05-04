<div>
    @include('components.alert-message')

    <form wire:submit.prevent="save">
        @csrf

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="name" wire:model.live="name"
                   placeholder="Digite seu nome"
                   value="{{ old('name', $name ?? '') }}">
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            {{ $name }}
            <input type="email" class="form-control" id="email" name="email" wire:model="email"
                   placeholder="Digite seu e-mail"
                   value="{{ old('email', $email ?? '') }}">
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="profile">Perfis vinculados</label>
                    <small> | Ao clicar o perfil será <b>desvinculado</b>.</small>
                    <br>
                    @foreach($userProfiles as $profile)
                        <span class="btn btn-primary" wire:click='unlinkRole("{{ $profile }}")'>{{ $profile }}</span>
                    @endforeach
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="profile">Todas permissões do usuário</label><br>
                    @foreach($permissions as $permission)
                        <span class="badge badge-dark">{{ $permission }}</span>
                    @endforeach
                </div>
            </div>
        </div>
        <hr>

        <div class="form-group">
            <label for="profile">Perfis disponíveis</label>
            <small> | Ao clicar o perfil será <b>vinculado</b>.</small>
            <br>
            @foreach($profiles as $profile)
                <span class="btn btn-info" wire:click="linkRole({{ $profile->id }})">{{ $profile->name }}</span>
            @endforeach
        </div>
    </form>
</div>
