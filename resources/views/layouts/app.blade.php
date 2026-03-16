<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CosplaySys - Gestão Profissional</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root { --sidebar-width: 250px; }
        body { background-color: #f8f9fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .sidebar { width: var(--sidebar-width); height: 100vh; position: fixed; background: #212529; color: white; transition: all 0.3s; }
        .sidebar .nav-link { color: rgba(255,255,255,0.8); padding: 12px 20px; border-radius: 0; border-left: 4px solid transparent; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { background: #343a40; color: white; border-left-color: #0d6efd; }
        .content { margin-left: var(--sidebar-width); padding: 30px; }
        .card { border: none; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .btn-primary { border-radius: 8px; font-weight: 600; }
    </style>
</head>
<body>

<div class="sidebar d-flex flex-column p-3">
    <h3 class="text-center mb-4 py-3 border-bottom">🎭 CosplaySys</h3>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item"><a href="/dashboard" class="nav-link"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a></li>
        <li><a href="/clientes" class="nav-link"><i class="bi bi-people me-2"></i> Clientes</a></li>
        <li><a href="/cosplays" class="nav-link"><i class="bi bi-person-arms-up me-2"></i> Cosplays</a></li>
        <li><a href="/locacoes" class="nav-link"><i class="bi bi-calendar-check me-2"></i> Locações</a></li>
        <li><a href="/categorias" class="nav-link"><i class="bi bi-tags me-2"></i> Categorias</a></li>
    </ul>
    <hr>
    <form method="POST" action="/logout">
        @csrf
        <button class="btn btn-outline-danger w-100"><i class="bi bi-box-arrow-right me-2"></i> Sair</button>
    </form>
</div>

<div class="content">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('conteudo')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>