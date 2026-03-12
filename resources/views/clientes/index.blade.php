@extends('layouts.app')

@section('conteudo')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>👥 Clientes</h1>
    <a href="{{ route('clientes.create') }}" class="btn btn-primary">Novo Cliente</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th width="200">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>
                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Excluir este cliente?')">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection