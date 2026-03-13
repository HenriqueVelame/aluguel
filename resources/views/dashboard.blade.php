@extends('layouts.app')

@section('conteudo')
<div class="container text-center py-5">
    <div class="card shadow p-5">
        <h1 class="display-4">🎭 Painel de Controle</h1>
        <p class="lead">Bem-vindo ao sistema, <strong>{{ auth()->user()->name }}</strong>!</p>
        <hr>
        <div class="row mt-4">
            <div class="col-md-4">
                <a href="{{ route('cosplays.index') }}" class="btn btn-dark btn-lg w-100 mb-2">Ver Catálogo</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('clientes.index') }}" class="btn btn-outline-dark btn-lg w-100 mb-2">Clientes</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('locacoes.index') }}" class="btn btn-outline-dark btn-lg w-100 mb-2">Locações</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('categorias.index') }}" class="btn btn-outline-dark btn-lg w-100 mb-2">Categorias</a>
            </div>
        </div>
    </div>
</div>
@endsection