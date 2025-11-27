@extends('layout')

@section('title', 'Novo Resultado')

@section('content')

<h2 class="mb-4">Cadastrar Resultado</h2>

<form action="{{ route('resultados.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Prova *</label>
        <select name="prova_id" class="form-control" required>
            <option value="">Selecione...</option>
            @foreach($provas as $p)
                <option value="{{ $p->id }}">
                    {{ $p->nome }} - {{ $p->etapa }}ª Etapa ({{ date('d/m/Y', strtotime($p->data_prova)) }})
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Atleta *</label>
        <select name="atleta_id" class="form-control" required>
            <option value="">Selecione...</option>
            @foreach($atletas as $a)
                <option value="{{ $a->id }}">
                    {{ $a->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Categoria</label>
        <select name="categoria_id" class="form-control">
            <option value="">Automática / Não informado</option>
            @foreach($categorias as $c)
                <option value="{{ $c->id }}">
                    {{ $c->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Classificação</label>
        <input type="number" name="classificacao" min="1" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Tempo (HH:MM:SS)</label>
        <input type="text" name="tempo" class="form-control" placeholder="02:15:33">
    </div>

    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-control">
            <option value="OK">OK</option>
            <option value="DNF">DNF</option>
            <option value="DSQ">DSQ</option>
            <option value="DNS">DNS</option>
        </select>
    </div>

    <button class="btn btn-success">Salvar</button>
    <a href="{{ route('resultados.index') }}" class="btn btn-secondary">Cancelar</a>

</form>

@endsection
