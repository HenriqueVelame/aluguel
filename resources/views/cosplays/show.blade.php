@extends('layouts.app')

@section('conteudo')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">🔍 Detalhes do Cosplay</h4>
            <a href="{{ route('cosplays.index') }}" class="btn btn-sm btn-light">Voltar para a Lista</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="display-6">{{ 'Homem-Aranha' }} <small class="text-muted">({{ 'Marvel' }})</small></h2>
                    <hr>
                    <p><strong>📝 Descrição das Peças:</strong></p>
                    <div class="p-3 bg-light rounded border">
                        {{ 'Traje completo em lycra, máscara com lentes, botas embutidas e par de lançadores de teia.' }}
                    </div>
                </div>
                
                <div class="col-md-4 border-start">
                    <div class="mb-3">
                        <label class="text-muted d-block">Status atual:</label>
                        <span class="badge bg-success fs-6">Disponível</span>
                    </div>
                    <div class="mb-3">
                        <label class="text-muted d-block">Tamanho:</label>
                        <span class="fw-bold fs-5">M</span>
                    </div>
                    <div class="mb-3">
                        <label class="text-muted d-block">Valor do Aluguel (Diária):</label>
                        <span class="text-primary fw-bold fs-4">R$ 120,00</span>
                    </div>
                    <div class="mb-3">
                        <label class="text-muted d-block">Valor do Caução (Garantia):</label>
                        <span class="text-danger fw-bold fs-5">R$ 200,00</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-light text-end">
            <a href="{{ route('cosplays.edit') }}" class="btn btn-warning">Editar Informações</a>
            <button class="btn btn-danger" onclick="return confirm('Tem certeza?')">Excluir Cosplay</button>
        </div>
    </div>
</div>
@endsection