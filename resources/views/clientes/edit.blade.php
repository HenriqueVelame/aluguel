@extends('layouts.app')

@section('conteudo')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-warning">
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0">Editar Dados do Cliente</h4>
            </div>
            <div class="card-body">
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

                    <div class="mb-3">
                        <label class="form-label fw-bold">Medidas do Corpo</label>
                        <textarea name="medidas_corpo" class="form-control" rows="3">{{ $cliente->medidas_corpo }}</textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Voltar</a>
                        <button type="submit" class="btn btn-warning px-4 fw-bold">Atualizar Dados</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection