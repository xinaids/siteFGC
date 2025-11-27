<?php

namespace App\Http\Controllers;

use App\Models\Temporada;
use Illuminate\Http\Request;

class TemporadaController extends Controller
{
    public function index()
    {
        $temporadas = Temporada::orderBy('ano', 'desc')->paginate(20);
        return view('temporadas.index', compact('temporadas'));
    }

    public function create()
    {
        return view('temporadas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ano' => 'required|integer|min:2000|max:2100|unique:temporadas,ano',
            'descricao' => 'nullable|string|max:255',
        ]);

        Temporada::create([
            'ano' => $request->ano,
            'descricao' => $request->descricao,
        ]);

        return redirect()->route('temporadas.index')
            ->with('success', 'Temporada criada com sucesso.');
    }

    public function edit(Temporada $temporada)
    {
        return view('temporadas.edit', compact('temporada'));
    }

    public function update(Request $request, Temporada $temporada)
    {
        $request->validate([
            'ano' => 'required|integer|min:2000|max:2100|unique:temporadas,ano,' . $temporada->id,
            'descricao' => 'nullable|string|max:255',
        ]);

        $temporada->update([
            'ano' => $request->ano,
            'descricao' => $request->descricao,
        ]);

        return redirect()->route('temporadas.index')
            ->with('success', 'Temporada atualizada com sucesso.');
    }

    public function destroy(Temporada $temporada)
    {
        $temporada->delete();

        return redirect()->route('temporadas.index')
            ->with('success', 'Temporada removida.');
    }
}
