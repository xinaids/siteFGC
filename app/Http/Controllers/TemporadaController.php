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
            'ano' => 'required|integer',
            'descricao' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['ativa'] = $request->has('ativa'); // checkbox true/false

        Temporada::create($data);

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
            'ano' => 'required|integer',
            'descricao' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['ativa'] = $request->has('ativa');

        $temporada->update($data);

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
