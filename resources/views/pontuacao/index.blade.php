@extends('layout')

@section('title', 'Pontuação')

@section('content')
<h1>Pontuação</h1>

<a href="{{ route('pontuacao.create') }}" class="btn btn-success mb-3">+ Nova Pontuação</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>Classificação</th>
            <th>Base</th>
            <th>Peso 3</th>
            <th>Peso 4</th>
            <th>Peso 5</th>
            <th>Tipo</th>
            <th style="width:150px;">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pontuacoes as $p)
        <tr>
            <td>{{ $p->classificacao }}</td>
            <td>{{ $p->base }}</td>
            <td>{{ $p->peso3 }}</td>
            <td>{{ $p->peso4 }}</td>
            <td>{{ $p->peso5 }}</td>
            <td>{{ strtoupper($p->tipo) }}</td>
            <td>
                <a href="{{ route('pontuacao.edit', $p) }}" class="btn btn-primary btn-sm">Editar</a>

                <form action="{{ route('pontuacao.destroy', $p) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Remover?')">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
