<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    public function index(Request $request)
    {
        $busca = $request->input('busca', '');

        $cidades = Cidade::when($busca, function ($query, $busca) {
                $query->where('nome', 'ILIKE', "%{$busca}%");
            })
            ->orderBy('nome')
            ->paginate(20)
            ->withQueryString();

        return view('cidades.index', compact('cidades', 'busca'));
    }

    public function create()
    {
        return view('cidades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'   => 'required|string|max:255',
            'estado' => 'required|string|max:2',
        ]);

        Cidade::create($request->all());

        return redirect()->route('cidades.index')
            ->with('success', 'Cidade cadastrada com sucesso.');
    }

    public function edit(Cidade $cidade)
    {
        return view('cidades.edit', compact('cidade'));
    }

    public function update(Request $request, Cidade $cidade)
    {
        $request->validate([
            'nome'   => 'required|string|max:255',
            'estado' => 'required|string|max:2',
        ]);

        $cidade->update($request->all());

        return redirect()->route('cidades.index')
            ->with('success', 'Cidade atualizada com sucesso.');
    }

    public function destroy(Cidade $cidade)
    {
        $cidade->delete();

        return redirect()->route('cidades.index')
            ->with('success', 'Cidade removida com sucesso.');
    }
}
