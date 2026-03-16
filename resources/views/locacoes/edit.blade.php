@extends('layouts.app')

@section('conteudo')
<div class="container mt-4">
    <div class="card shadow border-0">
        <div class="card-header bg-warning text-dark py-3">
            <h4 class="mb-0">Editar Locação #{{ $locacao->id }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('locacoes.update', $locacao->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Cliente</label>
                        <select name="cliente_id" class="form-select" required>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}" {{ $locacao->cliente_id == $cliente->id ? 'selected' : '' }}>
                                    {{ $cliente->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Status</label>
                        <select name="status" class="form-select">
                            <option value="Ativo" {{ $locacao->status == 'Ativo' ? 'selected' : '' }}>Ativo</option>
                            <option value="Finalizado" {{ $locacao->status == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
                            <option value="Cancelado" {{ $locacao->status == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Data de Retirada</label>
                        <input type="date" name="data_retirada" class="form-control" value="{{ $locacao->data_retirada }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Devolução Prevista</label>
                        <input type="date" name="data_devolucao_prevista" class="form-control" value="{{ $locacao->data_devolucao_prevista }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Valor Total (R$)</label>
                    <input type="number" step="0.01" name="valor_total" class="form-control" value="{{ $locacao->valor_total }}" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('locacoes.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-warning px-4 text-dark fw-bold">Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection