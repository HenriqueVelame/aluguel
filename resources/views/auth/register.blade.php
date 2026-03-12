@extends('layouts.app')

@section('conteudo')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow border-0">
            <div class="card-header bg-dark text-white text-center py-3">
                <h4>Crie sua conta no Cosplay Rent</h4>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('register.post') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nome Completo</label>
                        <input type="text" name="name" class="form-control" placeholder="Seu nome" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">E-mail</label>
                        <input type="email" name="email" class="form-control" placeholder="email@exemplo.com" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Senha</label>
                        <input type="password" name="password" class="form-control" placeholder="Mínimo 6 caracteres" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">Confirme a Senha</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Repita a senha" required>
                    </div>
                    <button type="submit" class="btn btn-dark w-100">Criar Conta</button>
                    <div class="text-center mt-3">
                        <a href="{{ route('login') }}" class="text-decoration-none">Já tem conta? Faça login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection