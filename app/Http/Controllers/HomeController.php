<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Show the public home page.
     */
    public function __invoke(): View
    {
        return view('home', [
            'settings' => SiteSetting::current(),
        ]);
    }
}
