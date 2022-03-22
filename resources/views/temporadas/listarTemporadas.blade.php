@extends("layout")

@section('titulo')    
    {{ $serie->nome }}: Temporadas
@endsection

@section('conteudo')

<ul class="list-group">
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

