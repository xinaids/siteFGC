@extends('layout')

@section('title', 'Categorias')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="title">Categorias</h1>
    <a href="{{ route('categorias.create') }}" class="btn btn-success">+ Nova Categoria</a>
</div>

<form method="GET" action="{{ route('categorias.index') }}" class="input-group mb-3">
    <input type="text" name="busca" class="form-control" placeholder="Pesquisar categoria..."
           value="{{ $busca }}">
    <button class="btn btn-primary">Buscar</button>
</form>

<div class="table-responsive">
<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>Nome</th>
            <th>Gênero</th>
            <th>Idade Mínima</th>
            <th>Idade Máxima</th>
            <th style="width:150px;">Ações</th>
        </tr>
    </thead>

    <tbody>
    @foreach ($categorias as $cat)
        <tr>
            <td>{{ $cat->nome }}</td>
            <td>{{ $cat->genero }}</td>
            <td>{{ $cat->idade_min }}</td>
            <td>{{ $cat->idade_max }}</td>

            <td>
                <a href="{{ route('categorias.edit', $cat) }}" class="btn btn-sm btn-warning">Editar</a>

                <form action="{{ route('categorias.destroy', $cat) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Excluir categoria?')">
                        Excluir
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>

{{ $categorias->links() }}

@endsection
