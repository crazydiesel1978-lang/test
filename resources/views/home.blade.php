<x-layouts.public :title="config('app.name').' — Home'">
    <section class="relative overflow-hidden bg-gradient-to-br from-teal-700 via-slate-800 to-slate-900 text-white">
        <div class="pointer-events-none absolute inset-0 opacity-30" style="background-image: radial-gradient(circle at 20% 20%, rgba(255,255,255,.35), transparent 45%), radial-gradient(circle at 80% 0%, rgba(45,212,191,.45), transparent 40%), radial-gradient(circle at 70% 80%, rgba(14,165,233,.35), transparent 45%);"></div>

        <div class="relative mx-auto flex min-h-[70vh] max-w-6xl flex-col justify-center px-4 py-20 sm:px-6 lg:px-8">
            <p class="mb-3 text-sm font-medium uppercase tracking-[0.2em] text-teal-200">Featured</p>

            <h1 class="max-w-3xl text-4xl font-bold tracking-tight sm:text-5xl lg:text-6xl">
                {{ $settings->banner_title }}
            </h1>

            @if ($settings->banner_subtitle)
                <p class="mt-5 max-w-2xl text-lg text-slate-200 sm:text-xl">
                    {{ $settings->banner_subtitle }}
                </p>
            @endif

            @if ($settings->banner_cta_text && $settings->banner_cta_url)
                <div class="mt-8">
                    <a
                        href="{{ $settings->banner_cta_url }}"
                        class="inline-flex items-center rounded-md bg-white px-5 py-2.5 text-sm font-semibold text-slate-900 shadow-sm hover:bg-teal-50"
                    >
                        {{ $settings->banner_cta_text }}
                    </a>
                </div>
            @endif
        </div>
    </section>

    <section class="mx-auto max-w-6xl px-4 py-16 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold text-slate-900">About this mini-site</h2>
        <p class="mt-3 max-w-2xl text-slate-600">
            The hero content above is stored in the database and can be edited from the admin area after you sign in.
        </p>
    </section>
</x-layouts.public>
