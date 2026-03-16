@extends('layouts.app')

@section('conteudo')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold"><i class="bi bi-tags me-2"></i> Categorias</h2>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card shadow border-0">
            <div class="card-header bg-dark text-white fw-bold">Nova Categoria</div>
            <div class="card-body">
                <form action="{{ route('categorias.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nome da Categoria</label>
                        <input type="text" name="nome_categoria" class="form-control" placeholder="Ex: Marvel, Anime..." required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Adicionar</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card shadow border-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">Nome</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorias as $cat)
                    <tr>
                        <td class="ps-4 fw-bold">{{ $cat->nome_categoria }}</td>
                        <td class="text-center">
                            <form action="{{ route('categorias.destroy', $cat->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-link text-danger" onclick="return confirm('Excluir?')"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection