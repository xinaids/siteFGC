<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atleta extends Model
{
    protected $fillable = [
        'nome',
        'cpf',
        'nascimento',
        'genero',
        'equipe_id',
        'cidade_id'
    ];

    public function equipe()
    {
        return $this->belongsTo(Equipe::class);
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }
}
