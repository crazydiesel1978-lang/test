@props(['title' => null])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-slate-800 bg-slate-50">
        <header class="border-b border-slate-200 bg-white">
            <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
                <a href="{{ route('home') }}" class="text-lg font-semibold tracking-tight text-slate-900">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <nav class="flex items-center gap-6 text-sm font-medium">
                    <a href="{{ route('home') }}" class="text-slate-700 hover:text-slate-900 {{ request()->routeIs('home') ? 'underline underline-offset-4' : '' }}">
                        Home
                    </a>

                    @auth
                        <a href="{{ route('dashboard') }}" class="text-slate-700 hover:text-slate-900">
                            Admin
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="rounded-md bg-slate-900 px-3 py-1.5 text-white hover:bg-slate-700">
                            Admin / Login
                        </a>
                    @endauth
                </nav>
            </div>
        </header>

        <main>
            {{ $slot }}
        </main>

        <footer class="border-t border-slate-200 bg-white">
            <div class="mx-auto max-w-6xl px-4 py-6 text-sm text-slate-500 sm:px-6 lg:px-8">
                &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}
            </div>
        </footer>
    </body>
</html>
