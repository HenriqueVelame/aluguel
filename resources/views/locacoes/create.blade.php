@extends('layouts.app')

@section('conteudo')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-success"><i class="bi bi-cart-plus me-2"></i> Nova Locação</h2>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card border-0 shadow">
            <div class="card-body p-4">
                <form action="{{ route('locacoes.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label fw-bold">1. Selecione o Cliente</label>
                        <select name="client_id" class="form-select select2" required>
                            <option value="">Buscar cliente...</option>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->nome }} ({{ $cliente->cpf }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">2. Selecione o Cosplay Disponível</label>
                        <select name="item_cosplay_id" class="form-select" required>
                            <option value="">Buscar traje...</option>
                            @foreach($cosplays as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->nome_personagem }} - {{ $item->tamanho }} 
                                        (R$ {{ number_format($item->valor_aluguel, 2, ',', '.') }})
                                    </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Data de Saída</label>
                            <input type="date" name="data_locacao" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Data de Devolução</label>
                            <input type="date" name="data_devolucao" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Valor Total Combinado</label>
                        <div class="input-group">
                            <span class="input-group-text">R$</span>
                            <input type="number" step="0.01" name="valor_total" class="form-control form-control-lg text-primary fw-bold" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success btn-lg w-100 fw-bold">CONFIRMAR LOCAÇÃO</button>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card bg-light border-0">
            <div class="card-body">
                <h5 class="fw-bold mb-3">Lembretes</h5>
                <ul class="small text-muted">
                    <li>Verifique se o traje não possui rasgos antes da entrega.</li>
                    <li>O caução deve ser cobrado no ato da entrega física.</li>
                    <li>Confirme o telefone de contato do cliente.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection