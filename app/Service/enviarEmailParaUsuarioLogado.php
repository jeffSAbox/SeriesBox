<?php

namespace App\Service;

use App\Mail\novaSerie;
use Error;
use Exception;
use Illuminate\Foundation\Auth\User;
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

            $usuarios = User::all();
            $delay_sec = 10;

            foreach( $usuarios as $usuario )
            {
                $this->email = new novaSerie(
                    $nome,
                    $qtdTemporadas,
                    $qtdEpisodios
                );

                $this->email->subject('Nova serie foi criada!');

                Mail::to($usuario)->later(now()->addSeconds($delay_sec), $this->email);
                // Mail::to($usuario)->send($this->email);
                // sleep(10);

                $delay_sec+= 10;

            }

        }
        catch(Exception $error)
        {
            return false;
        }

        return true;

    }

}