@extends('layouts.app')

@section('conteudo')
<div class="row justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-4">
        <div class="card shadow-lg border-0">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <h1 class="fw-bold">🎭</h1>
                    <h3 class="fw-bold text-dark">Bem-vindo de volta</h3>
                    <p class="text-muted">Acesse sua conta CosplaySys</p>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger small">
                        @foreach ($errors->all() as $error)
                            <i class="bi bi-exclamation-triangle me-2"></i> {{ $error }}
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase">E-mail</label>
                        <input type="email" name="email" class="form-control form-control-lg" placeholder="seu@email.com" value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-uppercase">Senha</label>
                        <input type="password" name="password" class="form-control form-control-lg" placeholder="••••••••" required>
                    </div>
                    <button type="submit" class="btn btn-dark btn-lg w-100 fw-bold mb-3">Entrar</button>
                    
                    <div class="text-center">
                        <span class="text-muted small">Não tem conta?</span> 
                        <a href="{{ route('register') }}" class="text-primary small fw-bold text-decoration-none">Criar agora</a>
                        <br>
                        <a href="{{ route('password.request') }}" class="text-primary small fw-bold text-decoration-none">Esqueci minha senha</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection