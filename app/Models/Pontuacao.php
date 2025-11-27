<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pontuacao extends Model
{
    protected $table = 'pontuacoes'; // <-- CORREÇÃO AQUI

    protected $fillable = [
        'classificacao',
        'base',
        'peso3',
        'peso4',
        'peso5',
        'tipo'
    ];
}
