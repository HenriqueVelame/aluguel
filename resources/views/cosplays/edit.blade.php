@extends('layouts.app') @section('conteudo')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
            <h4 class="mb-0">✏️ Editar Cosplay: Homem-Aranha (Exemplo)</h4>
            <a href="{{ route('cosplays.index') }}" class="btn btn-sm btn-outline-dark">Voltar</a>
        </div>
        <div class="card-body">
            
            <form action="#" method="POST">
                @csrf
                @method('PUT') 

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nome do Personagem</label>
                        <input type="text" name="nome_personagem" class="form-control" value="Homem-Aranha" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Série/Origem</label>
                        <input type="text" name="serie_origem" class="form-control" value="Marvel">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Tamanho</label>
                        <input type="text" name="tamanho" class="form-control" value="M" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Valor do Aluguel (Diária)</label>
                        <input type="number" step="0.01" name="valor_aluguel" class="form-control" value="120.00" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Valor do Caução (Garantia)</label>
                        <input type="number" step="0.01" name="valor_caucao" class="form-control" value="200.00" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Descrição das Peças</label>
                    <textarea name="descricao_pecas" class="form-control" rows="3">Traje completo, máscara, lançadores de teia e botas.</textarea>
                </div>

                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-warning px-5">Atualizar Registro</button>
                    <a href="{{ route('cosplays.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection