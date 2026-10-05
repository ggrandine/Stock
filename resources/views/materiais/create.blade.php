<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastrar material | StockEdu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/material-form.css') }}">
</head>
<body class="dashboard-page">
<div class="app-shell">
    <aside class="sidebar">
        <a class="brand" href="{{ route('Dashboard') }}">
            <img class="brand-logo" src="{{ asset('images/stockedu-logo.svg') }}" alt="StockEdu — Sistema de Estoque SESI">
        </a>

        <div class="nav-caption">MENU PRINCIPAL</div>
        <nav class="side-nav" aria-label="Navegação principal">
            <a class="side-link" href="{{ route('Dashboard') }}"><span class="nav-icon">▦</span>Dashboard</a>
            <a class="side-link active" href="{{ route('Materiais') }}"><span class="nav-icon">▤</span>Materiais</a>
            <a class="side-link" href="{{ route('Movimentacoes') }}"><span class="nav-icon">↔</span>Movimentações</a>
            <a class="side-link" href="{{ route('CadastroUsuario') }}"><span class="nav-icon">♙</span>Usuários</a>
            <a class="side-link" href="{{ route('Graficos') }}"><span class="nav-icon">▥</span>Relatórios</a>
            <a class="side-link" href="{{ route('Configuracoes') }}"><span class="nav-icon">⚙</span>Configurações</a>
        </nav>

        <div class="sidebar-bottom">
            <a href="{{ route('Configuracoes') }}" class="help-card">
                <span class="help-icon">?</span>
                <span><strong>Precisa de ajuda?</strong><small>Consulte o guia rápido do StockEdu.</small></span>
                <span class="help-arrow">›</span>
            </a>
            <div class="profile">
                <span class="avatar avatar-soft">AM</span>
                <span class="profile-copy"><strong>Ana Martins</strong><small>Almoxarifado</small></span>
                <span class="profile-menu">···</span>
            </div>
        </div>
    </aside>

    <main class="main-area">
        <header class="topbar">
            <div class="page-heading">
                <strong>Cadastro de materiais</strong>
                <span>Materiais <i>·</i> Cadastrar novo item</span>
            </div>
            <div class="topbar-tools">
                <label class="search-box">
                    <span aria-hidden="true">⌕</span>
                    <input type="search" placeholder="Pesquisar no StockEdu..." aria-label="Pesquisar no StockEdu">
                </label>
                <button class="icon-button notification-button" type="button" aria-label="Notificações"><span>♧</span><i></i></button>
                <button class="user-menu" type="button" aria-label="Menu de Ana Martins"><span class="avatar avatar-blue">AM</span><span class="chevron">⌄</span></button>
            </div>
        </header>

        <div class="content-area">
            <section class="welcome-row material-welcome">
                <div>
                    <h1>Cadastrar novo material</h1>
                    <p>Adicione um novo item ao estoque da unidade.</p>
                </div>
                <a href="{{ route('Materiais') }}" class="back-link">← Voltar para materiais</a>
            </section>

            <div class="container-fluid px-0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card material-card">
                            <div class="card-body p-4">
                                <div class="form-card-heading mb-4">
                                    <span class="form-card-icon">＋</span>
                                    <div>
                                        <h2 class="h5 mb-1">Informações do material</h2>
                                        <p class="text-muted mb-0">Preencha os dados para incluir o item no estoque.</p>
                                    </div>
                                </div>

                                @if (session('status'))
                                    <div class="alert alert-success" role="status">{{ session('status') }}</div>
                                @endif

                                @if ($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        Verifique os campos destacados e tente novamente.
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('CadastrarMaterial') }}">
                                    @csrf

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nome">Nome do material <span class="required-mark">*</span></label>
                                            <input id="nome" name="nome" type="text" class="form-control @error('nome') is-invalid @enderror" value="{{ old('nome') }}" placeholder="Ex: Papel sulfite A4" required>
                                            @error('nome')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="categoria">Categoria <span class="required-mark">*</span></label>
                                            <select id="categoria" name="categoria" class="custom-select @error('categoria') is-invalid @enderror" required>
                                                <option value="" disabled {{ old('categoria') ? '' : 'selected' }}>Selecione uma categoria</option>
                                                @foreach (['Papelaria', 'Escrita', 'Esporte', 'Artes', 'Informática', 'Limpeza', 'Material didático', 'Outros'] as $categoria)
                                                    <option value="{{ $categoria }}" {{ old('categoria') === $categoria ? 'selected' : '' }}>{{ $categoria }}</option>
                                                @endforeach
                                            </select>
                                            @error('categoria')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="quantidade">Quantidade inicial <span class="required-mark">*</span></label>
                                            <input id="quantidade" name="quantidade" type="number" min="0" step="1" class="form-control @error('quantidade') is-invalid @enderror" value="{{ old('quantidade') }}" placeholder="Digite a quantidade" required>
                                            @error('quantidade')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="unidade">Unidade de medida <span class="required-mark">*</span></label>
                                            <select id="unidade" name="unidade" class="custom-select @error('unidade') is-invalid @enderror" required>
                                                <option value="" disabled {{ old('unidade') ? '' : 'selected' }}>Selecione uma unidade</option>
                                                @foreach (['Unidade', 'Caixa', 'Pacote', 'Resma', 'Litro', 'Quilograma', 'Metro'] as $unidade)
                                                    <option value="{{ $unidade }}" {{ old('unidade') === $unidade ? 'selected' : '' }}>{{ $unidade }}</option>
                                                @endforeach
                                            </select>
                                            @error('unidade')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="estoque_minimo">Estoque mínimo <span class="required-mark">*</span></label>
                                            <input id="estoque_minimo" name="estoque_minimo" type="number" min="0" step="1" class="form-control @error('estoque_minimo') is-invalid @enderror" value="{{ old('estoque_minimo') }}" placeholder="Ex: 20" required>
                                            @error('estoque_minimo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="descricao">Descrição</label>
                                            <textarea id="descricao" name="descricao" rows="4" class="form-control @error('descricao') is-invalid @enderror" placeholder="Digite uma descrição do material...">{{ old('descricao') }}</textarea>
                                            @error('descricao')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>

                                    <div class="form-actions d-flex justify-content-between align-items-center mt-3 pt-3">
                                        <small class="text-muted"><span class="required-mark">*</span> Campos obrigatórios</small>
                                        <div>
                                            <a href="{{ route('Materiais') }}" class="btn btn-outline-secondary mr-2">Cancelar</a>
                                            <button type="submit" class="btn btn-primary">Cadastrar material</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>
