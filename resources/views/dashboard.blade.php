<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Dashboard FGC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        :root {
            --primary: #0c3a11;
            /* Parsley */
            --primary-light: #67e476ff;
            /* variação mais clara */
            --primary-dark: #0c5215ff;
            /* variação mais escura */

            --bg: #f3f7f4;
            --sidebar: var(--primary-dark);
            --sidebar-hover: var(--primary-light);

            --text: #8ed1a1ff;
            --card-bg: #ffffff;
        }

        @media (prefers-color-scheme: dark) {
            :root {
                --bg: #07180b;
                --sidebar: #041307;
                --sidebar-hover: #0c3a11;
                --primary: #1e8c3b;
                --primary-light: #28a84c;
                --primary-dark: #0c3a11;

                --text: #d4e6d8;
                --card-bg: #0d1f12;
            }
        }


        /* BODY */
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
            cursor: pointer;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: var(--primary-light);
            color: white;
        }


        /* MOBILE BUTTON */
        .mobile-btn {
            display: none;
            position: absolute;
            left: 10px;
            top: 10px;
            background: var(--primary);
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            z-index: 10;
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


        /* CARDS */
        .cards {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .card {
            background: var(--card-bg);
            min-width: 220px;
            flex: 1;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .10);
            transition: 0.2s;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, .16);
        }

        .card h3 {
            margin: 0 0 10px 0;
            font-size: 18px;
            font-weight: bold;
            color: var(--primary-dark);
        }

        .card p {
            font-size: 28px;
            font-weight: bold;
            margin: 0;
            color: var(--primary-light);
        }


        /* BUTTON (Dashboard Geral) */
        .back-btn {
            background: var(--primary);
            color: white;
            border: none;
            padding: 10px 18px;
            font-size: 15px;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            margin-bottom: 15px;
            transition: 0.2s;
        }

        .back-btn:hover {
            background: var(--primary-light);
        }


        /* RESPONSIVO */
        @media (max-width: 900px) {
            .sidebar {
                position: fixed;
                left: -260px;
                top: 0;
                height: 100%;
                z-index: 20;
            }

            .sidebar.open {
                left: 0;
            }

            .mobile-btn {
                display: block;
            }

            .content {
                padding: 20px;
            }

            .title {
                margin-top: 50px;
            }
        }
    </style>
</head>

<body>

    <button class="mobile-btn" onclick="toggleMenu()">Menu</button>

    <div class="sidebar" id="sidebar">
        <h2>FGC - MTB</h2>

        <a href="{{ route('rankings') }}">Rankings</a>
        <a href="{{ route('resultados') }}">Resultados</a>
        <a href="{{ route('atletas') }}">Atletas</a>
        <a href="{{ route('equipes.index') }}">Equipes</a>
        <a href="{{ route('provas') }}">Provas</a>
        <a href="{{ route('temporadas') }}">Temporadas</a>
        <a href="{{ route('pontuacao') }}">Pontuação</a>

    </div>


    <div class="content" id="content">
        <div class="title">Dashboard Geral</div>

        <div class="cards">
            <div class="card">
                <h3>Atletas Cadastrados</h3>
                <p>1.284</p>
            </div>

            <div class="card">
                <h3>Provas Ativas</h3>
                <p>32</p>
            </div>

            <div class="card">
                <h3>Equipes</h3>
                <p>114</p>
            </div>
        </div>
    </div>


    <script>
        function toggleMenu() {
            document.getElementById('sidebar').classList.toggle('open');
        }


    </script>

</body>

</html>