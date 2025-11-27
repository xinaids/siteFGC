<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pontuacao;

class PontuacaoSeeder extends Seeder
{
    public function run(): void
    {
        $dados = [
            // Classificação normal
            ['classificacao' => '1', 'base' => 13, 'peso3' => 39, 'peso4' => 52, 'peso5' => 65, 'tipo' => 'normal'],
            ['classificacao' => '2', 'base' => 10, 'peso3' => 30, 'peso4' => 40, 'peso5' => 50, 'tipo' => 'normal'],
            ['classificacao' => '3', 'base' => 8,  'peso3' => 24, 'peso4' => 32, 'peso5' => 40, 'tipo' => 'normal'],
            ['classificacao' => '4', 'base' => 7,  'peso3' => 21, 'peso4' => 28, 'peso5' => 35, 'tipo' => 'normal'],
            ['classificacao' => '5', 'base' => 6,  'peso3' => 18, 'peso4' => 24, 'peso5' => 30, 'tipo' => 'normal'],
            ['classificacao' => '6', 'base' => 5,  'peso3' => 15, 'peso4' => 20, 'peso5' => 25, 'tipo' => 'normal'],
            ['classificacao' => '7', 'base' => 4,  'peso3' => 12, 'peso4' => 16, 'peso5' => 20, 'tipo' => 'normal'],
            ['classificacao' => '8', 'base' => 3,  'peso3' => 9,  'peso4' => 12, 'peso5' => 15, 'tipo' => 'normal'],

            // Demais classificações
            ['classificacao' => 'demais', 'base' => 2, 'peso3' => 6, 'peso4' => 8, 'peso5' => 10, 'tipo' => 'demais'],

            // DNF
            ['classificacao' => 'dnf', 'base' => 1, 'peso3' => 3, 'peso4' => 4, 'peso5' => 5, 'tipo' => 'dnf'],

            // DSQ
            ['classificacao' => 'dsq', 'base' => 0, 'peso3' => 0, 'peso4' => 0, 'peso5' => 0, 'tipo' => 'dsq'],
        ];

        foreach ($dados as $d) {
            Pontuacao::create($d);
        }
    }
}
