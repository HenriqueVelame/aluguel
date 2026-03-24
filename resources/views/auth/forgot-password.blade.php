@extends('layouts.app')

@section('conteudo')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">Recuperar Senha</div>
                <div class="card-body">
                    <form action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">E-mail Cadastrado</label>
                            <input type="email" name="email" class="form-control" placeholder="exemplo@gmail.com" required>
                        </div>
                        
                        @if(session('status'))
                            <div class="alert alert-success">{{ session('status') }}</div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">{{ $errors->first() }}</div>
                        @endif

                        <button type="submit" class="btn btn-primary w-100">Enviar Código</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection