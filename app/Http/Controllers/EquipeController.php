<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    public function index(Request $request)
    {
        $busca = $request->input('busca', '');

        $equipes = Equipe::when($busca, function ($query, $busca) {
                $query->where('nome', 'ILIKE', "%{$busca}%");
            })
            ->orderBy('nome')
            ->paginate(20)
            ->withQueryString();

        return view('equipes.index', compact('equipes', 'busca'));
    }

    public function create()
    {
        return view('equipes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:equipes,nome',
            'cidade' => 'nullable|string|max:255',
            'responsavel' => 'nullable|string|max:255',
            'telefone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
        ]);

        Equipe::create($request->all());

        return redirect()->route('equipes.index')
            ->with('success', 'Equipe criada com sucesso.');
    }

    public function edit(Equipe $equipe)
    {
        return view('equipes.edit', compact('equipe'));
    }

    public function update(Request $request, Equipe $equipe)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:equipes,nome,' . $equipe->id,
            'cidade' => 'nullable|string|max:255',
            'responsavel' => 'nullable|string|max:255',
            'telefone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
        ]);

        $equipe->update($request->all());

        return redirect()->route('equipes.index')
            ->with('success', 'Equipe atualizada com sucesso.');
    }

    public function destroy(Equipe $equipe)
    {
        $equipe->delete();

        return redirect()->route('equipes.index')
            ->with('success', 'Equipe removida.');
    }
}
