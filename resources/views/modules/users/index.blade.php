@extends('adminlte::page')

@section('content')

    <div class="card mt-3">
        <div class="card-header bg-primary d-flex justify-content-between ">
            <span>Todos usuários</span>
        </div>


        <div class="card-body">
            <livewire:tables.users-table/>
        </div>
    </div>

@stop

@section('js')
@livewireScripts

@stop

@section('css')
@livewireStyles
@stop
