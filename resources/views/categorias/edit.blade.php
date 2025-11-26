@extends('layout')

@section('title', 'Editar Categoria')

@section('content')

<h1 class="title">Editar Categoria</h1>

<form action="{{ route('categorias.update', $categoria) }}" method="POST" class="col-md-6">
    @csrf
    @method('PUT')

    <label class="form-label">Nome</label>
    <input type="text" name="nome" class="form-control" value="{{ $categoria->nome }}" required>

    <label class="form-label mt-3">Gênero</label>
    <select name="genero" class="form-select">
        <option value="M"   {{ $categoria->genero=='M' ? 'selected' : '' }}>Masculino</option>
        <option value="F"   {{ $categoria->genero=='F' ? 'selected' : '' }}>Feminino</option>
        <option value="M/F" {{ $categoria->genero=='M/F' ? 'selected' : '' }}>Misto</option>
        <option value="PCD" {{ $categoria->genero=='PCD' ? 'selected' : '' }}>PCD</option>
    </select>

    <div class="row mt-3">
        <div class="col">
            <label class="form-label">Idade Mínima</label>
            <input type="number" name="idade_min" class="form-control" value="{{ $categoria->idade_min }}">
        </div>
        <div class="col">
            <label class="form-label">Idade Máxima</label>
            <input type="number" name="idade_max" class="form-control" value="{{ $categoria->idade_max }}">
        </div>
    </div>

    <button class="btn btn-success mt-4">Salvar</button>
</form>

@endsection
