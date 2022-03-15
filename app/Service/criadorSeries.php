<?php

namespace App\Service;

use App\Models\Serie;

class criadorSeries
{

    public function criarSerie(string $nome, int $qtd_temporadas, int $qtd_episodios): Serie
    {
        $serie = Serie::create([
            'nome' => $nome
        ]);

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

        return $serie;
    }
    
}
