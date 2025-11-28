@extends('layout')

@section('title', 'Editar Temporada')

@section('content')
<h1>Editar Temporada</h1>

<form method="POST" action="{{ route('temporadas.update', $temporada) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Ano *</label>
        <input type="number" name="ano" class="form-control"
               value="{{ $temporada->ano }}" required min="2000" max="2100">
    </div>

    <div class="mb-3">
        <label class="form-label">Descrição</label>
        <input type="text" name="descricao" class="form-control"
               value="{{ $temporada->descricao }}">
    </div>

    <div class="mb-3 form-check">
        <input type="checkbox" name="ativa" id="ativa" class="form-check-input"
               {{ $temporada->ativa ? 'checked' : '' }}>
        <label for="ativa" class="form-check-label">Ativa</label>
    </div>

    <button class="btn btn-primary">Salvar</button>
    <a href="{{ route('temporadas.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection
