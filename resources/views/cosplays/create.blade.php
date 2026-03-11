@extends('layouts.app') @section('conteudo')
<div class="card shadow">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Cadastrar Novo Cosplay</h4>
    </div>
    <div class="card-body">
        <form action="#" method="POST">
            @csrf <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nome do Personagem</label>
                    <input type="text" name="nome_personagem" class="form-control" placeholder="Ex: Naruto, Iron Man..." required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Série/Origem</label>
                    <input type="text" name="serie_origem" class="form-control" placeholder="Ex: Marvel, Anime, Jogo...">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Tamanho</label>
                    <input type="text" name="tamanho" class="form-control" maxlength="5" placeholder="P, M, G ou GG" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Valor do Aluguel (Diária)</label>
                    <input type="number" step="0.01" name="valor_aluguel" class="form-control" placeholder="0.00" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Valor do Caução (Garantia)</label>
                    <input type="number" step="0.01" name="valor_caucao" class="form-control" placeholder="0.00" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Descrição das Peças</label>
                <textarea name="descricao_pecas" class="form-control" rows="3" placeholder="Ex: Peruca, colete, calça e acessórios..."></textarea>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-success px-5">Salvar Registro</button>
                <a href="{{ route('cosplays.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection