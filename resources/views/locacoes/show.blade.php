@extends('layouts.app')

@section('conteudo')
<div class="container mt-4">
    <div class="mb-3">
        <a href="{{ route('locacoes.index') }}" class="text-decoration-none text-muted">
            <i class="bi bi-arrow-left"></i> Voltar para a lista
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow border-0">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h4 class="mb-0 text-primary">Detalhes da Locação #{{ $locacao->id }}</h4>
            <span class="badge {{ $locacao->status == 'Ativo' ? 'bg-success' : 'bg-secondary' }}">
                {{ $locacao->status }}
            </span>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h5 class="border-bottom pb-2"><i class="bi bi-person"></i> Cliente</h5>
                    <p class="mb-1"><strong>Nome:</strong> {{ $locacao->cliente->nome }}</p>
                    <p class="mb-1"><strong>CPF:</strong> {{ $locacao->cliente->cpf }}</p>
                    <p class="mb-1"><strong>Telefone:</strong> {{ $locacao->cliente->telefone }}</p>
                </div>

                <div class="col-md-6 mb-4">
                    <h5 class="border-bottom pb-2"><i class="bi bi-calendar-event"></i> Período</h5>
                    <p class="mb-1"><strong>Data de Retirada:</strong> {{ \Carbon\Carbon::parse($locacao->data_retirada)->format('d/m/Y') }}</p>
                    <p class="mb-1"><strong>Devolução Prevista:</strong> {{ \Carbon\Carbon::parse($locacao->data_devolucao_prevista)->format('d/m/Y') }}</p>
                    <p class="mb-1 text-success"><strong>Valor Total:</strong> R$ {{ number_format($locacao->valor_total, 2, ',', '.') }}</p>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-12">
                    <h5 class="border-bottom pb-2"><i class="bi bi-person-mask"></i> Itens do Aluguel</h5>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Personagem</th>
                                <th>Tamanho</th>
                                <th>Valor Unitário</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($locacao->itens as $item)
                            <tr>
                                <td>{{ $item->nome_personagem }}</td>
                                <td>{{ $item->tamanho }}</td>
                                <td>R$ {{ number_format($item->valor_aluguel, 2, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="card-footer bg-light d-flex justify-content-end gap-2">
            <a href="{{ route('locacoes.edit', $locacao->id) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Editar
            </a>

            @if($locacao->status == 'Ativo')
                <form action="{{ route('locacoes.devolver', $locacao->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Confirmar a devolução deste traje e liberar o estoque?')">
                        <i class="bi bi-check2-circle"></i> Confirmar Devolução
                    </button>
                </form>
            @else
                <button class="btn btn-secondary btn-sm" disabled>
                    <i class="bi bi-check-all"></i> Já Devolvido
                </button>
            @endif
        </div>
    </div>
</div>
@endsection