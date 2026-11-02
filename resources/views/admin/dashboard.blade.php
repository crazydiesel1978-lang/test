<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-3">
                    <p>Welcome back, {{ Auth::user()->name }}.</p>
                    <p class="text-sm text-gray-600">
                        Manage the public home page banner from here.
                    </p>
                    <div class="pt-2">
                        <a href="{{ route('admin.banner.edit') }}" class="inline-flex items-center rounded-md bg-gray-800 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-700">
                            Edit home banner
                        </a>
                        <a href="{{ route('home') }}" class="ms-3 inline-flex items-center text-sm font-medium text-gray-600 hover:text-gray-900">
                            View public site
                        </a>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-3">Current banner</h3>
                    <dl class="grid gap-3 sm:grid-cols-2 text-sm">
                        <div>
                            <dt class="font-medium text-gray-500">Title</dt>
                            <dd class="mt-1">{{ $settings->banner_title }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-500">CTA</dt>
                            <dd class="mt-1">
                                {{ $settings->banner_cta_text ?: '—' }}
                                @if ($settings->banner_cta_url)
                                    <span class="text-gray-400">({{ $settings->banner_cta_url }})</span>
                                @endif
                            </dd>
                        </div>
                        <div class="sm:col-span-2">
                            <dt class="font-medium text-gray-500">Subtitle</dt>
                            <dd class="mt-1">{{ $settings->banner_subtitle ?: '—' }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
