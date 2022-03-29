<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class novaSerie extends Mailable
{
    use Queueable, SerializesModels;

    /** @var string */
    public $serie_nome;
    /** @var int */
    public $serie_temporadas;
    /** @var int */
    public $serie_episodios;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $nome, int $qtdTemporadas, int $qtdEpisodiso)
    {
        $this->serie_nome = $nome;
        $this->serie_temporadas = $qtdTemporadas;
        $this->serie_episodios = $qtdEpisodiso;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.series.nova-serie');
    }
}
