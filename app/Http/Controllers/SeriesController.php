<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    
    public function index(Request $request)
    {

        $listaSeries = [
            'serie 1',
            'serie 2',
            'serie 3'
        ];

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

        var_dump($serie);

    }

}
