<?php

namespace Tests\Feature;

use App\Models\Episodio;
use App\Models\Temporada;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPSTORM_META\map;

class EpisodiosTest extends TestCase
{

    /** @var Temporada */
    private $temporada;

    public function setUp(): void
    {

        parent::setUp();

        $temporada = new Temporada();

        $episodio1 = new Episodio();
        $episodio2 = new Episodio();
        $episodio3 = new Episodio();

        $episodio1->assistido = true;
        $episodio2->assistido = false;
        $episodio3->assistido = true;

        $temporada->Episodios->add($episodio1);
        $temporada->Episodios->add($episodio2);
        $temporada->Episodios->add($episodio3);

        $this->temporada = $temporada;
    }

    public function test_verificarEpisodiosAssistidos()
    {
        $episodiosAssistidos = $this->temporada->getEpisodiosAssistidos();
        $episodiosAssistidos->map(function($episodio) {
            $this->assertTrue($episodio->assistido);
        });

        $this->test_verificarQuantidadeEpisodiosAssistidos($episodiosAssistidos);
    }

    private function test_verificarQuantidadeEpisodiosAssistidos($episodiosAssistidos)
    {
        $this->assertCount(2, $episodiosAssistidos);
    }

    public function test_verificarQuantidadeEpisodios(): void
    {
        $this->assertCount(3, $this->temporada->Episodios);
    }
}
