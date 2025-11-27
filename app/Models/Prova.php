<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prova extends Model
{
    protected $fillable = [
        'nome',
        'etapa',
        'temporada_id',
        'tipo',
        'peso',
        'cidade_id',
        'data_prova',
    ];

    public function temporada()
    {
        return $this->belongsTo(Temporada::class);
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }
}
