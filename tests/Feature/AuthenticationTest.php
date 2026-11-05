<?php

namespace Tests\Feature;

use App\Livewire\LandingPage;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_view_the_home_page_and_admin_is_protected(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('meu')
            ->assertSee('Entrar na minha conta');

        $this->get('/admin')->assertRedirect(route('login'));
    }

    public function test_user_can_register_and_is_redirected_to_admin(): void
    {
        Livewire::test(LandingPage::class)
            ->call('setMode', 'register')
            ->set('name', 'Ana Souza')
            ->set('email', 'ana@example.com')
            ->set('password', 'senha-segura-123')
            ->set('password_confirmation', 'senha-segura-123')
            ->call('register')
            ->assertRedirect(route('admin'));

        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', ['email' => 'ana@example.com']);
        $this->assertTrue(Hash::check('senha-segura-123', User::where('email', 'ana@example.com')->first()->password));
    }

    public function test_registration_fields_keep_their_values_separate_when_switching_from_login(): void
    {
        Livewire::test(LandingPage::class)
            ->set('email', 'login@example.com')
            ->set('password', 'senha-de-login')
            ->call('setMode', 'register')
            ->set('name', 'Ana Souza')
            ->set('email', 'ana@example.com')
            ->set('password', 'senha-segura-123')
            ->assertSet('name', 'Ana Souza')
            ->assertSet('email', 'ana@example.com')
            ->assertSet('password', 'senha-segura-123');
    }

    public function test_user_can_log_in_and_invalid_credentials_are_rejected(): void
    {
        $user = User::factory()->create([
            'email' => 'ana@example.com',
            'password' => 'senha-segura-123',
        ]);

        Livewire::test(LandingPage::class)
            ->set('email', $user->email)
            ->set('password', 'senha-segura-123')
            ->call('login')
            ->assertRedirect(route('admin'));

        $this->assertAuthenticatedAs($user);

        auth()->logout();

        Livewire::test(LandingPage::class)
            ->set('email', $user->email)
            ->set('password', 'senha-errada')
            ->call('login')
            ->assertHasErrors('email');

        $this->assertGuest();
    }

    public function test_authenticated_user_can_open_admin_and_log_out(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/admin')
            ->assertOk()
            ->assertSee('Seu cardápio está esperando por você');

        $this->post('/logout')->assertRedirect(route('home'));
        $this->assertGuest();
    }
}
