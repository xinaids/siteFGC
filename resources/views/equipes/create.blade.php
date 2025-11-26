@extends('layout')

@section('title', 'Nova Equipe')

@section('content')
<h1>Nova Equipe</h1>

<form method="POST" action="{{ route('equipes.store') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nome *</label>
        <input type="text" name="nome" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Cidade *</label>
        <select name="cidade" class="form-select" required>
            <option value="">Selecione...</option>
            @foreach($cidades as $cidade)
                <option value="{{ $cidade->nome }}">{{ $cidade->nome }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Responsável</label>
        <input type="text" name="responsavel" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Telefone</label>
        <input type="text" name="telefone" id="telefone" class="form-control" maxlength="15">
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control">
    </div>

    <button class="btn btn-primary">Salvar</button>
    <a href="{{ route('equipes.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

{{-- Máscara de telefone --}}
<script>
document.getElementById('telefone').addEventListener('input', function (e) {
    let value = e.target.value.replace(/\D/g, '');

    if (value.length > 11) value = value.slice(0, 11);

    if (value.length > 10) {
        value = value.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');
    } else if (value.length > 6) {
        value = value.replace(/^(\d{2})(\d{4,5})(\d{0,4})$/, '($1) $2-$3');
    } else if (value.length > 2) {
        value = value.replace(/^(\d{2})(\d{0,5})$/, '($1) $2');
    } else {
        value = value.replace(/^(\d*)$/, '($1');
    }

    e.target.value = value;
});
</script>

@endsection
