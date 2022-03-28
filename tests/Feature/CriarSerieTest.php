<?php

namespace Tests\Feature;

use App\Models\Serie;
use App\Service\criadorSeries;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CriarSerieTest extends TestCase
{

    use RefreshDatabase;

    /** @var criadorSeries */
    private $criadorSerie;

    public function setUp(): void
    {
        parent::setUp();
        $this->criadorSerie = new criadorSeries();
    }

    public function test_verificarSerieCriada()
    {
        $nome = "Jefferson Test";
        $qtd_temporadas = 5;
        $qtd_episodios = 10;

        $serieCriada = $this->criadorSerie->criarSerie($nome, $qtd_temporadas, $qtd_episodios);

        $this->assertInstanceOf(Serie::class, $serieCriada);

        $this->assertDatabaseHas('series', [
            'nome'=>'Jefferson Test'
        ]);

        $this->assertDatabaseHas('temporadas', [
            'serie_id'=>$serieCriada->id_serie,
            'numero'=>5
        ]);

        $this->assertDatabaseHas('episodios', [
            'numero'=>10
        ]);
    }
}
