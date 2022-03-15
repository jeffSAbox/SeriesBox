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
            <div>
                {{ $serie->nome }}
            </div>
            <div class="d-flex">
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
@endsection