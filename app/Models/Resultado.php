<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    protected $fillable = [
        'prova_id',
        'atleta_id',
        'categoria_id',
        'classificacao',
        'tempo',
        'pontuacao',   // <── CAMPO CERTO
        'status',
    ];

    public function atleta() {
        return $this->belongsTo(Atleta::class);
    }

    public function prova() {
        return $this->belongsTo(Prova::class);
    }

    public function categoria() {
        return $this->belongsTo(Categoria::class);
    }
}
