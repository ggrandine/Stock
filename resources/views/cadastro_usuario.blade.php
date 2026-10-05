@extends('layouts.simple')

@section('title', 'Usuários | StockEdu')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1">Usuários</h1>
            <p class="text-muted mb-0">Pessoas que informaram seus dados ao entrar no StockEdu.</p>
        </div>
        <a href="{{ route('Dashboard') }}" class="btn btn-outline-secondary">Voltar ao Dashboard</a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th class="px-4 py-3">Nome</th>
                            <th class="py-3">E-mail</th>
                            <th class="py-3">Último acesso</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($usuarios as $usuario)
                            <tr>
                                <td class="px-4 py-3 font-weight-bold">{{ $usuario->nome }}</td>
                                <td class="py-3">{{ $usuario->email }}</td>
                                <td class="py-3 text-muted">
                                    {{ \Carbon\Carbon::parse($usuario->updated_at)->format('d/m/Y H:i') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="p-4 text-center text-muted">
                                    Ainda não há pessoas cadastradas. Informe nome e e-mail na página inicial.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
