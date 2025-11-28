<?php

namespace App\Http\Controllers;

use App\Models\Resultado;
use App\Models\Atleta;
use App\Models\Prova;
use App\Models\Categoria;
use App\Models\Pontuacao;
use Illuminate\Http\Request;

class ResultadoController extends Controller
{
    public function index()
    {
        $resultados = Resultado::with('atleta', 'prova', 'categoria')
            ->orderBy('prova_id')
            ->orderBy('classificacao')
            ->get();

        return view('resultados.index', compact('resultados'));
    }

    public function create()
    {
        $provas = Prova::orderBy('data_prova')->get();
        $atletas = Atleta::orderBy('nome')->get();
        $categorias = Categoria::orderBy('nome')->get();

        return view('resultados.create', compact('provas', 'atletas', 'categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'prova_id' => 'required|exists:provas,id',
            'atleta_id' => 'required|exists:atletas,id',
            'categoria_id' => 'nullable|exists:categorias,id',
            'classificacao' => 'nullable|string',
            'tempo' => 'nullable|string',
            'status' => 'required|string',
        ]);

        $data = $request->all();

        // -----------------------
        // CÁLCULO DOS PONTOS
        // -----------------------
        $prova = Prova::find($request->prova_id);
        $peso = (int) $prova->peso;

        $class = strtolower($request->classificacao);
        $status = strtolower($request->status);

        $pontuacao = null;
        $pontos = 0;

        // SE A CLASSIFICAÇÃO É NUMÉRICA
        if (is_numeric($class)) {

            $pontuacao = Pontuacao::where('classificacao', $class)->first();

        } else {
            // DEMAIS / DNF / DSQ / DNS
            $pontuacao = Pontuacao::where('classificacao', $class)->first()
                ?? Pontuacao::where('tipo', strtoupper($status))->first();
        }

        if ($pontuacao) {
            $pontos = match ($peso) {
                3 => $pontuacao->peso3,
                4 => $pontuacao->peso4,
                5 => $pontuacao->peso5,
                default => $pontuacao->base,
            };
        }

        $data['pontuacao'] = $pontos;   // <── SALVA NO CAMPO CERTO

        Resultado::create($data);

        return redirect()->route('resultados.index')
            ->with('success', 'Resultado cadastrado.');
    }

    public function edit(Resultado $resultado)
    {
        $provas = Prova::orderBy('data_prova')->get();
        $atletas = Atleta::orderBy('nome')->get();
        $categorias = Categoria::orderBy('nome')->get();

        return view('resultados.edit', compact('resultado', 'provas', 'atletas', 'categorias'));
    }

    public function update(Request $request, Resultado $resultado)
    {
        $request->validate([
            'prova_id' => 'required|exists:provas,id',
            'atleta_id' => 'required|exists:atletas,id',
            'categoria_id' => 'nullable|exists:categorias,id',
            'classificacao' => 'nullable|string',
            'tempo' => 'nullable|string|max:20',
            'status' => 'required|string',
        ]);

        $prova = Prova::find($request->prova_id);
        $peso = (int) $prova->peso;

        $class = strtolower($request->classificacao);
        $status = strtolower($request->status);

        $pontuacao = null;
        $pontos = 0;

        if (is_numeric($class)) {
            $pontuacao = Pontuacao::where('classificacao', $class)->first();
        } else {
            $pontuacao = Pontuacao::where('classificacao', $class)->first()
                ?? Pontuacao::where('tipo', strtoupper($status))->first();
        }

        if ($pontuacao) {
            $pontos = match ($peso) {
                3 => $pontuacao->peso3,
                4 => $pontuacao->peso4,
                5 => $pontuacao->peso5,
                default => $pontuacao->base,
            };
        }

        $data = $request->all();
        $data['pontuacao'] = $pontos;   // <── ATUALIZA CORRETAMENTE

        $resultado->update($data);

        return redirect()->route('resultados.index')
            ->with('success', 'Resultado atualizado.');
    }

    public function destroy(Resultado $resultado)
    {
        $resultado->delete();

        return redirect()->route('resultados.index')
            ->with('success', 'Resultado removido.');
    }
}
