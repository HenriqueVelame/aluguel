@extends('layouts.app')

@section('conteudo')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Catálogo de Cosplays</h1>
    <a href="{{ route('cosplays.create') }}" class="btn btn-primary">+ Novo Cosplay</a>
</div>

<div class="row">
    @forelse($cosplays as $cosplay)
    <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">{{ $cosplay->nome_personagem }}</h5>
                <p class="card-text">
                    Tamanho: {{ $cosplay->tamanho }} | 
                    Preço: R$ {{ number_format($cosplay->valor_aluguel, 2, ',', '.') }}/dia
                </p>
                
                @if($cosplay->status == 'disponivel')
                    <span class="badge bg-success">Disponível</span>
                @elseif($cosplay->status == 'alugada')
                    <span class="badge bg-warning text-dark">Alugada</span>
                @else
                    <span class="badge bg-danger">Manutenção</span>
                @endif
                
                <hr>
                <a href="{{ route('cosplays.show', $cosplay->id) }}" class="btn btn-outline-dark btn-sm w-100">Ver Detalhes</a>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12 text-center">
        <p class="alert alert-info">Nenhum cosplay encontrado no banco de dados.</p>
    </div>
    @endforelse
</div>
@endsection