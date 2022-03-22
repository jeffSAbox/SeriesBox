<?php

namespace App\Http\Controllers;

use App\Models\Temporada;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EpisodiosController extends Controller
{
    public function index(Temporada $temporada, Request $request)
    {
        $episodios = $temporada->Episodios;

        return view('episodios.listaEpisodios', [
            'episodios' => $episodios,
            'temporada_numero' => $temporada->numero,
            'temporada_id' => $temporada->id,
            'msg_alert' => $request->session()->get('msg_alert')
        ]);
    }

    public function assistir(Temporada $temporada, Request $request)
    {
        $episodiosAssistidos = $request->episodios ?? [];
        DB::beginTransaction();
        $episodios = $temporada->Episodios->each(function($episodio) use ($episodiosAssistidos){
            $episodio->assistido = in_array($episodio->id, $episodiosAssistidos);
        });
        $temporada->push();
        DB::commit();

        $request->session()->flash('msg_alert', 'Episódios assistidos salvo com sucesso!');

        return redirect()->back();

    }
}
