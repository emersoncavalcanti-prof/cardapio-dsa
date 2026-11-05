<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f5f8ff">
    <meta name="description" content="Crie seu cardápio digital e deixe seus clientes pedirem com praticidade.">
    <title>Meu Cardápio — seu menu, do seu jeito</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <div class="landing-page">
        <header class="site-header">
            <a class="brand" href="{{ route('home') }}" aria-label="Meu Cardápio, página inicial">
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
            <a class="header-link" href="#recursos">Conheça a plataforma <span aria-hidden="true">↗</span></a>
        </header>

        <main class="hero">
            <section class="hero-copy">
                <div class="eyebrow"><span class="eyebrow-dot"></span> SEU NEGÓCIO, MAIS DIGITAL</div>
                <h1>Um cardápio que abre o apetite <span>e simplifica seu dia.</span></h1>
                <p class="hero-description">
                    Apresente seus pratos de um jeito bonito, compartilhe seu menu com um link e deixe tudo pronto para seus clientes.
                </p>
                <div class="hero-points">
                    <div class="hero-point">
                        <span class="point-icon" aria-hidden="true">✓</span>
                        <span>Seu cardápio online, sempre atualizado</span>
                    </div>
                    <div class="hero-point">
                        <span class="point-icon" aria-hidden="true">✓</span>
                        <span>Uma experiência simples para seus clientes</span>
                    </div>
                    <div class="hero-point">
                        <span class="point-icon" aria-hidden="true">✓</span>
                        <span>Mais tempo para cuidar do que importa</span>
                    </div>
                </div>
                <div class="trust-note">
                    <span class="trust-stars" aria-label="5 estrelas">★★★★★</span>
                    <span>Comece grátis e deixe seu menu com a sua cara.</span>
                </div>
            </section>

            <livewire:landing-page />
        </main>

        <section class="feature-strip" id="recursos" aria-label="Vantagens do Meu Cardápio">
            <div class="feature-item">
                <span class="feature-icon" aria-hidden="true">⌁</span>
                <div><strong>Fácil de compartilhar</strong><span>Seu menu a um link de distância</span></div>
            </div>
            <div class="feature-item">
                <span class="feature-icon" aria-hidden="true">◇</span>
                <div><strong>Feito para você</strong><span>Uma vitrine para o seu negócio</span></div>
            </div>
            <div class="feature-item">
                <span class="feature-icon" aria-hidden="true">♡</span>
                <div><strong>Simples desde o início</strong><span>Comece sem complicação</span></div>
            </div>
        </section>

        <footer class="site-footer">
            <a class="brand brand-footer" href="{{ route('home') }}">
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
            <span>Seu próximo pedido começa por aqui.</span>
        </footer>
    </div>
    @livewireScripts
</body>
</html>
