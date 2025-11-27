@extends('layout')

@section('title', 'Resultados')

@section('content')

<h2 class="mb-4">Resultados</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="mb-3">
    <a href="{{ route('resultados.create') }}" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Novo Resultado
    </a>
</div>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Prova</th>
            <th>Atleta</th>
            <th>Categoria</th>
            <th>Class.</th>
            <th>Tempo</th>
            <th>Status</th>
            <th>Pontos</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
        @foreach($resultados as $r)
            <tr>
                <td>{{ $r->prova->nome }} ({{ $r->prova->etapa }}ª etapa)</td>
                <td>{{ $r->atleta->nome }}</td>
                <td>{{ $r->categoria->nome ?? '-' }}</td>
                <td>{{ $r->classificacao ?? '-' }}</td>
                <td>{{ $r->tempo ?? '-' }}</td>
                <td>{{ $r->status }}</td>
                <td>{{ $r->pontuacao }}</td>

                <td>
                    <a href="{{ route('resultados.edit', $r) }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-pencil"></i>
                    </a>

                    <form action="{{ route('resultados.destroy', $r) }}"
                          method="POST" style="display:inline-block"
                          onsubmit="return confirm('Remover resultado?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>

</table>

@endsection
