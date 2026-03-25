<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CosplaySys - Gestão Profissional</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
:root {
        --sidebar-width: 250px;
        --bg: #f8f9fa;
        --text: #111;
        --card-bg: #ffffff;
        --border-color: #dee2e6;
    }

    [data-theme="dark"] {
        --bg: #111111;
        --text: #f8f9fa;
        --card-bg: #1a1a1a;
        --border-color: #333333;
    }

    body {
        background-color: var(--bg);
        color: var(--text);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    /* --- CARD FIXES --- */
    .card {
        background-color: var(--card-bg);
        border: 1px solid var(--border-color);
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        overflow: hidden; /* <--- CORTA O HEADER QUADRADO NAS QUINAS */
        transition: all 0.3s ease;
    }

    /* Garante que o header também arredonde os cantos superiores */
    .card-header {
        border-top-left-radius: 12px !important;
        border-top-right-radius: 12px !important;
        background-color: var(--card-bg);
        border-bottom: 1px solid var(--border-color);
    }

    /* --- MODO ESCURO FORÇADO --- */
    [data-theme="dark"] .card-header.bg-white,
    [data-theme="dark"] .card {
        background-color: var(--card-bg) !important;
    }

    [data-theme="dark"] .content, 
    [data-theme="dark"] .card-header, 
    [data-theme="dark"] .card-body, 
    [data-theme="dark"] h1, [data-theme="dark"] h2, [data-theme="dark"] h3, 
    [data-theme="dark"] h4, [data-theme="dark"] h5, [data-theme="dark"] h6, 
    [data-theme="dark"] p, [data-theme="dark"] span, [data-theme="dark"] label, 
    [data-theme="dark"] td, [data-theme="dark"] th {
        color: #ffffff !important;
    }

    [data-theme="dark"] .table {
        --bs-table-bg: var(--card-bg);
        --bs-table-color: #ffffff;
        --bs-table-border-color: var(--border-color);
    }

    [data-theme="dark"] .form-control {
        background-color: #2d3748 !important;
        color: #ffffff !important;
        border-color: var(--border-color) !important;
    }

    /* Quando o tema for dark, ignore o 'light' do Bootstrap na tabela */
[data-theme="dark"] .table-light,
[data-theme="dark"] .table-light th {
    background-color: #2d3748 !important; /* Um cinza azulado que destaca bem */
    color: #ffffff !important;
    border-color: #444 !important;
}

/* Ajuste para as bordas das células da tabela no modo escuro */
[data-theme="dark"] .table td, 
[data-theme="dark"] .table th {
    border-bottom-color: #333 !important;
}

/* Remove aquela sombra/fundo padrão que o Bootstrap coloca no hover da tabela */
[data-theme="dark"] .table-hover tbody tr:hover {
    --bs-table-accent-bg: #2d3748 !important;
    color: #ffffff !important;
}

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            background: #212529;
            color: white;
            transition: all 0.3s;
            z-index: 1000;
        }

        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            border-radius: 0;
            border-left: 4px solid transparent;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: #343a40;
            color: white;
            border-left-color: #0d6efd;
        }

        .content {
            padding: 30px;
            transition: all 0.3s;
        }

        .content-logged {
            margin-left: var(--sidebar-width);
        }

        .content-guest {
            margin-left: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .btn-primary {
            border-radius: 8px;
            font-weight: 600;
        }

        /* BOTÃO TEMA */
        .theme-btn {
            margin: 10px 20px;
        }
    </style>
</head>

<body>

@auth
    <div class="sidebar d-flex flex-column p-3">

        <h3 class="text-center mb-4 py-3 border-bottom">CosplaySys</h3>

        <!-- BOTÃO TEMA -->
        <button id="theme-toggle" class="btn btn-light theme-btn">
            🌙 Trocar tema
        </button>

        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
            </li>

            <li>
                <a href="/clientes" class="nav-link">
                    <i class="bi bi-people me-2"></i> Clientes
                </a>
            </li>

            <li>
                <a href="{{ route('cosplays.index') }}" class="nav-link {{ request()->routeIs('cosplays.*') ? 'active' : '' }}">
                    <i class="bi bi-person-arms-up me-2"></i> Cosplays
                </a>
            </li>

            <li><a href="/locacoes" class="nav-link"><i class="bi bi-calendar-check me-2"></i> Locações</a></li>
            <li><a href="/categorias" class="nav-link"><i class="bi bi-tags me-2"></i> Categorias</a></li>
        </ul>

        <hr>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-danger w-100">
                <i class="bi bi-box-arrow-right me-2"></i> Sair
            </button>
        </form>
    </div>
@endauth

<div class="content {{ auth()->check() ? 'content-logged' : 'content-guest' }}">
    <div class="{{ auth()->check() ? 'container-fluid' : 'container' }}">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('conteudo')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
/* =========================
   PEGAR BOTÃO COM SEGURANÇA
========================= */
const button = document.getElementById("theme-toggle");

/* =========================
   APLICAR TEMA SALVO
========================= */
if (localStorage.getItem("theme") === "dark") {
    document.documentElement.setAttribute("data-theme", "dark");
}

/* =========================
   EVITAR ERRO SE BOTÃO NÃO EXISTIR
========================= */
if (button) {
    button.addEventListener("click", () => {
        const currentTheme = document.documentElement.getAttribute("data-theme");

        if (currentTheme === "dark") {
            document.documentElement.removeAttribute("data-theme");
            localStorage.setItem("theme", "light");
            button.innerHTML = "🌙 Modo Escuro";
        } else {
            document.documentElement.setAttribute("data-theme", "dark");
            localStorage.setItem("theme", "dark");
            button.innerHTML = "☀️ Modo Claro";
        }
    });
}
</script>

</body>
</html>