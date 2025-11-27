@extends('layout')

@section('title', 'Temporadas')

@section('content')
<h1>Temporadas</h1>

<a href="{{ route('temporadas.create') }}" class="btn btn-primary mb-3">Nova Temporada</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Ano</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($temporadas as $t)
        <tr>
            <td>{{ $t->id }}</td>
            <td>{{ $t->ano }}</td>
            <td>{{ $t->descricao }}</td>
            <td>
                <a href="{{ route('temporadas.edit', $t) }}" class="btn btn-warning btn-sm">Editar</a>

                <form action="{{ route('temporadas.destroy', $t) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Excluir?')">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $temporadas->links() }}

@endsection
