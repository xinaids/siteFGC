@extends('layout')

@section('title', 'Cadastrar Cidade')

@section('content')

<h1 class="title">Cadastrar Cidade</h1>

<form action="{{ route('cidades.store') }}" method="POST">
    @csrf

    <label>Nome da Cidade</label>
    <input type="text" name="nome" required style="width:100%; padding:10px; margin:10px 0;">

    <label>Estado (UF)</label>
    <input type="text" name="estado" maxlength="2" required style="width:80px; padding:10px; margin:10px 0;">

    <button class="back-btn">Salvar</button>
</form>

@endsection
