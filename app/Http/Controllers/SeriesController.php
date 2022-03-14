<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesAdicionarRequest;
use App\Models\Serie;
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

    public function store(SeriesAdicionarRequest $request)
    {

        $serie = Serie::create([
            'nome' => $request->nome
        ]);

        $qtd_temporadas = $request->qtd_temporada;
        $qtd_episodios = $request->qtd_episodio;

        for( $i = 1; $i <= $qtd_temporadas; $i++ )
        {
            $temporada = $serie->Temporadas()->create([
                'numero' => $i
            ]);

            for( $ii = 1; $ii <= $qtd_episodios; $ii++ )
            {
                $episodio = $temporada->Episodios()->create([
                    'numero' => $ii
                ]);
            }
        }

        $request->session()->flash(
            "msg_alert", "Serie {$request->nome}, temporadas e episodios criado com sucesso!"
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
