@extends('layouts.app')

@section('conteudo')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">Nova Senha</div>
                <div class="card-body">
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="email" value="{{ $email }}">

                        <div class="mb-3">
                            <label class="form-label">Código de 6 dígitos</label>
                            <input type="text" name="code" class="form-control text-center fw-bold" maxlength="6" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nova Senha</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirmar Senha</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>

                        @if($errors->any())
                            <div class="alert alert-danger">{{ $errors->first() }}</div>
                        @endif

                        <button type="submit" class="btn btn-success w-100">Redefinir Senha</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection