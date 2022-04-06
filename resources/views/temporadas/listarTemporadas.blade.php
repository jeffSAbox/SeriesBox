@extends("layout")

@section('titulo')    
    {{ $serie->nome }}: Temporadas
@endsection

@section('conteudo')

<ul class="list-group">
    @if( $serie->capa )
    <div class="row">
        <div class="col-12 text-center">
            <img src="{{ $serie->capa_url }}" height="200" width="200" class="img-fluid mb-3" alt="{{ $serie->nome }}">
        </div>
    </div>
    @endif

    @foreach ($temporadas as $temporada)
    <li class="list-group-item">
        <div class="d-flex justify-content-between align-items-center">
            <a href="/temporada/{{ $temporada->id }}/episodios">
                Temporada {{ $temporada->numero }}
            </a>
            <span class="badge bg-secondary">
                {{ $temporada->getEpisodiosAssistidos()->count() }} / {{ $temporada->Episodios->count() }}
            </span>
        </div>
    </li>    
    @endforeach
    
</ul>
@endsection

