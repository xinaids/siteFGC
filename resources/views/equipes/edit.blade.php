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
        <label class="form-label">Cidade</label>
        <input type="text" name="cidade" class="form-control"
               value="{{ $equipe->cidade }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Responsável</label>
        <input type="text" name="responsavel" class="form-control"
               value="{{ $equipe->responsavel }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Telefone</label>
        <input type="text" name="telefone" class="form-control"
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

@endsection
