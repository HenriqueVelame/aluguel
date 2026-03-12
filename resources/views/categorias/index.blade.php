@extends('layouts.app')

@section('conteudo')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>🏷️ Categorias de Cosplay</h1>
    <a href="{{ route('categorias.create') }}" class="btn btn-primary">Nova Categoria</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome da Categoria</th>
                    <th width="150">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->nome_categoria }}</td>
                    <td>
                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Excluir esta categoria?')">Excluir</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center">Nenhuma categoria cadastrada.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection