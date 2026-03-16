@extends('layouts.app') 

@section('conteudo')
<div class="card shadow">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Cadastrar Novo Cosplay</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('cosplays.store') }}" method="POST">
            @csrf 
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nome do Personagem</label>
                    <input type="text" name="nome_personagem" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Categoria</label>
                    <select name="categoria_id" class="form-select" required>
                        <option value="">Selecione...</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nome_categoria }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Série/Origem</label>
                    <input type="text" name="serie_origem" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tamanho</label>
                    <input type="text" name="tamanho" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Valor do Aluguel</label>
                    <input type="number" step="0.01" name="valor_aluguel" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Valor do Caução</label>
                    <input type="number" step="0.01" name="valor_caucao" class="form-control" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Descrição das Peças</label>
                <textarea name="descricao_pecas" class="form-control" rows="3" required></textarea>
            </div>

            <button type="submit" class="btn btn-success">Salvar Registro</button>
        </form>
    </div>
</div>
@endsection