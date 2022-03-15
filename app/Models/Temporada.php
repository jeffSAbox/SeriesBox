<?php

namespace App\Models;

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
}
