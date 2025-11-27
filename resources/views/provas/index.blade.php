@extends('layout')

@section('title', 'Provas')

@section('content')
<h1>Provas</h1>

<a href="{{ route('provas.create') }}" class="btn btn-primary mb-3">Nova Prova</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Etapa</th>
            <th>Temporada</th>
            <th>Tipo</th>
            <th>Peso</th>
            <th>Cidade</th>
            <th>Data</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($provas as $p)
        <tr>
            <td>{{ $p->nome }}</td>
            <td>{{ $p->etapa }}</td>
            <td>{{ $p->temporada->ano }}</td>
            <td>{{ $p->tipo }}</td>
            <td>{{ $p->peso }}</td>
            <td>{{ $p->cidade->nome ?? '-' }}</td>
            <td>{{ date('d/m/Y', strtotime($p->data_prova)) }}</td>
            <td>
                <a href="{{ route('provas.edit', $p) }}" class="btn btn-sm btn-warning">Editar</a>

                <form action="{{ route('provas.destroy', $p) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $provas->links() }}

@endsection
