@extends('layouts.app')

@section('conteudo')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-success">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">Registrar Novo Aluguel</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('locacoes.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Selecione o Cliente</label>
                        <select name="client_id" class="form-select" required>
                            <option value="">Selecione um cliente...</option>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->nome }} ({{ $cliente->cpf }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Selecione o Cosplay</label>
                        <select name="item_cosplay_id" class="form-select" required>
                            <option value="">Selecione o traje...</option>
                            @foreach($cosplays as $cosplay)
                                <option value="{{ $cosplay->id }}">{{ $cosplay->nome }} - Tam: {{ $cosplay->tamanho }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Data de Retirada</label>
                            <input type="date" name="data_locacao" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Previsão de Devolução</label>
                            <input type="date" name="data_devolucao" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Valor Total (R$)</label>
                        <input type="number" step="0.01" name="valor_total" class="form-control" placeholder="0.00" required>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('locacoes.index') }}" class="btn btn-secondary">Voltar</a>
                        <button type="submit" class="btn btn-success px-4 fw-bold">Finalizar Locação</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection