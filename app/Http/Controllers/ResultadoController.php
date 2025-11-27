<?php

namespace App\Http\Controllers;

use App\Models\Resultado;
use App\Models\Atleta;
use App\Models\Prova;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ResultadoController extends Controller
{
    public function index()
    {
        $resultados = Resultado::with('atleta', 'prova', 'categoria')
            ->orderBy('prova_id')
            ->orderBy('posicao')
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
            'classificacao' => 'nullable|integer|min:1',
            'tempo' => 'nullable|string|max:20',
            'status' => 'required|string',
        ]);

        Resultado::create($request->all());

        return redirect()->route('resultados.index')
            ->with('success', 'Resultado registrado com sucesso.');
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
            'classificacao' => 'nullable|integer|min:1',
            'tempo' => 'nullable|string|max:20',
            'status' => 'required|string',
        ]);

        $resultado->update($request->all());

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
