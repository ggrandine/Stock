<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | StockEdu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body class="dashboard-page">
<div class="app-shell">
    <aside class="sidebar">
        <a class="brand" href="{{ route('Dashboard') }}">
            <img class="brand-logo" src="{{ asset('images/stockedu-logo.svg') }}" alt="StockEdu — Sistema de Estoque SESI">
        </a>

        <div class="nav-caption">MENU PRINCIPAL</div>
        <nav class="side-nav" aria-label="Navegação principal">
            <a class="side-link active" href="{{ route('Dashboard') }}"><span class="nav-icon">▦</span>Dashboard</a>
            <a class="side-link" href="{{ route('Materiais') }}"><span class="nav-icon">▤</span>Materiais</a>
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
                <span class="avatar avatar-soft">{{ $iniciais }}</span>
                <span class="profile-copy"><strong>{{ $nome }}</strong><small>{{ $email ?: 'E-mail não informado' }}</small></span>
                <span class="profile-menu">···</span>
            </div>
        </div>
    </aside>

    <main class="main-area">
        <header class="topbar">
            <div class="page-heading"><strong>Dashboard</strong><span>Visão geral do estoque <i>·</i> Unidade SENAI Vila Mariana</span></div>
            <div class="topbar-tools">
                <label class="search-box"><span aria-hidden="true">⌕</span><input type="search" placeholder="Pesquisar no StockEdu..." aria-label="Pesquisar no StockEdu"></label>
                <button class="icon-button notification-button" type="button" aria-label="Notificações"><span>♧</span><i></i></button>
                <button class="user-menu" type="button" aria-label="Menu de {{ $nome }}"><span class="avatar avatar-blue">{{ $iniciais }}</span><span class="chevron">⌄</span></button>
            </div>
        </header>

        <div class="content-area">
            <section class="welcome-row">
                <div><h1>Bom dia, {{ $nome }}! <span class="wave">👋</span></h1><p>Aqui está o resumo do almoxarifado hoje.</p></div>
                <a class="btn btn-primary action-button" href="{{ route('CadastroMaterial') }}"><span>＋</span> Registrar movimentação</a>
            </section>

            <section class="row summary-row" aria-label="Resumo do estoque">
                <div class="col-xl-3 col-sm-6 summary-col"><article class="summary-card"><div class="summary-top"><span>Total de Materiais</span><span class="metric-icon icon-violet">▤</span></div><strong class="metric-number">{{ number_format($totalMateriais, 0, ',', '.') }}</strong><div class="metric-foot"><span class="trend-up">Estoque</span><span>materiais cadastrados</span></div></article></div>
                <div class="col-xl-3 col-sm-6 summary-col"><article class="summary-card"><div class="summary-top"><span>Entradas Hoje</span><span class="metric-icon icon-blue">↓</span></div><strong class="metric-number">{{ number_format($entradasHoje, 0, ',', '.') }}</strong><div class="metric-foot"><span class="trend-up">Hoje</span><span>novos materiais cadastrados</span></div></article></div>
                <div class="col-xl-3 col-sm-6 summary-col"><article class="summary-card"><div class="summary-top"><span>Saídas Hoje</span><span class="metric-icon icon-cyan">↑</span></div><strong class="metric-number">54</strong><div class="metric-foot"><span class="trend-neutral">+8</span><span>desde ontem</span></div></article></div>
                <div class="col-xl-3 col-sm-6 summary-col"><article class="summary-card"><div class="summary-top"><span>Estoque Baixo</span><span class="metric-icon icon-amber">!</span></div><strong class="metric-number">18</strong><div class="metric-foot"><span class="trend-warn">Atenção</span><span>· itens críticos</span></div></article></div>
            </section>

            <section class="row insight-row">
                <div class="col-lg-8 insight-col">
                    <article class="panel chart-panel">
                        <div class="panel-heading"><div><h2>Movimentações da semana</h2><p>Entradas e saídas dos últimos 7 dias</p></div><a href="{{ route('Movimentacoes') }}" class="btn btn-outline-secondary btn-sm panel-button">Ver detalhes <span>↗</span></a></div>
                        <div class="chart-legend"><span><i class="legend-entry"></i>Entradas</span><span><i class="legend-exit"></i>Saídas</span></div>
                        <div class="bar-chart" role="img" aria-label="Gráfico de barras de entradas e saídas de segunda a domingo">
                            <div class="y-labels"><span>100</span><span>75</span><span>50</span><span>25</span><span>0</span></div>
                            <div class="chart-plot">
                                <div class="grid-lines"><i></i><i></i><i></i><i></i><i></i></div>
                                <div class="bar-groups">
                                    <div class="bar-group"><div class="bar-pair"><i class="bar entry" style="height:61%"></i><i class="bar exit" style="height:42%"></i></div><span>Seg</span></div>
                                    <div class="bar-group"><div class="bar-pair"><i class="bar entry" style="height:78%"></i><i class="bar exit" style="height:55%"></i></div><span>Ter</span></div>
                                    <div class="bar-group"><div class="bar-pair"><i class="bar entry" style="height:56%"></i><i class="bar exit" style="height:66%"></i></div><span>Qua</span></div>
                                    <div class="bar-group"><div class="bar-pair"><i class="bar entry" style="height:87%"></i><i class="bar exit" style="height:51%"></i></div><span>Qui</span></div>
                                    <div class="bar-group"><div class="bar-pair"><i class="bar entry" style="height:70%"></i><i class="bar exit" style="height:76%"></i></div><span>Sex</span></div>
                                    <div class="bar-group"><div class="bar-pair"><i class="bar entry" style="height:43%"></i><i class="bar exit" style="height:35%"></i></div><span>Sáb</span></div>
                                    <div class="bar-group"><div class="bar-pair"><i class="bar entry" style="height:31%"></i><i class="bar exit" style="height:27%"></i></div><span>Dom</span></div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 insight-col">
                    <article class="panel low-stock-panel">
                        <div class="panel-heading"><div><h2>Estoque baixo</h2><p>18 itens precisam de atenção</p></div><span class="alert-count">18</span></div>
                        <div class="stock-list">
                            <div class="stock-item"><div class="stock-label"><strong>Lápis grafite HB</strong><span>48 caixas</span></div><div class="progress"><div class="progress-bar level-medium" style="width:36%"></div></div></div>
                            <div class="stock-item"><div class="stock-label"><strong>Caneta azul</strong><span>22 caixas</span></div><div class="progress"><div class="progress-bar level-low" style="width:22%"></div></div></div>
                            <div class="stock-item"><div class="stock-label"><strong>Cola branca 90g</strong><span>15 un.</span></div><div class="progress"><div class="progress-bar level-low" style="width:17%"></div></div></div>
                            <div class="stock-item"><div class="stock-label"><strong>Pincel nº 12</strong><span>31 un.</span></div><div class="progress"><div class="progress-bar level-medium" style="width:29%"></div></div></div>
                        </div>
                        <a href="{{ route('Materiais') }}" class="btn btn-outline-primary btn-block review-button">Revisar estoque <span>→</span></a>
                    </article>
                </div>
            </section>

            <section class="panel recent-panel">
                <div class="panel-heading recent-heading"><div><h2>Materiais recentes</h2><p>Últimos itens atualizados no estoque</p></div><a href="{{ route('Materiais') }}" class="btn btn-outline-secondary btn-sm panel-button">Ver todos <span>↗</span></a></div>
                <div class="table-responsive"><table class="table recent-table mb-0"><thead><tr><th>MATERIAL</th><th>CATEGORIA</th><th>QUANTIDADE</th><th>STATUS</th><th>ATUALIZADO</th></tr></thead><tbody>
                    <tr><td><span class="material-symbol">P</span><strong>Papel sulfite A4</strong></td><td>Papelaria</td><td>320 resmas</td><td><span class="status-badge status-ok">Disponível</span></td><td>Hoje, 10:42</td></tr>
                    <tr><td><span class="material-symbol material-pencil">L</span><strong>Lápis grafite HB</strong></td><td>Escrita</td><td>48 caixas</td><td><span class="status-badge status-low">Baixo</span></td><td>Hoje, 09:18</td></tr>
                    <tr><td><span class="material-symbol material-art">T</span><strong>Tinta guache 250 ml</strong></td><td>Artes</td><td>126 un.</td><td><span class="status-badge status-ok">Disponível</span></td><td>Ontem, 16:30</td></tr>
                    <tr><td><span class="material-symbol material-empty">C</span><strong>Caderno universitário</strong></td><td>Papelaria</td><td>0 un.</td><td><span class="status-badge status-empty">Sem estoque</span></td><td>Ontem, 14:05</td></tr>
                </tbody></table></div>
            </section>
            <footer class="dashboard-footer">StockEdu <span>·</span> Gestão de Materiais <span class="footer-right">SENAI Vila Mariana</span></footer>
        </div>
    </main>
</div>
</body>
</html>
