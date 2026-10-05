<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'StockEdu')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { background: #f5f8fb; color: #17324f; }
        .navbar { background: #fff; border-bottom: 1px solid #e5ebf1; }
        .navbar-brand { color: #1769aa !important; }
        .navbar-logo { display: block; width: 145px; height: auto; }
        .content { padding-top: 35px; padding-bottom: 40px; }
        .card { border-radius: 12px; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand navbar-light">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img class="navbar-logo" src="{{ asset('images/stockedu-logo.svg') }}" alt="StockEdu — Sistema de Estoque SESI">
        </a>
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="{{ route('Dashboard') }}">Dashboard</a>
            <a class="nav-item nav-link" href="{{ route('Materiais') }}">Materiais</a>
            <a class="nav-item nav-link" href="{{ route('Movimentacoes') }}">Movimentações</a>
            <a class="nav-item nav-link" href="{{ route('CadastroUsuario') }}">Usuários</a>
            <a class="nav-item nav-link" href="{{ route('Graficos') }}">Relatórios</a>
        </div>
    </nav>
    <main class="container content">
        @yield('content')
    </main>
</body>
</html>
