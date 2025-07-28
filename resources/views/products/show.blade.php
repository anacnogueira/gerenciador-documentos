@extends('adminlte::page')

@section('title', 'Visualizar Produto')

@section('content_header')
    <h1>Visualizar Produto</h1>
@stop

@section('plugins.Sweetalert2', true)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <dl>
                        <dt>ID:</dt>
                        <dd>{{ $product->id }}&nbsp;</dd>
                        <dt>Marca:</dt>
                        <dd>{{ $product->brand }}&nbsp;</dd>
                        <dt>Modelo:</dt>
                        <dd>{{ $product->model }}&nbsp;</dd>
                        <dt>Número de série:</dt>
                        <dd>{{ $product->serial_number }}&nbsp;</dd>
                        <dt>Processador:</dt>
                        <dd>{{ $product->processor }}&nbsp;</dd>
                        <dt>Memória:</dt>
                        <dd>{{ $product->memory }}&nbsp;</dd>
                        <dt>Disco:</dt>
                        <dd>{{ $product->disk }}&nbsp;</dd>
                        <dt>Preço:</dt>
                        <dd>{{ $product->price }}&nbsp;</dd>
                        <dt>Faixa de Preço:</dt>
                        <dd>{{ $product->price_string }}&nbsp;</dd>
                    </dl>

                    <div class="row" style="margin-top: 20px">
                        <div class="col-md-12">
                            <div class="btn-group" style="display: inline">
                                    <a href="{{ route('produtos.edit', $product->id) }}" class="btn btn-success">
                                        <i class="fa fa-pen"></i> Editar
                                    </a>
                                    <form action="{{ route('produtos.destroy', $product->id) }}" method="POST" class="frm-delete" style="display: inline">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" title="Delete">
                                            <i class="fa fa-trash"></i>  Excluir
                                        </button>
                                    </form>

                                    <a href="{{ route('produtos.index') }}" class="btn btn-warning">
                                        <i class="fa fa-list-alt"></i> Listar
                                    </a>
                                    <a href="{{ route('produtos.create') }}" class="btn btn-primary">
                                        <i class="fa fa-file"></i> Adicionar
                                    </a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <script  type="text/javascript" src="{{ asset('js/utils/deleteConfirm.js') }}"></script>
@endpush