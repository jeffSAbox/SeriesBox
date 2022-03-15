<?php

namespace App\Service;

use App\Models\Serie;
use App\Models\Temporada;
use Illuminate\Support\Facades\DB;

class criadorSeries
{

    public function criarSerie(string $nome, int $qtd_temporadas, int $qtd_episodios): Serie
    {
        
        DB::beginTransaction();
        $serie = Serie::create([
            'nome' => $nome
        ]);

        $this->criarTemporadas($serie, $qtd_temporadas, $qtd_episodios);
        DB::commit();

        return $serie;
    }

    private function criarTemporadas(Serie $serie, $qtd_temporadas, $qtd_episodios): void
    {
        for( $i = 1; $i <= $qtd_temporadas; $i++ )
        {
            $temporada = $serie->Temporadas()->create([
                'numero' => $i
            ]);

            $this->criarEpisodios($temporada, $qtd_episodios);
            
        }
    }

    private function criarEpisodios(Temporada $temporada, $qtd_episodios): void
    {
        for( $i = 1; $i <= $qtd_episodios; $i++ )
        {
            $temporada->Episodios()->create([
                'numero' => $i
            ]);
        }
    }
    
}
