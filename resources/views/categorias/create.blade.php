@extends('layouts.app')

@section('conteudo')
<div class="card shadow-sm mx-auto" style="max-width: 500px;">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Nova Categoria</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('categorias.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nome da Categoria</label>
                <input type="text" name="nome_categoria" class="form-control" placeholder="Ex: Anime, Games, Medieval..." required>
                @error('nome_categoria')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            
            <div class="d-flex justify-content-between">
                <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Voltar</a>
                <button type="submit" class="btn btn-success">Salvar Categoria</button>
            </div>
        </form>
    </div>
</div>
@endsection