@extends('layout')

@section('title', 'Cidades')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="title">Cidades</h1>
    <a href="{{ route('cidades.create') }}" class="btn btn-success">+ Nova Cidade</a>
</div>

<form method="GET" action="{{ route('cidades.index') }}" class="input-group mb-3">
    <input type="text" name="busca" class="form-control" placeholder="Pesquisar cidade..."
           value="{{ $busca }}">
    <button class="btn btn-primary">Buscar</button>
</form>

<div class="table-responsive">
<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Estado</th>
            <th style="width:150px;">Ações</th>
        </tr>
    </thead>

    <tbody>
    @foreach ($cidades as $cidade)
        <tr>
            <td>{{ $cidade->id }}</td>
            <td>{{ $cidade->nome }}</td>
            <td>{{ $cidade->estado }}</td>
            <td>
                <a href="{{ route('cidades.edit', $cidade) }}" class="btn btn-sm btn-warning">Editar</a>

                <form action="{{ route('cidades.destroy', $cidade) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Remover cidade?')"
                            class="btn btn-sm btn-danger">
                        Excluir
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>

{{ $cidades->links() }}

@endsection
