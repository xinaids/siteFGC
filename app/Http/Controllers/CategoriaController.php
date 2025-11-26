<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(Request $request)
    {
        $busca = $request->input('busca', '');

        $categorias = Categoria::when($busca, function ($query, $busca) {
                $query->where('nome', 'ILIKE', "%{$busca}%");
            })
            ->orderBy('nome')
            ->paginate(20)
            ->withQueryString();

        return view('categorias.index', compact('categorias', 'busca'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'genero' => 'required|string|max:10',
            'idade_min' => 'nullable|integer|min:0',
            'idade_max' => 'nullable|integer|min:0',
        ]);

        Categoria::create($request->all());

        return redirect()->route('categorias.index')
            ->with('success', 'Categoria criada com sucesso.');
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'genero' => 'required|string|max:10',
            'idade_min' => 'nullable|integer|min:0',
            'idade_max' => 'nullable|integer|min:0',
        ]);

        $categoria->update($request->all());

        return redirect()->route('categorias.index')
            ->with('success', 'Categoria atualizada com sucesso.');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('categorias.index')
            ->with('success', 'Categoria excluída com sucesso.');
    }
}
