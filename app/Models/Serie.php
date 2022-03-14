<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $table = "series";
    public $timestamps = false; 
    protected $fillable = ['nome'];

    public function Temporadas()
    {
        return $this->hasMany(Temporada::class);
    }
}
