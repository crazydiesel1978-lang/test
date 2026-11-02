<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BannerController extends Controller
{
    /**
     * Show the form for editing the home banner.
     */
    public function edit(): View
    {
        return view('admin.banner.edit', [
            'settings' => SiteSetting::current(),
        ]);
    }

    /**
     * Update the home banner settings.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'banner_title' => ['required', 'string', 'max:255'],
            'banner_subtitle' => ['nullable', 'string', 'max:2000'],
            'banner_cta_text' => ['nullable', 'string', 'max:255'],
            'banner_cta_url' => ['nullable', 'string', 'max:2048'],
        ]);

        SiteSetting::current()->update($validated);

        return redirect()
            ->route('admin.banner.edit')
            ->with('status', 'banner-updated');
    }
}
