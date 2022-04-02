<?php

namespace App\Http\Controllers;

use App\Events\EventoNovaSerieCriada;
use App\Http\Requests\SeriesAdicionarRequest;
use App\Models\Serie;
use App\Service\criadorSeries;
use App\Service\enviarEmailParaUsuarioLogado;
use App\Service\removedorSeries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeriesController extends Controller
{
    
    public function index(Request $request)
    {

        $listaSeries = Serie::query()->orderBy('nome')->get();

        $msg_alert = $request->session()->get("msg_alert");

        return view("series.index", compact('listaSeries', 'msg_alert'));

    }

    public function create()
    {
        return view("series.adicionar");
    }

    public function store(SeriesAdicionarRequest $request, criadorSeries $criadorSeries)
    {

        $dadosSerie = [
            $request->nome, 
            $request->qtd_temporada, 
            $request->qtd_episodio
        ];
        $serie = $criadorSeries->criarSerie(...$dadosSerie);
        
        $request->session()->flash(
            "msg_alert", "Serie {$serie->nome}, temporadas e episodios criado com sucesso!"
        );

        //  ENVIAR EMAIL
        $eventoNovaSerie = new EventoNovaSerieCriada(...$dadosSerie);
        event($eventoNovaSerie);

        return redirect()->route("listar_series");

    }

    public function destroy(Request $request, removedorSeries $removedorSeries)
    {
        
        $nomeSerie = $removedorSeries->removerSerie($request->id_serie);

        $request->session()->flash(
            "msg_alert",
            "Serie $nomeSerie deletada com sucesso!"
        );

        return redirect()->route("listar_series");
    }
    
    public function editarNome(int $id, Request $request)
    {
        $serie = Serie::where('id_serie', $id)->first();
        $serie->nome = $request->nome;
        
        $serie->save();
    }

}
