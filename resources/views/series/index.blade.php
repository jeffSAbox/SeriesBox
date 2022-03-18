@extends('layout')

@section('titulo')
    SERIES
@endsection

@section('conteudo')

@if( !empty($msg_alert) )
<div class="alert alert-success" role="alert">
    {{$msg_alert}}
</div>
@endif

<a href="{{ route('form_criar_serie') }}" role="button" class="btn btn-primary mb-2 mt-2">Adicionar</a>

<ul class="list-group">
    @foreach ($listaSeries as $serie)
    <li class="list-group-item">
        <div class="d-flex justify-content-between">
            <div id="nome-serie-{{ $serie->id_serie }}">
                {{ $serie->nome }}
            </div>

            <div class="input-group w-50" hidden id="input-nome-serie-{{ $serie->id_serie }}">
                <input type="text" class="form-control" value="{{ $serie->nome }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" onclick="editarSerie({{ $serie->id_serie }})">
                        Salvar
                    </button>
                    @csrf
                </div>
            </div>

            <div class="d-flex">
                <button class="btn btn-warning btn-sm me-1" onclick="toggleInput({{ $serie->id_serie }})">
                    Editar
                </button>
                <a href="/serie/{{ $serie->id_serie }}/temporadas" class="btn btn-info me-1">Temporadas</a>          
                <form method="POST" class="ml-5" action="/serie/{{ $serie->id_serie }}" onsubmit="return confirm('Tem certeza que deseja deletar a serie {{ $serie->nome }}')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Deletar</button>
                </form>
            </div>
        </div>
    </li>    
    @endforeach
</ul>
<script type="application/javascript">    
function toggleInput(serieId) {
    const nomeSerieEl = document.querySelector(`#nome-serie-${serieId}`);
    const inputSerieEl = document.querySelector(`#input-nome-serie-${serieId}`);
    if (nomeSerieEl.hasAttribute('hidden')) {
        nomeSerieEl.removeAttribute('hidden');
        inputSerieEl.hidden = true;
    } else {
        inputSerieEl.removeAttribute('hidden');
        nomeSerieEl.hidden = true;
    }
}    

function editarSerie(serieId) {
    
    const nomeSerie_novo = document.querySelector(`#input-nome-serie-${serieId} > input`).value;
    const _token = document.querySelector(`#input-nome-serie-${serieId} > div > input[name="_token"]`).value;
    const url = `serie/${serieId}/editarNome`;

    let params = new FormData();
    params.append('nome', nomeSerie_novo);
    params.append('_token', _token);
    
    fetch(url, {
        method: 'POST',
        body: params 
    }).then(() => {
        let nomeSerieEl = document.querySelector(`#nome-serie-${serieId}`);
        nomeSerieEl.innerHTML = nomeSerie_novo;
        toggleInput(serieId);
    });

}
</script>
@endsection