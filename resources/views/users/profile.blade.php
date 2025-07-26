@extends('adminlte::page')

@section('title', 'Editar Usuário')

@section('content_header')
    <h1>Editar Perfil Usuário</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <p>Os campos com * são obrigatórios</p>
                    <form method="POST" action="{{ route('users.update') }}">
                        @method('PUT')
                        @csrf
                        <x-adminlte-input name="name" label="Nome:*" value="{{ $user->name ?? ''}}" enable-old-support/>

                       <x-adminlte-input name="email" type="email" label="E-mail:*" value="{{ $user->email ?? ''}}" enable-old-support/>

                       <x-adminlte-input name="role"  label="Função:*" value="{{ $user->role ?? ''}}" enable-old-support/>

                        <x-adminlte-input name="document" label="Documento:*" value="{{ $user->document ?? ''}}" enable-old-support/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop