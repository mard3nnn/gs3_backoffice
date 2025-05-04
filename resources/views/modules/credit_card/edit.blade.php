@extends('adminlte::page')

@section('content')
<br>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Editar cartão - {{ $card->card_name }}</h3>
    </div>
    <div class="card-body">

        @livewire('admin.credit-card.create-card', ['isUpdate' => true, 'cardId' => $card->id])
    </div>
</div>

<div class="card">
    <div class="card-header bg-primary">
        <h3 class="card-title">Transações do cartão</h3>
    </div>
    <div class="card-body">
        <livewire:tables.credit-card-transaction/>
    </div>
</div>

@stop

@section('js')
@livewireScripts

@stop

@section('css')
@livewireStyles
@stop
