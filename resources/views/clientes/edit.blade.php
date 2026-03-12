@extends('layouts.app')

@section('conteudo')
<div class="card shadow-sm mx-auto" style="max-width: 600px;">
    <div class="card-header bg-warning text-dark">
        <h4 class="mb-0">Editar Cliente</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nome Completo</label>
                <input type="text" name="nome" class="form-control" value="{{ $cliente->nome }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" value="{{ $cliente->email }}" required>
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Voltar</a>
                <button type="submit" class="btn btn-primary">Atualizar Dados</button>
            </div>
        </form>
    </div>
</div>
@endsection