<section class="auth-card" aria-labelledby="auth-heading">
    <div class="auth-card-heading">
        <span class="auth-kicker">BEM-VINDO AO SEU NOVO MENU</span>
        <h2 id="auth-heading">{{ $mode === 'login' ? 'Entre na sua conta' : 'Crie sua conta grátis' }}</h2>
        <p>{{ $mode === 'login' ? 'Acesse seu espaço e continue de onde parou.' : 'Só alguns dados para começar a montar seu cardápio.' }}</p>
    </div>

    <div class="auth-tabs" role="tablist" aria-label="Acesso à conta">
        <button type="button" class="auth-tab {{ $mode === 'login' ? 'active' : '' }}" role="tab" aria-selected="{{ $mode === 'login' ? 'true' : 'false' }}" wire:click="setMode('login')">Entrar</button>
        <button type="button" class="auth-tab {{ $mode === 'register' ? 'active' : '' }}" role="tab" aria-selected="{{ $mode === 'register' ? 'true' : 'false' }}" wire:click="setMode('register')">Criar conta</button>
    </div>

    @if ($mode === 'login')
        <form class="auth-form" wire:submit="login" wire:key="login-form">
            <label class="form-field">
                <span>E-mail</span>
                <input type="email" wire:model="email" autocomplete="email" placeholder="voce@exemplo.com" wire:key="login-email" required>
                @error('email') <small class="field-error">{{ $message }}</small> @enderror
            </label>

            <label class="form-field">
                <span>Senha</span>
                <input type="password" wire:model="password" autocomplete="current-password" placeholder="Sua senha" wire:key="login-password" required>
                @error('password') <small class="field-error">{{ $message }}</small> @enderror
            </label>

            <button class="button-primary" type="submit" wire:loading.attr="disabled" wire:target="login">
                <span wire:loading.remove wire:target="login">Entrar na minha conta <span aria-hidden="true">→</span></span>
                <span wire:loading wire:target="login">Entrando...</span>
            </button>
            <p class="form-hint">Ainda não tem uma conta? <button type="button" class="inline-link" wire:click="setMode('register')">Comece grátis</button></p>
        </form>
    @else
        <form class="auth-form" wire:submit="register" wire:key="register-form">
            <label class="form-field">
                <span>Seu nome</span>
                <input type="text" wire:model="name" autocomplete="name" placeholder="Como podemos te chamar?" wire:key="register-name" required>
                @error('name') <small class="field-error">{{ $message }}</small> @enderror
            </label>

            <label class="form-field">
                <span>E-mail</span>
                <input type="email" wire:model="email" autocomplete="email" placeholder="voce@exemplo.com" wire:key="register-email" required>
                @error('email') <small class="field-error">{{ $message }}</small> @enderror
            </label>

            <label class="form-field">
                <span>Senha</span>
                <input type="password" wire:model="password" autocomplete="new-password" placeholder="Mínimo de 8 caracteres" wire:key="register-password" required>
                @error('password') <small class="field-error">{{ $message }}</small> @enderror
            </label>

            <label class="form-field">
                <span>Confirme sua senha</span>
                <input type="password" wire:model="password_confirmation" autocomplete="new-password" placeholder="Digite a senha novamente" wire:key="register-password-confirmation" required>
            </label>

            <button class="button-primary" type="submit" wire:loading.attr="disabled" wire:target="register">
                <span wire:loading.remove wire:target="register">Criar minha conta <span aria-hidden="true">→</span></span>
                <span wire:loading wire:target="register">Criando conta...</span>
            </button>
            <p class="form-hint">Ao continuar, você cria seu espaço no Meu Cardápio.</p>
        </form>
    @endif

    <div class="auth-safe"><span aria-hidden="true">♧</span> Seus dados ficam protegidos e seguros.</div>
</section>
