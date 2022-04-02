<?php

namespace App\Listeners;

use App\Events\EventoNovaSerieCriada;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogSerieNovaCriada
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\EventoNovaSerieCriada  $event
     * @return void
     */
    public function handle(EventoNovaSerieCriada $event)
    {
        $nome = $event->nome;
        Log::info("Serie Nova Criada: $nome");
    }
}
