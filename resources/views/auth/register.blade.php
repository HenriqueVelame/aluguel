@extends('layouts.app')

@section('conteudo')
<div class="row justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-5">
        <div class="card shadow-lg border-0">
            <div class="card-body p-5">
                <h3 class="fw-bold text-center mb-4">Criar nova conta</h3>
                
                <form action="{{ route('register.post') }}" method="POST">
                    @csrf
                    
                    {{-- NOME: Adicionado value="{{ old('name') }}" --}}
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase">Nome Completo</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Ex: Admin" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- E-MAIL: Adicionado value="{{ old('email') }}" --}}
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase">E-mail Corporativo</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="contato@empresa.com" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold text-uppercase">Senha</label>
                            {{-- SENHA: Adicionado classe de erro e mensagem --}}
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')
                                <div class="invalid-feedback" style="font-size: 0.75rem;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label small fw-bold text-uppercase">Confirmar</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold mb-3">Registrar Sistema</button>

                    <div class="text-center">
                        <span class="text-muted small">Já tem uma conta?</span> 
                        <a href="{{ route('login') }}" class="text-primary small fw-bold text-decoration-none">Faça Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection