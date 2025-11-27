@extends('layout')

@section('title', 'Novo Atleta')

@section('content')
<div class="container">

    <h2 class="mb-4">Cadastrar Atleta</h2>

    <form action="{{ route('atletas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nome *</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>CPF</label>
            <input type="text" name="cpf" id="cpf" class="form-control">
        </div>

        <div class="mb-3">
            <label>Nascimento</label>
            <input type="date" name="nascimento" class="form-control">
        </div>

        <div class="mb-3">
            <label>Sexo</label>
            <select name="sexo" class="form-control">
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Categoria</label>
            <select name="categoria_id" class="form-control">
                <option value="">Sem categoria</option>
                @foreach($categorias as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Equipe</label>
            <select name="equipe_id" class="form-control">
                <option value="">Sem equipe</option>
                @foreach($equipes as $e)
                    <option value="{{ $e->id }}">{{ $e->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Cidade</label>
            <select name="cidade_id" class="form-control">
                <option value="">Não informado</option>
                @foreach($cidades as $c)
                    <option value="{{ $c->id }}">{{ $c->nome }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">Salvar</button>
        <a href="{{ route('atletas.index') }}" class="btn btn-secondary">Cancelar</a>

    </form>
</div>

{{-- Máscara de CPF --}}
<script>
document.getElementById('cpf').addEventListener('input', function (e) {
    let value = e.target.value.replace(/\D/g, '');
    if (value.length > 11) value = value.slice(0, 11);

    let formatted = value;

    if (value.length > 3)
        formatted = value.slice(0,3) + '.' + value.slice(3);

    if (value.length > 6)
        formatted = formatted.slice(0,7) + '.' + value.slice(6);

    if (value.length > 9)
        formatted = formatted.slice(0,11) + '-' + value.slice(9);

    e.target.value = formatted;
});
</script>

@endsection
