<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'FGC')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


    <style>

        :root {
            --primary: #0c3a11;        /* Parsley */
            --primary-light: #67e476ff;
            --primary-dark: #0c5215ff;

            --bg: #f3f7f4;
            --sidebar: var(--primary-dark);
            --sidebar-hover: var(--primary-light);

            --text: #1f2d23;
            --card-bg: #ffffff;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            display: flex;
            height: 100vh;
        }


        /* SIDEBAR */
        .sidebar {
            width: 250px;
            background: var(--sidebar);
            color: white;
            display: flex;
            flex-direction: column;
            transition: 0.3s;
        }

        .sidebar h2 {
            text-align: center;
            margin: 20px 0;
            font-size: 22px;
            letter-spacing: 1px;
            color: #d6f5dd;
        }

        .sidebar a {
            padding: 15px 25px;
            display: block;
            text-decoration: none;
            color: #cde8d3;
            font-size: 17px;
            transition: 0.2s;
        }

        .sidebar a:hover {
            background: var(--primary-light);
            color: white;
        }

        .active {
            background: var(--primary-light);
            color: white;
        }


        /* CONTENT */
        .content {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
        }

        .title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
            color: var(--primary-dark);
        }

    </style>
</head>

<body>

<div class="sidebar">
    <h2>FGC - MTB</h2>

    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard Geral</a>

    <a href="{{ route('rankings') }}" class="{{ request()->routeIs('rankings') ? 'active' : '' }}">Rankings</a>

    <a href="{{ route('resultados') }}" class="{{ request()->routeIs('resultados') ? 'active' : '' }}">Resultados</a>

    <a href="{{ route('atletas') }}" class="{{ request()->routeIs('atletas') ? 'active' : '' }}">Atletas</a>

    <a href="{{ route('equipes') }}" class="{{ request()->routeIs('equipes') ? 'active' : '' }}">Equipes</a>

    <a href="{{ route('provas') }}" class="{{ request()->routeIs('provas') ? 'active' : '' }}">Provas</a>

    <a href="{{ route('temporadas') }}" class="{{ request()->routeIs('temporadas') ? 'active' : '' }}">Temporadas</a>

    <a href="{{ route('pontuacao') }}" class="{{ request()->routeIs('pontuacao') ? 'active' : '' }}">Pontuação</a>
</div>


<div class="content">
    @yield('content')
</div>


</body>
</html>
