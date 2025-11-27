<?php

namespace App\Http\Controllers;

use App\Models\Prova;
use App\Models\Cidade;
use App\Models\Temporada;
use Illuminate\Http\Request;

class ProvaController extends Controller
{
    public function index()
    {
        $provas = Prova::with(['cidade', 'temporada'])
            ->orderBy('data_prova', 'desc')
            ->paginate(20);

        return view('provas.index', compact('provas'));
    }

    public function create()
    {
        $cidades = Cidade::orderBy('nome')->get();
        $temporadas = Temporada::orderBy('ano')->get();

        return view('provas.create', compact('cidades', 'temporadas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'etapa' => 'nullable|integer|min:1',
            'temporada_id' => 'required|exists:temporadas,id',
            'tipo' => 'required|in:XCO,XCM',
            'peso' => 'required|in:3,4,5',
            'cidade_id' => 'nullable|exists:cidades,id',
            'data_prova' => 'required|date',
        ]);

        Prova::create($request->all());

        return redirect()->route('provas.index')
            ->with('success', 'Prova cadastrada com sucesso.');
    }

    public function edit(Prova $prova)
    {
        $cidades = Cidade::orderBy('nome')->get();
        $temporadas = Temporada::orderBy('ano')->get();

        return view('provas.edit', compact('prova', 'cidades', 'temporadas'));
    }

    public function update(Request $request, Prova $prova)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'etapa' => 'nullable|integer|min:1',
            'temporada_id' => 'required|exists:temporadas,id',
            'tipo' => 'required|in:XCO,XCM',
            'peso' => 'required|in:3,4,5',
            'cidade_id' => 'nullable|exists:cidades,id',
            'data_prova' => 'required|date',
        ]);

        $prova->update($request->all());

        return redirect()->route('provas.index')
            ->with('success', 'Prova atualizada.');
    }

    public function destroy(Prova $prova)
    {
        $prova->delete();

        return redirect()->route('provas.index')->with('success', 'Prova removida.');
    }
}
