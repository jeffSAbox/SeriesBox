<?php

namespace App\Http\Controllers;

use App\Models\Serie;

class TemporadasController extends Controller
{
    public function index(int $serieId)
    {
        
        $temporadas = Serie::with('temporadas:numero')
            ->where('id_serie', $serieId)
            ->get();
        
        return view("temporadas.listarTemporadas", [
            'temporadas' => $temporadas[0]->Temporadas,
            'serie' => $temporadas[0]
        ]);
    }
}
