@extends('layout')

@section('title', 'Editar Atleta')

@section('content')
<div class="container">

    <h2 class="mb-4">Editar Atleta</h2>

    <form action="{{ route('atletas.update', $atleta->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nome *</label>
            <input type="text" name="nome" class="form-control" value="{{ $atleta->nome }}" required>
        </div>

        <div class="mb-3">
            <label>CPF</label>
            <input type="text" name="cpf" class="form-control" value="{{ $atleta->cpf }}">
        </div>

        <div class="mb-3">
            <label>Nascimento</label>
            <input type="date" name="nascimento" class="form-control" value="{{ $atleta->nascimento }}">
        </div>

        <div class="mb-3">
            <label>Gênero</label>
            <select name="genero" class="form-control">
                <option value="M" {{ $atleta->genero == 'M' ? 'selected' : '' }}>Masculino</option>
                <option value="F" {{ $atleta->genero == 'F' ? 'selected' : '' }}>Feminino</option>
                <option value="PCD" {{ $atleta->genero == 'PCD' ? 'selected' : '' }}>PCD</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Equipe</label>
            <select name="equipe_id" class="form-control">
                <option value="">Sem equipe</option>
                @foreach($equipes as $e)
                    <option value="{{ $e->id }}" {{ $atleta->equipe_id == $e->id ? 'selected' : '' }}>
                        {{ $e->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Cidade</label>
            <select name="cidade_id" class="form-control">
                <option value="">Não informado</option>
                @foreach($cidades as $c)
                    <option value="{{ $c->id }}" {{ $atleta->cidade_id == $c->id ? 'selected' : '' }}>
                        {{ $c->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Salvar alterações</button>
        <a href="{{ route('atletas.index') }}" class="btn btn-secondary">Cancelar</a>

    </form>

</div>
@endsection
