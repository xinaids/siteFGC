@extends('layout')

@section('title', 'Atletas')

@section('content')
<div class="container">

    <h2 class="mb-4">Atletas</h2>

    <a href="{{ route('atletas.create') }}" class="btn btn-success mb-3">Novo Atleta</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Gênero</th>
                <th>Equipe</th>
                <th>Cidade</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            @foreach($atletas as $a)
                <tr>
                    <td>{{ $a->nome }}</td>
                    <td>{{ $a->genero }}</td>
                    <td>{{ $a->equipe->nome ?? '-' }}</td>
                    <td>{{ $a->cidade->nome ?? '-' }}</td>

                    <td>
                        <a href="{{ route('atletas.edit', $a->id) }}" class="btn btn-sm btn-primary">Editar</a>

                        <form action="{{ route('atletas.destroy', $a->id) }}"
                              method="POST"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Remover?')">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

</div>
@endsection
