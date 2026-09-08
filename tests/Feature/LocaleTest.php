<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LocaleTest extends TestCase
{
    use RefreshDatabase;
    public function test_can_switch_locale_to_english(): void
    {
        $response = $this->get('/locale/en');

        $response->assertRedirect();
        $response->assertSessionHas('locale', 'en');
        $response->assertCookie('locale', 'en');
    }

    public function test_can_switch_locale_to_french(): void
    {
        $response = $this->get('/locale/fr');

        $response->assertRedirect();
        $response->assertSessionHas('locale', 'fr');
        $response->assertCookie('locale', 'fr');
    }

    public function test_invalid_locale_falls_back_to_default(): void
    {
        $response = $this->get('/locale/invalid_locale');

        $response->assertRedirect();
        $response->assertSessionHas('locale', 'pt');
    }

    public function test_page_renders_in_selected_language(): void
    {
        $response = $this->withSession(['locale' => 'en'])->get('/contact');

        $response->assertStatus(200);
        $response->assertSee('Get in Touch');
        $response->assertSee('SEND MESSAGE');
    }

    public function test_page_renders_in_french(): void
    {
        $response = $this->withSession(['locale' => 'fr'])->get('/contact');

        $response->assertStatus(200);
        $response->assertSee('Contactez-nous');
        $response->assertSee('ENVOYER LE MESSAGE');
    }
}
