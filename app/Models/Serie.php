<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
