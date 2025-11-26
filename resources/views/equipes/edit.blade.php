@extends('layout')

@section('title', 'Editar Equipe')

@section('content')
<h1>Editar Equipe</h1>

<form method="POST" action="{{ route('equipes.update', $equipe) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nome *</label>
        <input type="text" name="nome" class="form-control" required
               value="{{ $equipe->nome }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Cidade *</label>
        <select name="cidade" class="form-select" required>
            <option value="">Selecione...</option>
            @foreach($cidades as $cidade)
                <option value="{{ $cidade->nome }}"
                    @selected($cidade->nome == $equipe->cidade)>
                    {{ $cidade->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Responsável</label>
        <input type="text" name="responsavel" class="form-control"
               value="{{ $equipe->responsavel }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Telefone</label>
        <input type="text" name="telefone" id="telefone" class="form-control"
               value="{{ $equipe->telefone }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control"
               value="{{ $equipe->email }}">
    </div>

    <button class="btn btn-primary">Salvar</button>
    <a href="{{ route('equipes.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

{{-- Máscara de telefone --}}
<script>
document.getElementById('telefone').addEventListener('input', function (e) {
    let v = e.target.value.replace(/\D/g, '');

    if (v.length > 11) v = v.slice(0, 11);

    if (v.length > 10) {
        v = v.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');
    } else if (v.length > 6) {
        v = v.replace(/^(\d{2})(\d{4,5})(\d{0,4})$/, '($1) $2-$3');
    } else if (v.length > 2) {
        v = v.replace(/^(\d{2})(\d{0,5})$/, '($1) $2');
    } else {
        v = v.replace(/^(\d*)$/, '($1');
    }

    e.target.value = v;
});
</script>

@endsection
