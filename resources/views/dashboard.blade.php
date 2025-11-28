@extends('layout')

@section('title', 'Dashboard')

@section('content')

<h1 class="mb-4">Dashboard Geral</h1>

<div class="row g-4">

    <div class="col-md-4">
        <div class="card shadow-sm p-4">
            <h4 class="text-success">Atletas</h4>
            <p class="display-6 fw-bold">1.284</p>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm p-4">
            <h4 class="text-success">Provas</h4>
            <p class="display-6 fw-bold">32</p>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm p-4">
            <h4 class="text-success">Equipes</h4>
            <p class="display-6 fw-bold">114</p>
        </div>
    </div>

</div>

@endsection
