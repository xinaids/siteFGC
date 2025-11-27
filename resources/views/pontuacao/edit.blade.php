@extends('layout')

@section('title', 'Editar Pontuação')

@section('content')
<h1>Editar Pontuação</h1>

<form method="POST" action="{{ route('pontuacao.update', $pontuacao) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Classificação *</label>
        <input type="text" name="classificacao" class="form-control"
               value="{{ $pontuacao->classificacao }}" required>
    </div>

    <div class="row">
        <div class="col">
            <label class="form-label">Base *</label>
            <input type="number" name="base" class="form-control" value="{{ $pontuacao->base }}" required>
        </div>
        <div class="col">
            <label class="form-label">Peso 3 *</label>
            <input type="number" name="peso3" class="form-control" value="{{ $pontuacao->peso3 }}" required>
        </div>
        <div class="col">
            <label class="form-label">Peso 4 *</label>
            <input type="number" name="peso4" class="form-control" value="{{ $pontuacao->peso4 }}" required>
        </div>
        <div class="col">
            <label class="form-label">Peso 5 *</label>
            <input type="number" name="peso5" class="form-control" value="{{ $pontuacao->peso5 }}" required>
        </div>
    </div>

    <div class="mt-3">
        <label class="form-label">Tipo *</label>
        <select name="tipo" class="form-control">
            <option value="normal" {{ $pontuacao->tipo == 'normal' ? 'selected' : '' }}>Normal</option>
            <option value="demais" {{ $pontuacao->tipo == 'demais' ? 'selected' : '' }}>Demais</option>
            <option value="dnf" {{ $pontuacao->tipo == 'dnf' ? 'selected' : '' }}>DNF</option>
            <option value="dsq" {{ $pontuacao->tipo == 'dsq' ? 'selected' : '' }}>DSQ</option>
        </select>
    </div>

    <button class="btn btn-primary mt-3">Salvar</button>
    <a href="{{ route('pontuacao.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
</form>
@endsection
