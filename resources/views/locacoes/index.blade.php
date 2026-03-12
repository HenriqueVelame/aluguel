@extends('layouts.app')

@section('conteudo')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>📦 Meus Aluguéis (Locações)</h2>
    <a href="{{ route('locacoes.create') }}" class="btn btn-success">Nova Locação</a>
</div>

<div class="card shadow-sm">
    <div class="card-body text-center">
        @if($locacoes->isEmpty())
            <p class="text-muted">Nenhum aluguel registrado no momento.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Cosplay</th>
                        <th>Data Saída</th>
                        <th>Devolução</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($locacoes as $locacao)
                    <tr>
                        <td>{{ $locacao->client->nome }}</td>
                        <td>{{ $locacao->itemCosplay->nome }}</td>
                        <td>{{ $locacao->data_locacao }}</td>
                        <td>{{ $locacao->data_devolucao }}</td>
                        <td>
                            <span class="badge bg-{{ $locacao->status == 'Ativo' ? 'success' : 'secondary' }}">
                                {{ $locacao->status }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection