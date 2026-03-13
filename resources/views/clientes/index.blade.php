@extends('layouts.app')

@section('content')

<h1>Clientes</h1>

<br>

<a href="{{ route('clientes.create') }}" class="btn">Novo Cliente</a>

<br><br>

<form method="GET" action="{{ route('clientes.index') }}">

<input type="text" name="busca" placeholder="Buscar cliente..." value="{{ $busca ?? '' }}">

<button type="submit" class="btn">Buscar</button>

</form>

<br>

<table border="1" width="100%" cellpadding="8">

<tr>
<th>ID</th>
<th>Nome</th>
<th>CPF</th>
<th>Email</th>
<th>Telefone</th>
<th>Ações</th>
</tr>

@foreach($clientes as $cliente)

<tr>

<td>{{ $cliente->id }}</td>
<td>{{ $cliente->nome }}</td>
<td>{{ $cliente->cpf }}</td>
<td>{{ $cliente->email }}</td>
<td>{{ $cliente->telefone }}</td>

<td>

<a href="{{ route('clientes.edit', $cliente->id) }}" class="btn">Editar</a>

<form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST"
style="display:inline"
onsubmit="return confirm('Tem certeza que deseja excluir este cliente?')">

@csrf
@method('DELETE')

<button type="submit" class="btn">Excluir</button>

</form>

</td>

</tr>

@endforeach

</table>

<br>

{{ $clientes->links() }}

@endsection