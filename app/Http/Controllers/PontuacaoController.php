<?php

namespace App\Http\Controllers;

use App\Models\Pontuacao;
use Illuminate\Http\Request;

class PontuacaoController extends Controller
{
    public function index()
    {
        $pontuacoes = Pontuacao::orderBy('id')->get();
        return view('pontuacao.index', compact('pontuacoes'));
    }

    public function create()
    {
        return view('pontuacao.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'classificacao' => 'required|string',
            'base' => 'required|integer',
            'peso3' => 'required|integer',
            'peso4' => 'required|integer',
            'peso5' => 'required|integer',
            'tipo' => 'required|string',
        ]);

        Pontuacao::create($request->all());

        return redirect()->route('pontuacao.index')->with('success', 'Pontuação cadastrada.');
    }

    public function edit(Pontuacao $pontuacao)
    {
        return view('pontuacao.edit', compact('pontuacao'));
    }

    public function update(Request $request, Pontuacao $pontuacao)
    {
        $pontuacao->update($request->all());
        return redirect()->route('pontuacao.index')->with('success', 'Pontuação atualizada.');
    }

    public function destroy(Pontuacao $pontuacao)
    {
        $pontuacao->delete();
        return redirect()->route('pontuacao.index')->with('success', 'Pontuação removida.');
    }
}
