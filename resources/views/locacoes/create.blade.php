@extends('layouts.app')

@section('conteudo')
<div class="card shadow-sm mx-auto" style="max-width: 800px;">
    <div class="card-header bg-dark text-white">
        <h4 class="mb-0">Registrar Novo Aluguel</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('locacoes.store') }}" method="POST">
            @csrf
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Cliente</label>
                    <select name="cliente_id" class="form-select" required>
                        <option value="">Selecione o cliente...</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Item Cosplay</label>
                    <select name="item_id" class="form-select" required>
                        <option value="">Selecione o item...</option>
                        @foreach($itens as $item)
                            <option value="{{ $item->id }}">{{ $item->nome_personagem }} (R$ {{ $item->valor_aluguel }})</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Data de Reserva</label>
                    <input type="date" name="data_reserva" class="form-control" value="{{ date('Y-m-d') }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Data de Retirada</label>
                    <input type="date" name="data_retirada" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Devolução Prevista</label>
                    <input type="date" name="data_devolucao_prevista" class="form-control" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Valor Total (R$)</label>
                <input type="number" step="0.01" name="valor_total" class="form-control" placeholder="0.00" required>
            </div>

            <div class="d-flex justify-content-between border-top pt-3">
                <a href="{{ route('locacoes.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-success px-5">Finalizar Locação</button>
            </div>
        </form>
    </div>
</div>
@endsection