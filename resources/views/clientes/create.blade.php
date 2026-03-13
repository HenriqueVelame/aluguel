@extends('layouts.app')

@section('content')

<h1>Novo Cliente</h1>

<form action="{{ route('clientes.store') }}" method="POST">

@csrf

<label>Nome</label>
<input type="text" name="nome">

<br><br>

<label>CPF</label>
<input type="text" name="cpf">

<br><br>

<label>Email</label>
<input type="email" name="email">

<br><br>

<label>Telefone</label>
<input type="text" name="telefone">

<br><br>

<button type="submit" class="btn">Salvar</button>

</form>

@endsection