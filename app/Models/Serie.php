<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Serie extends Model
{
    protected $table = "series";
    public $timestamps = false; 
    protected $fillable = ['nome', 'capa'];
    protected $primaryKey = "id_serie";

    public function Temporadas()
    {
        return $this->hasMany(Temporada::class, 'serie_id');
    }

    public function getCapaUrlAttribute()
    {
        if( $this->capa )
        {
            return Storage::url($this->capa);
        }

        return Storage::url("series/capas/sem_imagem.png");
    }
}
