@extends('adminlte::page')

@section('content')

    <div class="card mt-3">
        <div class="card-header bg-primary d-flex justify-content-between ">
            <span>Edição de usuário</span>
        </div>

        <div class="card-body">
            <livewire:admin.users.edit-user :userId="1"/>
        </div>
    </div>

@stop

@section('js')
@livewireScripts

@stop

@section('css')
@livewireStyles
@stop
