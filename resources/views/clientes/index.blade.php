@extends('layouts.app')

@section('conteudo')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold"><i class="bi bi-people me-2"></i> Gestão de Clientes</h2>
    <a href="{{ route('clientes.create') }}" class="btn btn-primary"><i class="bi bi-person-plus me-1"></i> Novo Cliente</a>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="p-3 border-bottom">
            <form method="GET" action="{{ route('clientes.index') }}" class="row g-2">
                <div class="col-md-4">
                    <input type="text" name="busca" class="form-control" placeholder="Buscar por nome ou CPF..." value="{{ $busca ?? '' }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-outline-primary w-100">Buscar</button>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">Nome</th>
                        <th>CPF</th>
                        <th>Contato</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                    <tr>
                        <td class="ps-4 fw-bold text-dark">{{ $cliente->nome }}</td>
                        <td>{{ $cliente->cpf }}</td>
                        <td>
                            <div class="small"><i class="bi bi-envelope me-1"></i> {{ $cliente->email }}</div>
                            <div class="small"><i class="bi bi-whatsapp me-1"></i> {{ $cliente->telefone }}</div>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-sm btn-outline-warning"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Excluir cliente?')"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="mt-3">
    {{ $clientes->links() }}
</div>
@endsection