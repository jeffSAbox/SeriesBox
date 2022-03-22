@extends("layout")

@section('titulo')
    
    {{ $serie->nome }}: Temporadas
@endsection

@section('conteudo')
<ul class="list-group">
    @foreach ($temporadas as $temporada)
    <li class="list-group-item">
        <div class="d-flex justify-content-between">
            <div>
                Temporada {{ $temporada->numero }}
            </div>
        </div>
    </li>    
    @endforeach
</ul>
@endsection

