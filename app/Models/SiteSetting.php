<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'banner_title',
    'banner_subtitle',
    'banner_cta_text',
    'banner_cta_url',
])]
class SiteSetting extends Model
{
    /**
     * Return the singleton site settings row, creating defaults if missing.
     */
    public static function current(): self
    {
        return static::query()->first() ?? static::query()->create([
            'banner_title' => 'Welcome',
            'banner_subtitle' => 'A simple Laravel mini-site.',
            'banner_cta_text' => 'Get started',
            'banner_cta_url' => '/login',
        ]);
    }
}
