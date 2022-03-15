<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesAdicionarRequest;
use App\Models\Serie;
use App\Service\criadorSeries;
use Illuminate\Http\Request;

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

        $serie = $criadorSeries->criarSerie(
            $request->nome, 
            $request->qtd_temporada, 
            $request->qtd_episodio
        );

        $request->session()->flash(
            "msg_alert", "Serie {$serie->nome}, temporadas e episodios criado com sucesso!"
        );

        return redirect()->route("listar_series");

    }

    public function destroy(Request $request)
    {
        Serie::where("id_serie", $request->id_serie)->delete();

        $request->session()->flash(
            "msg_alert",
            "Serie deletada com sucesso!"
        );

        return redirect()->route("listar_series");
    }

}
