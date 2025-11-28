@extends('layout')

@section('title', 'Ranking')

@section('content')

<h1 class="mb-4">Ranking Geral</h1>

<form method="GET" action="{{ route('rankings') }}" class="mb-4">
    <label class="form-label">Selecione a Temporada:</label>
    <select name="temporada_id" class="form-control" onchange="this.form.submit()">
        <option value="">-- selecione --</option>

        @foreach($temporadas as $t)
        <option value="{{ $t->id }}"
            {{ isset($temporada_id) && $temporada_id == $t->id ? 'selected' : '' }}>
            {{ $t->ano }}
        </option>
        @endforeach

    </select>
</form>

{{-- nenhuma temporada selecionada --}}
@if(!$temporada_id)
<div class="alert alert-info">Escolha uma temporada para visualizar o ranking.</div>
@endif

{{-- temporada selecionada porém sem resultados --}}
@if($temporada_id && empty($ranking))
<div class="alert alert-warning">Nenhum resultado encontrado para esta temporada.</div>
@endif


{{-- monta ranking apenas se houver dados --}}
@if($temporada_id && !empty($ranking))

@foreach($ranking as $categoria_nome => $dados)

<h2 class="mt-5">{{ strtoupper($categoria_nome) }}</h2>

<table class="table table-bordered table-striped">

    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>FED</th>
            <th>Atleta</th>
            <th>Equipe</th>
            <th>Subtotal</th>

            @foreach($provas as $p)
            <th class="text-center">
                {{ $p->etapa }}ª Etapa <br>
                {{ $p->nome }} <br>
                <small><b>{{ strtoupper($p->tipo ?? '-') }}</b> • Peso {{ $p->peso }}</small>
            </th>
            @endforeach

        </tr>
    </thead>

    <tbody>

        @foreach($dados as $i => $linha)
        <tr>
            <td>{{ $i+1 }}º</td>
            <td>{{ $linha['atleta']->federacao ?? 'RS' }}</td>
            <td>{{ $linha['atleta']->nome }}</td>
            <td>{{ $linha['equipe'] }}</td>
            <td><b>{{ $linha['subtotal'] }}</b></td>

            @foreach($provas as $p)
            @php
            $r = $linha['provas']->firstWhere('prova_id', $p->id);
            @endphp

            <td style="text-align: center;">
                {{ $r->pontuacao ?? '-' }}
            </td>
            @endforeach

        </tr>
        @endforeach

    </tbody>

</table>

@endforeach

@endif

@endsection