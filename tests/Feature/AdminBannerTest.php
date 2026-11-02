<?php

namespace Tests\Feature;

use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminBannerTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_are_redirected_from_admin(): void
    {
        $response = $this->get('/admin');

        $response->assertRedirect(route('login'));
    }

    public function test_admin_can_update_banner(): void
    {
        $this->seed();

        $user = User::where('email', 'admin@example.com')->firstOrFail();

        $response = $this
            ->actingAs($user)
            ->put(route('admin.banner.update'), [
                'banner_title' => 'Updated title',
                'banner_subtitle' => 'Updated subtitle',
                'banner_cta_text' => 'Click me',
                'banner_cta_url' => '/login',
            ]);

        $response->assertRedirect(route('admin.banner.edit'));

        $this->assertDatabaseHas('site_settings', [
            'banner_title' => 'Updated title',
            'banner_cta_text' => 'Click me',
        ]);

        $this->get('/')->assertSee('Updated title');
    }

    public function test_dashboard_shows_current_banner(): void
    {
        $this->seed();

        $user = User::where('email', 'admin@example.com')->firstOrFail();

        $this->actingAs($user)
            ->get('/admin')
            ->assertOk()
            ->assertSee(SiteSetting::first()->banner_title);
    }
}
