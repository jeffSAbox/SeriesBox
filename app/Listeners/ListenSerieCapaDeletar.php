<?php

namespace App\Listeners;

use App\Events\EventoSerieDeletar;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;

class ListenSerieCapaDeletar implements ShouldQueue
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
     * @param  \App\Events\EventoSerieDeletar  $event
     * @return void
     */
    public function handle(EventoSerieDeletar $event)
    {
        $serie = $event->serie;
        if( $serie->capa )
        {
            Storage::delete($serie->capa);
        }
    }
}
