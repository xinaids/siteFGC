@extends('layout')

@section('title', 'Nova Categoria')

@section('content')

<h1 class="title">Cadastrar Categoria</h1>

<form action="{{ route('categorias.store') }}" method="POST" class="col-md-6">
    @csrf

    <label class="form-label">Nome</label>
    <input type="text" name="nome" class="form-control" required>

    <label class="form-label mt-3">Gênero</label>
    <select name="genero" class="form-select">
        <option value="M">Masculino</option>
        <option value="F">Feminino</option>
        <option value="M/F">Misto</option>
        <option value="PCD">PCD</option>
    </select>

    <div class="row mt-3">
        <div class="col">
            <label class="form-label">Idade Mínima</label>
            <input type="number" name="idade_min" class="form-control">
        </div>
        <div class="col">
            <label class="form-label">Idade Máxima</label>
            <input type="number" name="idade_max" class="form-control">
        </div>
    </div>

    <button class="btn btn-success mt-4">Salvar</button>
</form>

@endsection
