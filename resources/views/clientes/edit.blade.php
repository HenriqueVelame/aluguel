@extends('layouts.app')

@section('conteudo')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold"><i class="bi bi-pencil-square me-2"></i> Editar Cliente</h2>
    <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary">Cancelar</a>
</div>

<div class="card shadow border-0">
    <div class="card-body p-4">
        <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Nome Completo</label>
                    <input type="text" name="nome" class="form-control" value="{{ $cliente->nome }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">CPF</label>
                    <input type="text" name="cpf" class="form-control" value="{{ $cliente->cpf }}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">E-mail</label>
                    <input type="email" name="email" class="form-control" value="{{ $cliente->email }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Telefone</label>
                    <input type="text" name="telefone" class="form-control" value="{{ $cliente->telefone }}" required>
                </div>
            </div>
            <div class="text-end mt-4">
                <button type="submit" class="btn btn-warning btn-lg px-5 fw-bold">Atualizar Cliente</button>
            </div>
        </form>
    </div>
</div>
@endsection