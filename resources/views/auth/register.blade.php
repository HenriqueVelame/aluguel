@extends('layouts.app')

@section('conteudo')
<div class="row justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-5">
        <div class="card shadow-lg border-0">
            <div class="card-body p-5">
                <h3 class="fw-bold text-center mb-4">Criar nova conta</h3>
                
                <form action="{{ route('register.post') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase">Nome Completo</label>
                        <input type="text" name="name" class="form-control" placeholder="Ex: Admin" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase">E-mail Corporativo</label>
                        <input type="email" name="email" class="form-control" placeholder="contato@empresa.com" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold text-uppercase">Senha</label>
                            <input type="password" name="password" class="form-control" required>
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