<?php

namespace App\Service;

use App\Models\{Episodio, Serie, Temporada};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class removedorSeries
{
    public function removerSerie(int $serieId): string
    {
        
        DB::beginTransaction();
            $serie = Serie::where("id_serie", $serieId)->first();
            $nomeSerie = $serie->nome;
            
            $this->removerTemporadas($serie);
            $serie->delete();

            $this->removerCapa($serie);
        DB::commit();

        return $nomeSerie;
    }

    private function removerTemporadas(Serie $serie): void
    {
        $serie->Temporadas->each( function(Temporada $temporada){
            $this->removerEpisodios($temporada);
            $temporada->delete();
        } );
    }

    private function removerEpisodios(Temporada $temporada): void
    {
        $temporada->Episodios->each( function(Episodio $episodio){
            $episodio->delete();
        } );
    }

    private function removerCapa(Serie $serie):void
    {
        if( $serie->capa )
        {
            Storage::delete($serie->capa);
        }
    }
}
