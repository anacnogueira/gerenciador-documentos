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
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>Os campos com * são obrigatórios</p>
                    <form method="POST" action="{{ route('profile.update') }}">
                        @method('PUT')
                        @csrf
                        <x-adminlte-input name="name" label="Nome:*" value="{{ $user->name ?? ''}}" enable-old-support/>

                       <x-adminlte-input name="email" type="email" label="E-mail:*" value="{{ $user->email ?? ''}}" enable-old-support/>

                       <x-adminlte-input name="role"  label="Função:*" value="{{ $user->role ?? ''}}" enable-old-support/>

                        <x-adminlte-input name="document" label="Documento:*" value="{{ $user->document ?? ''}}" enable-old-support/>

                        <x-adminlte-button type="submit" label="Salvar" theme="success" icon="fas fa-check"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop