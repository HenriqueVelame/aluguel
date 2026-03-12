@extends('layouts.app')

@section('conteudo')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>📦 Histórico de Locações</h1>
    <a href="{{ route('locacoes.create') }}" class="btn btn-primary">Nova Locação</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Retirada</th>
                    <th>Devolução Prevista</th>
                    <th>Total</th>
                    <th>Multa</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($locacoes as $locacao)
                <tr>
                    <td>{{ $locacao->id }}</td>
                    <td>{{ $locacao->cliente->nome }}</td>
                    <td>{{ $locacao->data_retirada ? \Carbon\Carbon::parse($locacao->data_retirada)->format('d/m/Y') : 'Pendente' }}</td>
                    <td>{{ \Carbon\Carbon::parse($locacao->data_devolucao_prevista)->format('d/m/Y') }}</td>
                    <td>R$ {{ number_format($locacao->valor_total, 2, ',', '.') }}</td>
                    <td class="text-danger">R$ {{ number_format($locacao->multa_atraso, 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('locacoes.show', $locacao->id) }}" class="btn btn-sm btn-info text-white">Ver Itens</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Nenhuma locação encontrada.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection