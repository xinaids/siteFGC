<?php

namespace App\Http\Controllers;

use App\Models\Resultado;
use App\Models\Temporada;
use App\Models\Categoria;
use App\Models\Prova;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function index(Request $request)
    {
        $temporadas = Temporada::orderBy('ano', 'desc')->get();
        $temporada_id = $request->temporada_id;

        // garantir variáveis sempre definidas
        $ranking = [];
        $provas = [];

        // se nenhuma temporada escolhida, exibe só o select
        if (!$temporada_id) {
            return view('rankings.index', compact('temporadas', 'ranking', 'provas', 'temporada_id'));
        }

        // carrega provas da temporada
        $provas = Prova::where('temporada_id', $temporada_id)
            ->orderBy('data_prova')
            ->get();

        $categorias = Categoria::orderBy('nome')->get();

        foreach ($categorias as $cat) {

            $resultados = Resultado::where('categoria_id', $cat->id)
                ->whereHas('prova', function ($q) use ($temporada_id) {
                    $q->where('temporada_id', $temporada_id);
                })
                ->with(['atleta', 'prova'])
                ->get();

            if ($resultados->count() == 0) continue;

            $grupo = $resultados->groupBy('atleta_id');

            foreach ($grupo as $atleta_id => $dados) {
                $subtotal = $dados->sum('pontuacao');

                $ranking[$cat->nome][] = [
                    'atleta' => $dados->first()->atleta,
                    'equipe' => $dados->first()->atleta->equipe->nome ?? '-',
                    'subtotal' => $subtotal,
                    'provas' => $dados
                ];
            }

            usort($ranking[$cat->nome], fn($a, $b) => $b['subtotal'] <=> $a['subtotal']);
        }

        return view('rankings.index', compact(
            'temporadas',
            'temporada_id',
            'provas',
            'ranking'
        ));
    }
}
