@extends('layouts.simple')

@section('title', 'Relatórios | StockEdu')

@section('content')
    <div class="mb-4">
        <h1 class="h3 mb-1">Relatórios</h1>
        <p class="text-muted mb-0">Escreva e salve observações sobre o estoque da unidade.</p>
    </div>

    @if (session('status'))
        <div class="alert alert-success" role="status">{{ session('status') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul class="mb-0 pl-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-4">
            <h2 class="h5 mb-3">Escrever relatório</h2>
            <form method="POST" action="{{ route('SalvarRelatorio') }}">
                @csrf
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input id="titulo" name="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" value="{{ old('titulo') }}" maxlength="150" placeholder="Ex.: Conferência do estoque mensal" required>
                    @error('titulo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="conteudo">Relatório</label>
                    <textarea id="conteudo" name="conteudo" rows="6" class="form-control @error('conteudo') is-invalid @enderror" maxlength="20000" placeholder="Escreva aqui as observações, ocorrências ou informações do estoque..." required>{{ old('conteudo') }}</textarea>
                    @error('conteudo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Salvar relatório</button>
            </form>
        </div>
    </div>

    <section>
        <h2 class="h5 mb-3">Relatórios salvos</h2>
        @forelse ($relatorios as $relatorio)
            <article class="card border-0 shadow-sm mb-3">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h3 class="h6 mb-0">{{ $relatorio->titulo }}</h3>
                        <small class="text-muted ml-3">
                            {{ \Carbon\Carbon::parse($relatorio->created_at)->format('d/m/Y H:i') }}
                        </small>
                    </div>
                    <p class="mb-3" style="white-space: pre-line">{{ $relatorio->conteudo }}</p>
                    <small class="text-muted">
                        {{ $relatorio->autor_nome ?: 'Usuário' }}
                        @if ($relatorio->autor_email)
                            · {{ $relatorio->autor_email }}
                        @endif
                    </small>
                </div>
            </article>
        @empty
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 text-center text-muted">
                    Nenhum relatório foi escrito ainda.
                </div>
            </div>
        @endforelse
    </section>
@endsection
