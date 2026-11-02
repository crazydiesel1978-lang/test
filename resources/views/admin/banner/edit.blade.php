<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit home banner') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('status') === 'banner-updated')
                <div class="rounded-md bg-green-50 px-4 py-3 text-sm text-green-800">
                    Banner updated successfully.
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('admin.banner.update') }}" class="p-6 space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="banner_title" :value="__('Title')" />
                        <x-text-input id="banner_title" name="banner_title" type="text" class="mt-1 block w-full" :value="old('banner_title', $settings->banner_title)" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('banner_title')" />
                    </div>

                    <div>
                        <x-input-label for="banner_subtitle" :value="__('Subtitle')" />
                        <textarea id="banner_subtitle" name="banner_subtitle" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('banner_subtitle', $settings->banner_subtitle) }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('banner_subtitle')" />
                    </div>

                    <div>
                        <x-input-label for="banner_cta_text" :value="__('CTA text')" />
                        <x-text-input id="banner_cta_text" name="banner_cta_text" type="text" class="mt-1 block w-full" :value="old('banner_cta_text', $settings->banner_cta_text)" />
                        <x-input-error class="mt-2" :messages="$errors->get('banner_cta_text')" />
                    </div>

                    <div>
                        <x-input-label for="banner_cta_url" :value="__('CTA URL')" />
                        <x-text-input id="banner_cta_url" name="banner_cta_url" type="text" class="mt-1 block w-full" :value="old('banner_cta_url', $settings->banner_cta_url)" placeholder="/login or https://example.com" />
                        <x-input-error class="mt-2" :messages="$errors->get('banner_cta_url')" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save banner') }}</x-primary-button>
                        <a href="{{ route('dashboard') }}" class="text-sm text-gray-600 hover:text-gray-900">Back to dashboard</a>
                        <a href="{{ route('home') }}" class="text-sm text-gray-600 hover:text-gray-900">View site</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
