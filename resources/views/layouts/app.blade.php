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
            <a class="navbar-brand" href="#">🎭 Cosplay Rent</a>
            <div class="navbar-nav">
                <a class="nav-link" href="#">Catálogo</a>
                <a class="nav-link" href="#">Meus Aluguéis</a>
                <a class="nav-link text-danger" href="#">Sair</a>
            </div>
        </div>
    </nav>

    <main class="container">
        @yield('conteudo') </main>

    <footer class="text-center mt-5 py-3 border-top">
        <p>&copy; 2026 - Projeto de Aluguel de Cosplays</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>