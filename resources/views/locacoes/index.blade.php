@extends('layouts.app')

@section('conteudo')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary"><i class="bi bi-calendar-check"></i> Gestão de Locações</h2>
        <a href="{{ route('locacoes.create') }}" class="btn btn-success shadow-sm">
            <i class="bi bi-plus-lg"></i> Nova Locação
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">ID</th>
                            <th>Cliente</th>
                            <th>Cosplay / Personagem</th>
                            <th>Retirada</th>
                            <th>Devolução</th>
                            <th>Valor Total</th>
                            <th>Status</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($locacoes as $locacao)
                            <tr>
                                <td class="ps-4 fw-bold text-muted">#{{ $locacao->id }}</td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <span class="fw-bold">{{ $locacao->cliente->nome ?? 'N/A' }}</span>
                                        <small class="text-muted">{{ $locacao->cliente->telefone ?? '' }}</small>
                                    </div>
                                </td>
                                <td>
                                    @foreach($locacao->itens as $item)
                                        <span class="badge rounded-pill bg-info text-dark px-3">
                                            <i class="bi bi-person-mask"></i> {{ $item->nome_personagem }}
                                        </span>
                                    @endforeach
                                </td>
                                <td>{{ \Carbon\Carbon::parse($locacao->data_retirada)->format('d/m/Y') }}</td>
                                <td>
                                    <span class="text-{{ \Carbon\Carbon::parse($locacao->data_devolucao_prevista)->isPast() && $locacao->status == 'Ativo' ? 'danger fw-bold' : 'dark' }}">
                                        {{ \Carbon\Carbon::parse($locacao->data_devolucao_prevista)->format('d/m/Y') }}
                                    </span>
                                </td>
                                <td class="fw-bold text-success">
                                    R$ {{ number_format($locacao->valor_total, 2, ',', '.') }}
                                </td>
                                <td>
                                    @if($locacao->status == 'Ativo')
                                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3">
                                            <i class="bi bi-clock-history"></i> Em Aberto
                                        </span>
                                    @elseif($locacao->status == 'Finalizado')
                                        <span class="badge bg-success-subtle text-success border border-success-subtle px-3">
                                            <i class="bi bi-check-all"></i> Finalizado
                                        </span>
                                    @else
                                        <span class="badge bg-light text-muted border px-3">
                                            {{ $locacao->status }}
                                        </span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('locacoes.show', $locacao->id) }}" class="btn btn-sm btn-outline-secondary" title="Ver Detalhes">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        
                                        <a href="{{ route('locacoes.edit', $locacao->id) }}" class="btn btn-sm btn-outline-warning" title="Editar">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <form action="{{ route('locacoes.destroy', $locacao->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Excluir" 
                                                onclick="return confirm('Tem certeza que deseja excluir esta locação? O traje voltará a ficar disponível no estoque.')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-5 text-muted">
                                    <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                    Nenhuma locação encontrada.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection