@extends('layouts.simple')

@section('title', 'Materiais')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h1>Materiais</h1>
            <p class="text-muted mb-0">Itens cadastrados no estoque da unidade.</p>
        </div>
        <a class="btn btn-primary" href="{{ route('CadastroMaterial') }}">+ Novo material</a>
    </div>

    @if (session('status'))
        <div class="alert alert-success mt-3" role="status">{{ session('status') }}</div>
    @endif

    <div class="card card-body mt-3">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Quantidade</th>
                        <th>Unidade</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($materiais as $material)
                        <tr>
                            <td>{{ $material->id_material }}</td>
                            <td>{{ $material->nome }}</td>
                            <td>{{ $material->categoria ?: '—' }}</td>
                            <td>{{ $material->quantidade }}</td>
                            <td>{{ $material->unidade ?: '—' }}</td>
                            <td>
                                @if ($material->quantidade > 0)
                                    <span class="badge badge-success">Disponível</span>
                                @else
                                    <span class="badge badge-danger">Sem estoque</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('AlterarMaterial', $material->id_material) }}">Alterar</a>
                                <span class="text-muted">·</span>
                                <a href="{{ route('DeletarMaterial', $material->id_material) }}">Excluir</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-4 text-center text-muted">Nenhum material cadastrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
