@extends('layouts.app')

@section('conteudo')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Catálogo de Cosplays</h1>
    <button class="btn btn-primary">+ Novo Cosplay</button>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Homem-Aranha (Far From Home)</h5>
                <p class="card-text">Tamanho: M | Preço: R$ 80,00/dia</p>
                <span class="badge bg-success">Disponível</span>
                <hr>
                <button class="btn btn-outline-dark btn-sm w-100">Ver Detalhes</button>
            </div>
        </div>
    </div>
</div>
@endsection