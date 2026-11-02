<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ],
        );

        $banner = [
            'banner_title' => 'Build something simple',
            'banner_subtitle' => 'A Laravel mini-site with a public home page and a small admin for editing this banner.',
            'banner_cta_text' => 'Open admin',
            'banner_cta_url' => '/admin',
        ];

        $settings = SiteSetting::query()->first();

        if ($settings) {
            $settings->update($banner);
        } else {
            SiteSetting::query()->create($banner);
        }
    }
}
