<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cosplay Rent - Sistema de Aluguel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">🎭 Cosplay Rent</a>
            <div class="navbar-nav">
                @auth
                    <a class="nav-link" href="{{ route('cosplays.index') }}">Catálogo</a>
                    <a class="nav-link" href="{{ route('locacoes.index') }}">Meus Aluguéis</a>
                    <a class="nav-link" href="{{ route('clientes.index') }}">Clientes</a>
                    
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link text-danger" style="text-decoration: none;">Sair</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container">
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('conteudo') 
    </main>

    <footer class="text-center mt-5 py-3 border-top">
        <p>&copy; 2026 - Projeto de Aluguel de Cosplays</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>