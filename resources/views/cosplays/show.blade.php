@extends('layouts.app')

@section('conteudo')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold"><i class="bi bi-search me-2"></i> Detalhes do Cosplay</h2>
    <a href="{{ route('cosplays.index') }}" class="btn btn-outline-secondary">Voltar ao Catálogo</a>
</div>

<div class="card shadow border-0">
    <div class="card-body p-0">
        <div class="row g-0">
            <div class="col-md-4 bg-dark text-white p-5 text-center d-flex flex-column justify-content-center border-radius-left">
                <i class="bi bi-person-arms-up display-1 mb-3"></i>
                <h3 class="fw-bold">{{ $cosplay->nome_personagem }}</h3>
                <span class="badge bg-primary px-3 py-2">{{ $cosplay->categoria->nome_categoria ?? 'Geral' }}</span>
            </div>
            <div class="col-md-8 p-5">
                <div class="row mb-4">
                    <div class="col-6">
                        <small class="text-muted d-block text-uppercase fw-bold">Série/Origem</small>
                        <p class="fs-5">{{ $cosplay->serie_origem ?? 'Não informada' }}</p>
                    </div>
                    <div class="col-6">
                        <small class="text-muted d-block text-uppercase fw-bold">Tamanho</small>
                        <p class="fs-5 fw-bold text-primary">{{ $cosplay->tamanho }}</p>
                    </div>
                </div>

                <div class="mb-4">
                    <small class="text-muted d-block text-uppercase fw-bold">Descrição das Peças</small>
                    <div class="p-3 bg-light rounded mt-2">
                        {{ $cosplay->descricao_pecas }}
                    </div>
                </div>

                <div class="row border-top pt-4 mt-4">
                    <div class="col-md-4">
                        <small class="text-muted d-block">Diária</small>
                        <h4 class="text-success fw-bold">R$ {{ number_format($cosplay->valor_aluguel, 2, ',', '.') }}</h4>
                    </div>
                    <div class="col-md-4">
                        <small class="text-muted d-block">Caução</small>
                        <h4 class="text-danger fw-bold">R$ {{ number_format($cosplay->valor_caucao, 2, ',', '.') }}</h4>
                    </div>
                    <div class="col-md-4 d-flex align-items-center justify-content-end">
                        <a href="{{ route('cosplays.edit', $cosplay->id) }}" class="btn btn-warning me-2"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('cosplays.destroy', $cosplay->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Excluir este traje?')"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection