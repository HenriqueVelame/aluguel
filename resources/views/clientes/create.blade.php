@extends('layouts.app')

@section('conteudo')
<div class="card shadow-sm mx-auto" style="max-width: 600px;">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Cadastrar Novo Cliente</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('clientes.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nome Completo</label>
                <input type="text" name="nome" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-success">Salvar Cliente</button>
            </div>
        </form>
    </div>
</div>
@endsection