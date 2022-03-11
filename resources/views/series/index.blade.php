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

<a href="/serie/adicionar" role="button" class="btn btn-primary mb-2 mt-2">Adicionar</a>

<ul class="list-group">
    @foreach ($listaSeries as $serie)
    <li class="list-group-item">{{ $serie->nome }}</li>    
    @endforeach
</ul>
@endsection