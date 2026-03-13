@extends('layouts.app')

@section('content')

<h1>Editar Cliente</h1>

<form action="{{ route('clientes.update', $cliente->id) }}" method="POST">

@csrf
@method('PUT')

<label>Nome</label>
<input type="text" name="nome" value="{{ $cliente->nome }}">

<br><br>

<label>CPF</label>
<input type="text" name="cpf" value="{{ $cliente->cpf }}">

<br><br>

<label>Email</label>
<input type="email" name="email" value="{{ $cliente->email }}">

<br><br>

<label>Telefone</label>
<input type="text" name="telefone" value="{{ $cliente->telefone }}">

<br><br>

<button type="submit" class="btn">Atualizar</button>

</form>

@endsection