<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Sistema de Aluguel</title>

<style>

body{
    margin:0;
    font-family: Arial, Helvetica, sans-serif;
    background:#f4f6f9;
}

.sidebar{
    width:220px;
    height:100vh;
    background:#2c3e50;
    position:fixed;
    left:0;
    top:0;
}

.sidebar h2{
    color:white;
    text-align:center;
    padding:20px;
}

.sidebar a{
    display:block;
    color:white;
    padding:12px 20px;
    text-decoration:none;
}

.sidebar a:hover{
    background:#34495e;
}

.content{
    margin-left:220px;
    padding:20px;
}

.navbar{
    background:white;
    padding:15px;
    border-bottom:1px solid #ddd;
}

.card{
    background:white;
    padding:20px;
    border-radius:6px;
    box-shadow:0px 0px 10px rgba(0,0,0,0.05);
}

.btn{
    background:#3498db;
    color:white;
    padding:8px 14px;
    border:none;
    border-radius:4px;
    text-decoration:none;
}

.btn:hover{
    background:#2980b9;
}

</style>

</head>

<body>

<div class="sidebar">

<h2>CosplaySys</h2>

<a href="/dashboard">Dashboard</a>

<a href="/clientes">Clientes</a>

<a href="/cosplays">Cosplays</a>

<a href="/locacoes">Locações</a>

<a href="/categorias">Categorias</a>

<form method="POST" action="/logout">
@csrf
<button style="margin:20px;background:#e74c3c;color:white;border:none;padding:10px;width:80%;">
Sair
</button>
</form>

</div>

<div class="content">

<div class="navbar">
<b>Sistema de Aluguel de Cosplays</b>
</div>

<br>

@if(session('success'))
<div style="background:#2ecc71;color:white;padding:10px;margin-bottom:10px;">
{{ session('success') }}
</div>
@endif

@if(session('error'))
<div style="background:#e74c3c;color:white;padding:10px;margin-bottom:10px;">
{{ session('error') }}
</div>
@endif

<div class="card">
@yield('content')
</div>

</div>

</body>
</html>