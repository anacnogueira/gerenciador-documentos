@extends('adminlte::page')

@section('title', 'Listar Documents')

@section('content_header')
    <h1>Documentos</h1>
@stop

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)
@section('plugins.Sweetalert2', true)

@section('content')
    @php
        $data = [];

        $heads = [
            ['label' => 'ID', 'width' => 5],
            'Nome',
            'Arquivo',
            ['label' => 'Ações', 'no-export' => true, 'width' => 5],
        ];

        foreach($documents  as $key => $document) {
            $data[$key] = [
                $document->id,
                $document->name,
                str_replace("documents/","",$document->file),
                '<nobr>
                    <a href="'. route('documentos.download', $document->id).'" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Download">
                        <i class="fa fa-lg fa-fw fa-download"></i>
                    </a>
                    <a href="'. route('documentos.edit', $document->id).'" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                    <i class="fa fa-lg fa-fw fa-pen"></i></a>
                    <form action="'.route('documentos.destroy', $document->id) .'" method="POST" class="frm-delete" style="display: inline">
                        <input type="hidden" name="_token" value="'.csrf_token().'">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Excluir">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>
                    </form>
                    <a href="'.route('documentos.show', $document->id) .'" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Detalhes">
                        <i class="fa fa-lg fa-fw fa-eye"></i>
                    </a>
                </nobr>',
            ];
        }

        $config = [
            'data' => $data,
            'order' => [[1, 'asc']],
            'columns' => [null, null, null, ['orderable' => false]],

        ];
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header"> <a href="{{ route('documentos.create') }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-lg fa-fw fa-file"></i> Adicionar
                </a></div>
                <div class="card-body">
                    <x-adminlte-datatable id="table-document" :heads="$heads" head-theme="light" hoverable bordered with-buttons>
                        @foreach($config['data'] as $row)
                            <tr>
                                @foreach($row as $cell)
                                    <td>{!! $cell !!}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>
                </div>
            </div>
        </div>
    </div>
@stop


@push('js')
    <script  type="text/javascript" src="{{ asset('js/utils/deleteConfirm.js') }}"></script>
    <script  type="text/javascript" src="{{ asset('js/utils/translateDatatable.js') }}"></script>
    <script type="text/javascript" defer>
        translate("#table-document");
    </script>
@endpush