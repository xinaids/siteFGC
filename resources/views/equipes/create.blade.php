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
        <label class="form-label">Cidade</label>
        <input type="text" name="cidade" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Responsável</label>
        <input type="text" name="responsavel" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Telefone</label>
        <input type="text" name="telefone" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control">
    </div>

    <button class="btn btn-primary">Salvar</button>
    <a href="{{ route('equipes.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection
