@extends('adminlte::page')

@section('title', 'Inserir Documento')

@section('content_header')
    <h1>Novo Documento</h1>
@stop

@section('plugins.InputMask', true)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <p>Os campos com * são obrigatórios</p>
                    <form method="POST" action="{{ route('documentos.store') }}" enctype="multipart/form-data">
                        @include('documents.partials.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop