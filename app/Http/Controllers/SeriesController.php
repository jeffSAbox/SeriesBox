<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {

        $serie = Serie::create([
            'nome' => $request->nome
        ]);

        $request->session()->flash(
            "msg_alert", "Serie {$request->nome} criada com sucesso!"
        );

        return redirect("/");

    }

}
