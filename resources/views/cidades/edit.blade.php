@extends('layout')

@section('title', 'Editar Cidade')

@section('content')

<h1 class="title">Editar Cidade</h1>

<form action="{{ route('cidades.update', $cidade) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nome da Cidade</label>
    <input type="text" name="nome" value="{{ $cidade->nome }}" required style="width:100%; padding:10px; margin:10px 0;">

    <label>Estado (UF)</label>
    <input type="text" name="estado" maxlength="2" value="{{ $cidade->estado }}" required style="width:80px; padding:10px; margin:10px 0;">

    <button class="back-btn">Salvar</button>
</form>

@endsection
