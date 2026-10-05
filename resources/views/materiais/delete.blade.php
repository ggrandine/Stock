@extends('layouts.simple')

@section('title', 'Confirmar exclusão')

@section('content')
    <div class="row justify-content-center mt-4">
        <div class="col-md-8 col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex align-items-start mb-3">
                        <span class="badge badge-danger p-2 mr-3">!</span>
                        <div>
                            <h1 class="h4 mb-2">Confirmar exclusão</h1>
                            <p class="text-muted mb-0">Esta ação removerá o material do estoque.</p>
                        </div>
                    </div>

                    @if (session('error'))
                        <div class="alert alert-warning" role="alert">{{ session('error') }}</div>
                    @endif

                    <div class="alert alert-light border" role="status">
                        <strong>{{ $material->nome }}</strong><br>
                        <span class="text-muted">
                            Código {{ $material->id_material }}
                            @if ($material->categoria)
                                · {{ $material->categoria }}
                            @endif
                            · Quantidade: {{ $material->quantidade }} {{ $material->unidade }}
                        </span>
                    </div>

                    <p class="small text-muted">Confirme apenas se deseja excluir este item. Materiais com movimentações ou alterações registradas no histórico são mantidos para preservar a rastreabilidade.</p>

                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('Materiais') }}" class="btn btn-outline-secondary mr-2">Cancelar</a>
                        <form method="POST" action="{{ route('ExcluirMaterial', $material->id_material) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Sim, excluir material</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
