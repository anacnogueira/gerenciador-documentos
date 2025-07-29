@csrf

<x-adminlte-input name="name" label="Nome:*" value="{{ $document ? $document->name : ''}}" enable-old-support/>

<x-adminlte-input-file name="file" label="Arquivo:*" placeholder="Escolha um arquivo..." legend="Procurar">
    <x-slot name="prependSlot">
        <div class="input-group-text bg-lightblue">
            <i class="fas fa-upload"></i>
        </div>
    </x-slot>
</x-adminlte-input-file>


<a href="{{ route('documentos.index') }}" class="btn btn-warning"><i class="fa fa-times"></i> Cancelar</a>
<x-adminlte-button type="submit" label="Salvar" theme="success" icon="fas fa-check"/>

