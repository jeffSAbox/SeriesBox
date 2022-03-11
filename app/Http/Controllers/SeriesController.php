<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    
    public function index(Request $request)
    {

        $listaSeries = Serie::query()->orderBy('nome')->get();

        return view("series.index", compact('listaSeries'));

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

        return redirect("/");

    }

}
