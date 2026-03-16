@extends('layouts.app')

@section('conteudo')
<div class="mb-4">
    <h2 class="fw-bold">Olá, {{ auth()->user()->name }}! 👋</h2>
    <p class="text-muted">Aqui está o que está acontecendo na sua loja hoje.</p>
</div>

<div class="row mb-5">
    <div class="col-md-3">
        <div class="card bg-primary text-white p-3 text-center">
            <h6 class="text-uppercase small fw-bold mb-3">Total Cosplays</h6>
            <h2 class="fw-bold mb-0">{{ \App\Models\ItemCosplay::count() }}</h2>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-success text-white p-3 text-center">
            <h6 class="text-uppercase small fw-bold mb-3">Locações Ativas</h6>
            <h2 class="fw-bold mb-0">{{ \App\Models\Location::where('status', 'Ativo')->count() }}</h2>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-warning text-dark p-3 text-center">
            <h6 class="text-uppercase small fw-bold mb-3">Cosplays Alugados</h6>
            <h2 class="fw-bold mb-0">{{ \App\Models\ItemCosplay::where('status', 'alugada')->count() }}</h2>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-dark text-white p-3 text-center">
            <h6 class="text-uppercase small fw-bold mb-3">Clientes Cadastrados</h6>
            <h2 class="fw-bold mb-0">{{ \App\Models\Client::count() }}</h2>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-7">
        <div class="card shadow border-0 h-100">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold">Ações Rápidas</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-3">
                    <a href="{{ route('locacoes.create') }}" class="btn btn-success btn-lg"><i class="bi bi-plus-circle me-2"></i> Registrar Novo Aluguel</a>
                    <a href="{{ route('cosplays.create') }}" class="btn btn-primary btn-lg"><i class="bi bi-person-arms-up me-2"></i> Adicionar Novo Traje</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card shadow border-0 h-100">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold">Suporte</h5>
            </div>
            <div class="card-body">
                <p class="text-muted small">Precisa de ajuda com o sistema de locação? Verifique os relatórios ou entre em contato com o suporte técnico.</p>
                <hr>
                <button class="btn btn-outline-dark btn-sm w-100">Ver Manual do Usuário</button>
            </div>
        </div>
    </div>
</div>
@endsection