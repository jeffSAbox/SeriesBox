@extends('layout')

@section('titulo')
    SERIES
@endsection

@section('conteudo')
<ul class="list-group">
    @foreach ($listaSeries as $serie)
    <li class="list-group-item">{{ $serie->nome }}</li>    
    @endforeach
</ul>
@endsection