@extends('layout')

@section('title', 'Equipes')

@section('content')
<h1 class="mb-4">Equipes</h1>

<div class="d-flex justify-content-between mb-3">
    <form method="GET" class="d-flex">
        <input type="text" name="busca" class="form-control me-2"
               placeholder="Buscar equipe..." value="{{ $busca }}">
        <button class="btn btn-primary">Buscar</button>
    </form>

    <a href="{{ route('equipes.create') }}" class="btn btn-success">+ Nova Equipe</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="table-responsive">
<table class="table table-hover table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cidade</th>
            <th>Responsável</th>
            <th style="width:150px;">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($equipes as $equipe)
        <tr>
            <td>{{ $equipe->id }}</td>
            <td>{{ $equipe->nome }}</td>
            <td>{{ $equipe->cidade }}</td>
            <td>{{ $equipe->responsavel }}</td>
            <td>
                <a href="{{ route('equipes.edit', $equipe) }}" class="btn btn-sm btn-warning">Editar</a>

                <form action="{{ route('equipes.destroy', $equipe) }}" method="POST"
                      style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger"
                        onclick="return confirm('Excluir esta equipe?');"
                    >Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

{{ $equipes->links() }}
@endsection
