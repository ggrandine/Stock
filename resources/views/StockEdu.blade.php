<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    git 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>StockEdu | Gestão de Materiais</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        :root { --blue: #2864ed; --navy: #172238; --muted: #66758b; --line: #e5eaf1; }
        * { box-sizing: border-box; }
        body { min-height: 100vh; margin: 0; color: var(--navy); background: #fff; font-family: Arial, sans-serif; }
        .screen { display: grid; grid-template-columns: 1.12fr .88fr; min-height: 100vh; }
        .intro { display: flex; flex-direction: column; justify-content: space-between; min-width: 0; padding: 34px clamp(28px, 6vw, 88px) 28px; background: linear-gradient(145deg, #fbfcfe, #f5f8fc); }
        .intro-header { display: flex; align-items: center; justify-content: space-between; gap: 18px; }
        .brand-logo { display: block; width: 210px; max-width: 62vw; height: auto; }
        .institution { display: inline-flex; align-items: center; gap: 8px; padding: 8px 13px; border: 1px solid #e7edf4; border-radius: 999px; background: #fff; color: #58677c; font-size: 11px; white-space: nowrap; }
        .institution::before { width: 7px; height: 7px; border-radius: 50%; background: #22b573; content: ""; }
        .intro-content { width: 100%; max-width: 650px; margin: 48px auto; }
        h1 { margin: 0 0 10px; font-size: clamp(27px, 3vw, 39px); font-weight: 500; letter-spacing: -.8px; line-height: 1.18; }
        .intro-content > p { margin: 0 0 24px; color: var(--muted); font-size: 14px; line-height: 1.65; }
        .warehouse-card { overflow: hidden; aspect-ratio: 1.28 / 1; border: 1px solid #e8edf3; border-radius: 20px; background: #e9eff6; box-shadow: 0 12px 30px rgba(28,48,75,.08); }
        .warehouse-image { display: block; width: 100%; height: 100%; object-fit: cover; }
        .features { display: flex; flex-wrap: wrap; gap: 12px 20px; color: #607087; font-size: 11px; }
        .features span::before { margin-right: 6px; color: var(--blue); content: "⊙"; font-size: 13px; font-weight: 700; }
        .login { display: flex; align-items: center; justify-content: center; padding: 48px clamp(28px, 7vw, 105px); background: #fff; }
        .login-content { width: 100%; max-width: 430px; }
        .tag { display: inline-flex; align-items: center; gap: 6px; margin-bottom: 12px; color: var(--blue); font-size: 10px; font-weight: 700; }
        .tag::before { content: "⬡"; font-size: 14px; }
        .login h2 { margin: 0 0 8px; font-size: clamp(28px, 3vw, 36px); font-weight: 500; letter-spacing: -.7px; line-height: 1.1; }
        .login-intro { margin: 0 0 27px; color: var(--muted); font-size: 13px; line-height: 1.65; }
        .form-group { margin-bottom: 18px; }
        .form-group label { margin-bottom: 7px; color: #526077; font-size: 12px; font-weight: 600; }
        .form-control { height: 46px; border: 1px solid var(--line); border-radius: 8px; color: var(--navy); font-size: 13px; box-shadow: 0 1px 2px rgba(20,40,70,.02); }
        .form-control::placeholder { color: #9aa6b6; }
        .form-control:focus { border-color: #9bb7ff; box-shadow: 0 0 0 3px rgba(40,100,237,.1); }
        .btn-primary { min-height: 46px; border: 0; border-radius: 8px; background: var(--blue); font-size: 13px; font-weight: 600; box-shadow: 0 5px 12px rgba(40,100,237,.16); }
        .btn-primary:hover, .btn-primary:focus { background: #1d54d5; }
        .safe { display: flex; align-items: center; gap: 8px; margin-top: 18px; padding: 13px 14px; border-radius: 8px; background: #f5f8fc; color: #8390a3; font-size: 11px; line-height: 1.45; }
        .safe::before { color: #8293aa; content: "▣"; }
        footer { margin-top: 38px; color: #9aa6b6; font-size: 10px; text-align: center; }
        @media (max-width: 850px) {
            .screen { grid-template-columns: 1fr 1fr; }
            .intro { padding-right: 30px; padding-left: 30px; }
            .login { padding-right: 32px; padding-left: 32px; }
            .institution { font-size: 0; }
            .institution::before { width: 8px; height: 8px; }
        }
        @media (max-width: 640px) {
            .screen { display: flex; flex-direction: column; }
            .intro { min-height: auto; padding: 22px 22px 20px; }
            .brand-logo { width: 180px; }
            .intro-content { margin: 40px auto 22px; }
            h1 { font-size: 30px; }
            .intro-content > p { margin-bottom: 18px; font-size: 13px; }
            .warehouse-card { aspect-ratio: 1.45 / 1; border-radius: 15px; }
            .features { gap: 8px 14px; font-size: 10px; }
            .login { padding: 38px 24px 25px; }
            .login-content { max-width: 480px; }
            .login h2 { font-size: 31px; }
            footer { margin-top: 28px; }
        }
    </style>
</head>
<body>
    <main class="screen">
        <section class="intro">
            <header class="intro-header">
                <a href="{{ route('home') }}" aria-label="StockEdu, início">
                    <img class="brand-logo" src="{{ asset('images/stockedu-logo.svg') }}" alt="StockEdu — Sistema de Estoque SESI">
                </a>
                <span class="institution">Sistema institucional</span>
            </header>

            <div class="intro-content">
                <h1>Materiais certos, no lugar certo.</h1>
                <p>Controle simples e confiável para apoiar cada aula prática do SENAI.</p>
                <div class="warehouse-card">
                    <img class="warehouse-image" src="{{ asset('images/estoque-fundo.png') }}" alt="Estoque organizado de materiais do StockEdu">
                </div>
            </div>

            <div class="features">
                <span>Estoque atualizado</span>
                <span>Rastreabilidade</span>
                <span>Relatórios rápidos</span>
            </div>
        </section>

        <section class="login">
            <div class="login-content">
                <div class="tag">ACESSO SEGURO SENAI</div>
                <h2>Bem-vindo ao<br>StockEdu</h2>
                <p class="login-intro">Entre para acompanhar materiais, movimentações e níveis de estoque da sua unidade.</p>

                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">{{ $errors->first() }}</div>
                @endif

                <form method="POST" action="{{ route('Login.submit') }}">
                    @csrf
                    <div class="form-group">
                        <label for="nome">Nome *</label>
                        <input id="nome" class="form-control @error('nome') is-invalid @enderror" type="text" name="nome" value="{{ old('nome') }}" placeholder="Seu nome" autocomplete="name" maxlength="100" required autofocus>
                        @error('nome')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail *</label>
                        <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" placeholder="voce@senai.br" autocomplete="email" maxlength="100" required>
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input id="senha" class="form-control" type="password" placeholder="Digite sua senha" autocomplete="current-password">
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">Entrar</button>
                </form>

                <div class="safe">Ambiente institucional protegido. Seus dados serão exibidos no painel.</div>
                <footer>© {{ date('Y') }} SENAI · StockEdu</footer>
            </div>
        </section>
    </main>
</body>
</html>
