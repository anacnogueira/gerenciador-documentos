@extends('adminlte::page')

@section('title', 'Editar Documento')

@section('plugins.BsCustomFileInput', true)

@section('content_header')
    <h1>Editar Documento</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <p>Os campos com * são obrigatórios</p>
                    <form method="POST" action="{{ route('documentos.update', $document->id) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @include('documents.partials.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop