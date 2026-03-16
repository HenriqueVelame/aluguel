@extends('layouts.app')

@section('conteudo')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold"><i class="bi bi-pencil-square me-2"></i> Editar: {{ $cosplay->nome_personagem }}</h2>
    <a href="{{ route('cosplays.index') }}" class="btn btn-outline-secondary">Cancelar</a>
</div>

<div class="card shadow border-0">
    <div class="card-body p-4">
        <form action="{{ route('cosplays.update', $cosplay->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Personagem</label>
                    <input type="text" name="nome_personagem" class="form-control" value="{{ $cosplay->nome_personagem }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Categoria</label>
                    <select name="categoria_id" class="form-select" required>
                        @foreach($categorias as $cat)
                            <option value="{{ $cat->id }}" {{ $cosplay->categoria_id == $cat->id ? 'selected' : '' }}>
                                {{ $cat->nome_categoria }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Tamanho</label>
                    <input type="text" name="tamanho" class="form-control" value="{{ $cosplay->tamanho }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Valor Diária</label>
                    <input type="number" step="0.01" name="valor_aluguel" class="form-control" value="{{ $cosplay->valor_aluguel }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="disponivel" {{ $cosplay->status == 'disponivel' ? 'selected' : '' }}>Disponível</option>
                        <option value="alugada" {{ $cosplay->status == 'alugada' ? 'selected' : '' }}>Alugada</option>
                        <option value="manutencao" {{ $cosplay->status == 'manutencao' ? 'selected' : '' }}>Manutenção</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg w-100">Atualizar Cosplay</button>
        </form>
    </div>
</div>
@endsection