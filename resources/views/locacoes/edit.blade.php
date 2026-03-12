@extends('layouts.app')

@section('conteudo')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm border-info">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0">Atualizar Status da Locação</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('locacoes.update', $locacao->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <p><strong>Cliente:</strong> {{ $locacao->client->nome }}</p>
                        <p><strong>Cosplay:</strong> {{ $locacao->itemCosplay->nome }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Status do Aluguel</label>
                        <select name="status" class="form-select">
                            <option value="Pendente" {{ $locacao->status == 'Pendente' ? 'selected' : '' }}>Pendente</option>
                            <option value="Ativo" {{ $locacao->status == 'Ativo' ? 'selected' : '' }}>Ativo (Em posse do cliente)</option>
                            <option value="Devolvido" {{ $locacao->status == 'Devolvido' ? 'selected' : '' }}>Devolvido</option>
                            <option value="Atrasado" {{ $locacao->status == 'Atrasado' ? 'selected' : '' }}>Atrasado</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('locacoes.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary px-4">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection