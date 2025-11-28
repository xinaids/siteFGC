<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'FGC')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --primary: #0c3a11;
            --primary-light: #67e476ff;
            --primary-dark: #0c5215ff;

            --bg: #f3f7f4;
            --sidebar: var(--primary-dark);
            --sidebar-hover: #0c6c12;

            --text: #e6ffe9;
        }

        body {
            margin: 0;
            background: var(--bg);
            height: 100vh;
            overflow: hidden;
        }

        .sidebar {
            width: 240px;
            background: var(--sidebar);
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            padding: 15px 0;
            overflow-y: auto;
        }

        .sidebar h4 {
            color: var(--text);
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--text);
            padding: 12px 20px;
            text-decoration: none;
            transition: 0.2s;
        }

        .sidebar a:hover {
            background: var(--sidebar-hover);
        }

        .sidebar .active {
            background: var(--primary-light);
            color: #003b06 !important;
            font-weight: bold;
        }

        .content {
            margin-left: 240px;
            padding: 25px;
            height: 100vh;
            overflow-y: auto;
        }
    </style>
</head>

<body>

<button id="menuBtn" class="d-md-none">
    <i class="bi bi-list" style="font-size: 22px;"></i>
</button>

<div class="sidebar" id="sidebar">

    <h4>FGC MTB</h4>

    <a href="{{ route('rankings') }}" class="{{ request()->routeIs('rankings') ? 'active' : '' }}">
        <i class="bi bi-bar-chart-line"></i> Ranking
    </a>

    <a href="{{ route('resultados') }}" class="{{ request()->routeIs('resultados') ? 'active' : '' }}">
        <i class="bi bi-flag"></i> Resultados
    </a>

    <a class="d-flex justify-content-between" data-bs-toggle="collapse" href="#cadastrosMenu">
        <span><i class="bi bi-folder"></i> Cadastros</span>
        <i class="bi bi-chevron-down"></i>
    </a>

    <div class="collapse ps-3" id="cadastrosMenu">

        <a href="{{ route('atletas.index') }}" class="{{ request()->routeIs('atletas.*') ? 'active' : '' }}">
            <i class="bi bi-person"></i> Atletas
        </a>

        <a href="{{ route('equipes.index') }}" class="{{ request()->routeIs('equipes.*') ? 'active' : '' }}">
            <i class="bi bi-people"></i> Equipes
        </a>

        <a href="{{ route('provas.index') }}" class="{{ request()->routeIs('provas.*') ? 'active' : '' }}">
            <i class="bi bi-bicycle"></i> Provas
        </a>

        <a href="{{ route('categorias.index') }}" class="{{ request()->routeIs('categorias.*') ? 'active' : '' }}">
            <i class="bi bi-tags"></i> Categorias
        </a>

        <a href="{{ route('temporadas.index') }}" class="{{ request()->routeIs('temporadas.*') ? 'active' : '' }}">
            <i class="bi bi-calendar-event"></i> Temporadas
        </a>

        <a href="{{ route('pontuacao.index') }}" class="{{ request()->routeIs('pontuacao.*') ? 'active' : '' }}">
            <i class="bi bi-star"></i> Pontuação
        </a>

        <a href="{{ route('cidades.index') }}" class="{{ request()->routeIs('cidades.*') ? 'active' : '' }}">
            <i class="bi bi-geo-alt"></i> Cidades
        </a>

    </div>

</div>

<div class="content">
    @yield('content')
</div>

<script>
    document.getElementById('menuBtn').addEventListener('click', function () {
        document.getElementById('sidebar').classList.toggle('open');
    });
</script>

</body>
</html>
