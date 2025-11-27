@extends('layout')

@section('title', 'Nova Prova')

@section('content')
<h1>Nova Prova</h1>

<form method="POST" action="{{ route('provas.store') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nome *</label>
        <input type="text" name="nome" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Etapa</label>
        <input type="number" name="etapa" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Temporada *</label>
        <select name="temporada_id" class="form-select" required>
            <option value="">Selecione...</option>
            @foreach($temporadas as $t)
                <option value="{{ $t->id }}">{{ $t->ano }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Tipo *</label>
        <select name="tipo" class="form-select" required>
            <option value="XCO">XCO</option>
            <option value="XCM">XCM</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Peso *</label>
        <select name="peso" class="form-select" required>
            <option value="3">Peso 3</option>
            <option value="4">Peso 4</option>
            <option value="5">Peso 5</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Cidade</label>
        <select name="cidade_id" class="form-select">
            <option value="">Selecione...</option>
            @foreach($cidades as $c)
                <option value="{{ $c->id }}">{{ $c->nome }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Data *</label>
        <input type="date" name="data_prova" class="form-control" required>
    </div>

    <button class="btn btn-primary">Salvar</button>
    <a href="{{ route('provas.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
