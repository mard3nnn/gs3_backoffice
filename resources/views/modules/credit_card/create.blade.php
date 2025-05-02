@extends('adminlte::page')

@section('content')
<br>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Título do Cartão</h3>
    </div>
    <div class="card-body">
        <livewire:admin.credit-card.create-card />
    </div>
</div>

@stop

@section('js')
@livewireScripts

@stop

@section('css')
@livewireStyles
@stop