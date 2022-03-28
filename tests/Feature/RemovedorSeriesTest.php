<?php

namespace Tests\Feature;

use App\Models\Serie;
use App\Service\criadorSeries;
use App\Service\removedorSeries;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RemovedorSeriesTest extends TestCase
{
    use DatabaseTransactions;

    /** @var Serie */
    private $serieCriada;

    public function setUp(): void
    {
        parent::setUp();
        
        $criador = new criadorSeries();
        $this->serieCriada = $criador->criarSerie(
            'Nome serie',
            5,
            10
        );

    }

    public function test_verificarSerieExiste(): void
    {
        $this->assertDatabaseHas('series', [
            'id_serie' => $this->serieCriada->id_serie
        ]);
    }

    public function test_removedorDeSeries(): void
    {
       
       $nomeSerie = (new removedorSeries())->removerSerie($this->serieCriada->id_serie);

       $this->assertEquals('Nome serie', $nomeSerie);

       $this->assertDatabaseMissing('series', [
           'id_serie' => $this->serieCriada->id_serie,
           'nome' => $this->serieCriada->nome
       ]);

    }

}
