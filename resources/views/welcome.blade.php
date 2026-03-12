@extends('layouts.app')

@section('conteudo')
<div class="row justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-md-8 text-center">
        <h1 class="display-4 mb-4">Bem-vindo ao 🎭 Cosplay Rent</h1>
        <p class="lead mb-5">A maior plataforma de aluguel de cosplays e acessórios da região.</p>
        
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body p-5">
                        <i class="bi bi-person-check" style="font-size: 3rem;"></i>
                        <h3 class="card-title mt-3">Já sou membro</h3>
                        <p class="text-muted">Acesse sua conta para gerenciar seus aluguéis.</p>
                        <a href="{{ route('login') }}" class="btn btn-dark btn-lg w-100 mt-3">Fazer Login</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body p-5">
                        <i class="bi bi-person-plus" style="font-size: 3rem;"></i>
                        <h3 class="card-title mt-3">Novo por aqui?</h3>
                        <p class="text-muted">Crie sua conta agora e comece a alugar hoje mesmo.</p>
                        <a href="{{ route('register') }}" class="btn btn-outline-dark btn-lg w-100 mt-3">Cadastrar-se</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection