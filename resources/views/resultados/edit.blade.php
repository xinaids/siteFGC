@extends('layout')

@section('title', 'Editar Resultado')

@section('content')

<h2 class="mb-4">Editar Resultado</h2>

<form action="{{ route('resultados.update', $resultado) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Prova *</label>
        <select name="prova_id" class="form-control" required>
            @foreach($provas as $p)
                <option value="{{ $p->id }}" {{ $resultado->prova_id == $p->id ? 'selected' : '' }}>
                    {{ $p->nome }} - {{ $p->etapa }}ª Etapa
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Atleta *</label>
        <select name="atleta_id" class="form-control" required>
            @foreach($atletas as $a)
                <option value="{{ $a->id }}" {{ $resultado->atleta_id == $a->id ? 'selected' : '' }}>
                    {{ $a->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Categoria</label>
        <select name="categoria_id" class="form-control">
            <option value="">Não informado</option>
            @foreach($categorias as $c)
                <option value="{{ $c->id }}" {{ $resultado->categoria_id == $c->id ? 'selected' : '' }}>
                    {{ $c->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Classificação</label>
        <input type="number" name="classificacao" class="form-control"
               value="{{ $resultado->classificacao }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Tempo</label>
        <input type="text" name="tempo" class="form-control"
               value="{{ $resultado->tempo }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-control">
            <option value="OK" {{ $resultado->status == 'OK' ? 'selected' : '' }}>OK</option>
            <option value="DNF" {{ $resultado->status == 'DNF' ? 'selected' : '' }}>DNF</option>
            <option value="DSQ" {{ $resultado->status == 'DSQ' ? 'selected' : '' }}>DSQ</option>
            <option value="DNS" {{ $resultado->status == 'DNS' ? 'selected' : '' }}>DNS</option>
        </select>
    </div>

    <button class="btn btn-primary">Salvar</button>
    <a href="{{ route('resultados.index') }}" class="btn btn-secondary">Cancelar</a>

</form>

@endsection
