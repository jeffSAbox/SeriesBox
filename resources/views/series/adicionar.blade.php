@extends('layout')

@section('titulo')
    Adicionar Serie
@endsection

@section('conteudo')

@include('components.error', ['errors' => $errors])

<form method="post">
    @csrf
    <div class="row">
        <div class="col col-8">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome">
        </div>
        
        <div class="col col-2">
            <label for="qtd_temporada">Qtd Temporadas</label>
            <input type="number" class="form-control" name="qtd_temporada" id="qtd_temporada">
        </div>

        <div class="col col-2">
            <label for="qtd_episodio">Qtd Episodios</label>
            <input type="number" class="form-control" name="qtd_episodio" id="qtd_episodio">
        </div>

    </div>
    <br />
    <button class="btn btn-primary">Adicionar</button>
</form>
@endsection