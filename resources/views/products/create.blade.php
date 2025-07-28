@extends('adminlte::page')

@section('title', 'Inserir Produto')

@section('content_header')
    <h1>Novo Produto</h1>
@stop


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <p>Os campos com * são obrigatórios</p>
                    <form method="POST" action="{{ route('produtos.store') }}">
                        @include('products.partials.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop