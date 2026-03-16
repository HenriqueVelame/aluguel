@extends('layouts.app')

@section('conteudo')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold"><i class="bi bi-person-arms-up me-2"></i>Catálogo de Cosplays</h2>
    <a href="{{ route('cosplays.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i> Novo Cosplay</a>
</div>

<div class="row">
    @forelse($cosplays as $cosplay)
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <h5 class="card-title fw-bold text-dark">{{ $cosplay->nome_personagem }}</h5>
                    @if($cosplay->status == 'disponivel')
                        <span class="badge bg-success-subtle text-success px-3">Disponível</span>
                    @else
                        <span class="badge bg-warning-subtle text-warning px-3 text-dark">Alugada</span>
                    @endif
                </div>
                <p class="text-muted small mb-3"><i class="bi bi-collection me-1"></i> {{ $cosplay->categoria->nome_categoria ?? 'Sem Categoria' }}</p>
                
                <div class="bg-light p-3 rounded mb-3">
                    <div class="d-flex justify-content-between small">
                        <span>Tamanho:</span> <span class="fw-bold">{{ $cosplay->tamanho }}</span>
                    </div>
                    <div class="d-flex justify-content-between small mt-1">
                        <span>Diária:</span> <span class="text-primary fw-bold">R$ {{ number_format($cosplay->valor_aluguel, 2, ',', '.') }}</span>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <a href="{{ route('cosplays.show', $cosplay->id) }}" class="btn btn-outline-dark btn-sm">Ver Detalhes</a>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12 text-center py-5">
        <i class="bi bi-search display-1 text-muted"></i>
        <p class="mt-3">Nenhum cosplay encontrado.</p>
    </div>
    @endforelse
</div>
@endsection