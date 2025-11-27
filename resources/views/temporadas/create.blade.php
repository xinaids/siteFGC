@extends('layout')

@section('title', 'Nova Temporada')

@section('content')
<h1>Nova Temporada</h1>

<form method="POST" action="{{ route('temporadas.store') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Ano *</label>
        <input type="number" name="ano" class="form-control" required min="2000" max="2100">
    </div>

    <div class="mb-3">
        <label class="form-label">Descrição</label>
        <input type="text" name="descricao" class="form-control">
    </div>

    <button class="btn btn-primary">Salvar</button>
    <a href="{{ route('temporadas.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection
