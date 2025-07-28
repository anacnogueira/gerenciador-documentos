@csrf

<x-adminlte-input name="brand" label="Marca:*" value="{{ $product ? $product->brand : ''}}" enable-old-support/>

<x-adminlte-input name="model" label="Modelo:*" value="{{ $product ? $product->model : ''}}" enable-old-support/>

<x-adminlte-input name="serial_number" label="Número de série:*" value="{{ $product ? $product->serial_number : ''}}" enable-old-support/>

<x-adminlte-input name="processor" label="Processador:*" value="{{ $product ? $product->processor : ''}}" enable-old-support/>

<x-adminlte-input name="memory" label="Memória:*" value="{{ $product ? $product->memory : ''}}" enable-old-support/>

<x-adminlte-input name="disk" label="Disco:*" value="{{ $product ? $product->disk : ''}}" enable-old-support/>

 <x-adminlte-input name="price" label="Preço:*" value="{{ $product ? $product->price : ''}}" enable-old-support/>

<x-adminlte-input name="price_string" label="Faixa de Preço:*" value="{{ $product ? $product->price_string : ''}}" enable-old-support/>

<a href="{{ route('produtos.index') }}" class="btn btn-warning"><i class="fa fa-times"></i> Cancelar</a>
<x-adminlte-button type="submit" label="Salvar" theme="success" icon="fas fa-check"/>

@push('js')
    <script  type="text/javascript" src="{{ asset('js/utils/priceMask.js') }}"></script>
@endpush