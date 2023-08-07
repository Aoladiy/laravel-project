<x-layouts.app page-title="{{ $pageTitle ?? null }}">
    <x-slot:userMenu>
        <x-panels.user_not_authorized_menu />
    </x-slot:userMenu>
    <x-slot:navigationMenu>
        <x-category_menu />
    </x-slot:navigationMenu>
    <x-slot:footerInfo>
        <x-information-menu template="footer" />
    </x-slot:footerInfo>
    <nav class="container mx-auto bg-gray-100 py-1 px-4 text-sm flex items-center space-x-2">
        <a class="hover:text-orange" href="{{ route('home') }}">Главная</a>
        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-3 w-3 mx-1" fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"/>
        </svg>
        <a class="hover:text-orange" href="{{ route('catalog') }}">Каталог</a>
        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-3 w-3 mx-1" fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"/>
        </svg>
        <a class="hover:text-orange" href="{{ route('catalog') }}">Легковые</a>
        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-3 w-3 mx-1" fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"/>
        </svg>
        <span>Седан</span>
    </nav>
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">{{ $title }}</h1>
        {{ $slot }}
    </div>
    @push('styles')
        <link href="/assets/css/inner_page_template_styles.css" rel="stylesheet">
    @endpush
</x-layouts.app>
