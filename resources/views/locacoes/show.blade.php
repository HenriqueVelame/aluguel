@extends('layouts.app')

@section('conteudo')
<div class="card shadow-sm">
    <div class="card-header bg-info text-white d-flex justify-content-between">
        <h4 class="mb-0">Detalhes da Locação #{{ $locacao->id }}</h4>
        <a href="{{ route('locacoes.index') }}" class="btn btn-sm btn-light">Voltar</a>
    </div>
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-md-6">
                <p><strong>Cliente:</strong> {{ $locacao->cliente->nome }}</p>
                <p><strong>E-mail:</strong> {{ $locacao->cliente->email }}</p>
            </div>
            <div class="col-md-6 text-md-end">
                <p><strong>Data Prevista:</strong> {{ \Carbon\Carbon::parse($locacao->data_devolucao_prevista)->format('d/m/Y') }}</p>
                <p><strong>Status Financeiro:</strong> R$ {{ number_format($locacao->valor_total, 2, ',', '.') }}</p>
            </div>
        </div>

        <h5>Itens Alugados</h5>
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Personagem</th>
                    <th>Condição de Saída</th>
                    <th>Condição de Retorno</th>
                </tr>
            </thead>
            <tbody>
                @foreach($locacao->itens as $item)
                <tr>
                    <td>{{ $item->nome_personagem }}</td>
                    <td>{{ $item->pivot->condicao_saida }}</td>
                    <td>{{ $item->pivot->condicao_retorno ?? 'Ainda não devolvido' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection