@extends('layout')

@section('title', 'Editar Prova')

@section('content')
<h1>Editar Prova</h1>

<form method="POST" action="{{ route('provas.update', $prova) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nome *</label>
        <input type="text" name="nome" class="form-control" required
               value="{{ $prova->nome }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Etapa</label>
        <input type="number" name="etapa" class="form-control"
               value="{{ $prova->etapa }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Temporada *</label>
        <select name="temporada_id" class="form-select" required>
            @foreach($temporadas as $t)
                <option value="{{ $t->id }}" {{ $t->id == $prova->temporada_id ? 'selected' : '' }}>
                    {{ $t->ano }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Tipo *</label>
        <select name="tipo" class="form-select" required>
            <option value="XCO" {{ $prova->tipo === 'XCO' ? 'selected' : '' }}>XCO</option>
            <option value="XCM" {{ $prova->tipo === 'XCM' ? 'selected' : '' }}>XCM</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Peso *</label>
        <select name="peso" class="form-select" required>
            <option value="3" {{ $prova->peso == 3 ? 'selected' : '' }}>Peso 3</option>
            <option value="4" {{ $prova->peso == 4 ? 'selected' : '' }}>Peso 4</option>
            <option value="5" {{ $prova->peso == 5 ? 'selected' : '' }}>Peso 5</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Cidade</label>
        <select name="cidade_id" class="form-select">
            <option value="">Selecione...</option>
            @foreach($cidades as $c)
                <option value="{{ $c->id }}" {{ $c->id == $prova->cidade_id ? 'selected' : '' }}>
                    {{ $c->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Data *</label>
        <input type="date" name="data_prova" class="form-control" required
               value="{{ $prova->data_prova }}">
    </div>

    <button class="btn btn-primary">Salvar</button>
    <a href="{{ route('provas.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
