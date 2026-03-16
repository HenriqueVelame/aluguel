@extends('layouts.app')

@section('conteudo')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">👤 Cadastrar Novo Cliente</h4>
                    <a href="{{ route('clientes.index') }}" class="btn btn-sm btn-light">Voltar</a>
                </div>
                <div class="card-body p-4">
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('clientes.store') }}" method="POST">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Nome Completo</label>
                                <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" value="{{ old('nome') }}" placeholder="Ex: João Silva" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">CPF</label>
                                <input type="text" name="cpf" class="form-control @error('cpf') is-invalid @enderror" value="{{ old('cpf') }}" placeholder="000.000.000-00" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">E-mail</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="joao@email.com" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Telefone / WhatsApp</label>
                                <input type="text" name="telefone" class="form-control @error('telefone') is-invalid @enderror" value="{{ old('telefone') }}" placeholder="(00) 00000-0000" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Medidas do Corpo (Opcional)</label>
                            <textarea name="medidas_corpo" class="form-control" rows="3" placeholder="Ex: Altura: 1.80m, Busto: 90cm, Cintura: 80cm...">{{ old('medidas_corpo') }}</textarea>
                            <small class="text-muted">Informações úteis para ajuste de trajes.</small>
                        </div>

                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-success px-5">
                                <i class="bi bi-save"></i> Salvar Cliente
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection