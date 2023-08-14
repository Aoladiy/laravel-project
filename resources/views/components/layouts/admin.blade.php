<x-layouts.app
    page-title="{{ $pageTitle ?? '' }}">
    <x-slot:navigationMenu>
        <x-panels.admin_menu />
    </x-slot:navigationMenu>
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">{{ $title }}</h1>
        {{ $slot }}
    </div>
</x-layouts.app>
