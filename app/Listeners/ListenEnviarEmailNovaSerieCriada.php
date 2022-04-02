<?php

namespace App\Listeners;

use App\Events\EventoNovaSerieCriada;
use App\Service\enviarEmailParaUsuarioLogado;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ListenEnviarEmailNovaSerieCriada implements ShouldQueue
{

    // public $delay = 10;

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
        $dadosSerie = [
            $event->nome,
            $event->qtdTemporadas,
            $event->qtdEpisodios
        ];

        $enviarEmail = new enviarEmailParaUsuarioLogado();
        if( !$enviarEmail->enviarSerieCriada(...$dadosSerie) )
        {
            // $request->session()->flash(
            //     "msg_alert", "Serie {$serie->nome}, temporadas e episodios criado com sucesso! Mas falhou ao enviar e-mail."
            // );
        }
    }
}
