<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'FGC')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --primary: #0c3a11;
            --primary-light: #67e476ff;
            --primary-dark: #0c5215ff;

            --bg: #f3f7f4;
            --sidebar: var(--primary-dark);
            --sidebar-hover: #0c6c12;
            --sidebar-active: var(--primary-light);

            --text: #e6ffe9;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: #1a1a1a;
            height: 100vh;
            overflow: hidden;
        }

        /* SIDEBAR */
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
            font-size: 16px;
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

        /* MOBILE */
        @media (max-width: 768px) {
            .sidebar {
                left: -250px;
                transition: 0.3s;
            }

            .sidebar.open {
                left: 0;
            }

            .content {
                margin-left: 0;
            }

            #menuBtn {
                position: fixed;
                top: 10px;
                left: 10px;
                z-index: 999;
                background: var(--primary);
                color: white;
                border: none;
                padding: 8px 12px;
                border-radius: 6px;
            }
        }
    </style>
</head>

<body>

    <!-- MENU MOBILE BUTTON -->
    <button id="menuBtn" class="d-md-none">
        <i class="bi bi-list" style="font-size: 22px;"></i>
    </button>


    <!-- SIDEBAR -->
    <div class="sidebar" id="sidebar">

        <h4>FGC MTB</h4>

        <!-- Ranking -->
        <a href="{{ route('rankings') }}"
            class="{{ request()->routeIs('rankings') ? 'active' : '' }}">
            <i class="bi bi-bar-chart-line"></i>
            Ranking
        </a>

        <!-- Resultados -->
        <a href="{{ route('resultados') }}"
            class="{{ request()->routeIs('resultados') ? 'active' : '' }}">
            <i class="bi bi-flag"></i>
            Resultados
        </a>

        <!-- Cadastros -->
        <a class="d-flex justify-content-between" data-bs-toggle="collapse"
            href="#cadastrosMenu" role="button">
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


    <!-- CONTENT -->
    <div class="content">
        @yield('content')
    </div>


    <script>
        // MOBILE MENU TOGGLE
        document.getElementById('menuBtn').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('open');
        });
    </script>

</body>

</html>