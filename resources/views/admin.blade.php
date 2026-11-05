<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f5f8ff">
    <title>Painel administrativo — Meu Cardápio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-body">
    <div class="admin-shell">
        <aside class="admin-sidebar">
            <a class="brand" href="{{ route('admin') }}" aria-label="Meu Cardápio, painel">
                <span class="brand-mark" aria-hidden="true">
                    <svg viewBox="0 0 40 40" fill="none">
                        <rect width="40" height="40" rx="13" fill="currentColor"/>
                        <path d="M20 9.5a10.5 10.5 0 1 0 0 21 10.5 10.5 0 0 0 0-21Z" stroke="white" stroke-width="2"/>
                        <path d="M20 14a6 6 0 1 0 0 12 6 6 0 0 0 0-12Z" stroke="white" stroke-width="2"/>
                        <path d="M31 10v20M34 10v20M31 16h3" stroke="white" stroke-width="1.7" stroke-linecap="round"/>
                    </svg>
                </span>
                <span>meu <strong>cardápio</strong></span>
            </a>

            <div class="sidebar-label">MENU</div>
            <nav class="admin-nav" aria-label="Navegação administrativa">
                <a class="admin-nav-link selected" href="{{ route('admin') }}"><span aria-hidden="true">▦</span> Visão geral</a>
                <span class="admin-nav-link unavailable"><span aria-hidden="true">▤</span> Meu cardápio <small>EM BREVE</small></span>
                <span class="admin-nav-link unavailable"><span aria-hidden="true">◷</span> Pedidos <small>EM BREVE</small></span>
                <span class="admin-nav-link unavailable"><span aria-hidden="true">⚙</span> Configurações <small>EM BREVE</small></span>
            </nav>

            <div class="sidebar-account">
                <div class="account-avatar">{{ mb_substr(auth()->user()->name, 0, 1) }}</div>
                <div class="account-copy">
                    <strong>{{ auth()->user()->name }}</strong>
                    <span>Minha conta</span>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="logout-button" type="submit" aria-label="Sair da conta" title="Sair da conta">↗</button>
                </form>
            </div>
        </aside>

        <main class="admin-main">
            <header class="admin-topbar">
                <span class="breadcrumb">Painel <span aria-hidden="true">/</span> Visão geral</span>
                <div class="topbar-user"><span class="online-dot"></span><span>Olá, {{ auth()->user()->name }}</span></div>
            </header>

            <div class="admin-content">
                <div class="admin-welcome">
                    <div>
                        <span class="admin-eyebrow">SEU ESPAÇO ESTÁ PRONTO</span>
                        <h1>Bem-vindo, {{ auth()->user()->name }}!</h1>
                        <p>Este é o ponto de partida para o seu cardápio digital.</p>
                    </div>
                </div>

                <section class="admin-empty" aria-labelledby="empty-heading">
                    <div class="empty-illustration" aria-hidden="true">
                        <div class="empty-plate">
                            <span class="plate-center"></span>
                            <span class="plate-leaf leaf-one"></span>
                            <span class="plate-leaf leaf-two"></span>
                            <span class="plate-sparkle">✦</span>
                        </div>
                    </div>
                    <span class="empty-label">TUDO COMEÇA AQUI</span>
                    <h2 id="empty-heading">Seu cardápio está esperando por você</h2>
                    <p>Em breve, você poderá cadastrar seus pratos, organizar categorias e compartilhar seu menu com seus clientes. Estamos preparando tudo para você.</p>
                    <div class="empty-status"><span class="status-dot"></span> Seu espaço está criado e pronto para começar</div>
                </section>

                <section class="admin-stats" aria-label="Resumo do seu espaço">
                    <article class="stat-card">
                        <span class="stat-icon">▤</span>
                        <span class="stat-label">Pratos cadastrados</span>
                        <strong>0</strong>
                        <span class="stat-note">Seu menu começa em breve</span>
                    </article>
                    <article class="stat-card">
                        <span class="stat-icon stat-icon-soft">▦</span>
                        <span class="stat-label">Categorias</span>
                        <strong>0</strong>
                        <span class="stat-note">Organize seus pratos</span>
                    </article>
                    <article class="stat-card">
                        <span class="stat-icon stat-icon-pale">◷</span>
                        <span class="stat-label">Pedidos recebidos</span>
                        <strong>0</strong>
                        <span class="stat-note">Acompanhe tudo por aqui</span>
                    </article>
                </section>
                <p class="admin-footnote">Estamos construindo uma experiência cada vez melhor para o seu negócio.</p>
            </div>
        </main>
    </div>
</body>
</html>
