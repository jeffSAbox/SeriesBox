<?php

namespace App\Service;

use App\Mail\novaSerie;
use Error;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class enviarEmailParaUsuarioLogado
{

    private $email;
    private $usuarioLogado;

    public function __construct()
    {
        $this->usuarioLogado = Auth::user();
        
        return $this;
    }

    public function enviarSerieCriada(string $nome, int $qtdTemporadas, int $qtdEpisodios): bool
    {

        try
        {        
            $this->email = new novaSerie(
                $nome,
                $qtdTemporadas,
                $qtdEpisodios
            );

            $this->email->subject('Nova serie foi criada!');

            Mail::to($this->usuarioLogado)->send($this->email);
        }
        catch(Exception $error)
        {
            return false;
        }

        return true;

    }

}