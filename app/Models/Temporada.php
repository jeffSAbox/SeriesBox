<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    use HasFactory;

    protected $table = "temporadas";
    protected $fillable = ['numero'];

    public function Serie()
    {
        return $this->belongsTo(Serie::class, 'id_serie');
    }

    public function Episodios()
    {
        return $this->hasMany(Episodio::class);
    }

    public function getEpisodiosAssistidos(): Collection
    {
        return $this->Episodios->filter(function(Episodio $episodio){
            return $episodio->assistido;
        });
    }
}
