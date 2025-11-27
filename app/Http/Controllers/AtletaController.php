<?php

namespace App\Http\Controllers;

use App\Models\Atleta;
use App\Models\Cidade;
use App\Models\Equipe;
use Illuminate\Http\Request;
use App\Models\Categoria;

class AtletaController extends Controller
{
    public function index()
    {
        $atletas = Atleta::with('equipe', 'cidade')
            ->orderBy('nome')
            ->get();

        return view('atletas.index', compact('atletas'));
    }

    public function create()
    {
        $cidades = Cidade::orderBy('nome')->get();
        $equipes = Equipe::orderBy('nome')->get();
        $categorias = Categoria::orderBy('nome')->get();
        return view('atletas.create', compact('cidades', 'equipes', 'categorias'));


        return view('atletas.create', compact('cidades', 'equipes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'sexo' => 'required|in:M,F',
            'nascimento' => 'nullable|date',
            'cidade_id' => 'nullable|exists:cidades,id',
            'categoria_id' => 'nullable|exists:categorias,id',
            'equipe_id' => 'nullable|exists:equipes,id',
        ]);

        Atleta::create($request->all());

        return redirect()->route('atletas.index')
            ->with('success', 'Atleta cadastrado com sucesso.');
    }

    public function edit(Atleta $atleta)
    {
        $cidades = Cidade::orderBy('nome')->get();
        $equipes = Equipe::orderBy('nome')->get();

        return view('atletas.edit', compact('atleta', 'cidades', 'equipes'));
    }

    public function update(Request $request, Atleta $atleta)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'sexo' => 'required|in:M,F',
            'nascimento' => 'nullable|date',
            'cidade_id' => 'nullable|exists:cidades,id',
            'categoria_id' => 'nullable|exists:categorias,id',
            'equipe_id' => 'nullable|exists:equipes,id',
        ]);

        $atleta->update($request->all());

        return redirect()->route('atletas.index')
            ->with('success', 'Atleta atualizado com sucesso.');
    }

    public function destroy(Atleta $atleta)
    {
        $atleta->delete();

        return redirect()->route('atletas.index')
            ->with('success', 'Atleta removido.');
    }
}
