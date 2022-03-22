@extends('layout')

@section('titulo')
    Episodios da temporada {{ $temporada_numero }}
@endsection

@section('conteudo')

@include('components.mensagem', ['msg_alert' => $msg_alert])

<form action="/temporada/{{ $temporada_id }}/episodios/assistir" method="POST">
    <ul class="list-group">
        @foreach ($episodios as $episodio)
        <li class="list-group-item">
            <div class="d-flex justify-content-between align-items-center">
                Episodio {{ $episodio->numero }}
                <input type="checkbox" name='episodios[]' value="{{ $episodio->id }}" {{ $episodio->assistido ? "checked" : "" }}>
            </div>
        </li>    
        @endforeach
    </ul>
    <button class="btn btn-primary mt-2 mb-2">Salvar</button>
    @csrf
    @method('POST')
</form>
@endsection