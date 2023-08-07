<x-layouts.app page-title="Главная страница">
    <x-slot:userMenu>
        <x-panels.user_not_authorized_menu/>
    </x-slot:userMenu>
    <x-slot:navigationMenu>
        <x-category_menu/>
    </x-slot:navigationMenu>
    <x-slot:footerInfo>
        <x-information-menu template="footer"/>
    </x-slot:footerInfo>
    <x-slot:headerLogo>
        <span class="inline-block sm:inline">
<img src="/assets/images/logo.png" width="222" height="30" alt="">
        </span>
    </x-slot:headerLogo>
    <x-panels.banners.banners :banners="$banners"/>
    @if($models)
        <section class="pb-4 px-4">
            <p class="inline-block text-3xl text-black font-bold mb-4">Модели недели</p>
            <x-catalog.cars :models="$models"/>
        </section>
    @endif
    <x-panels.articles.article :articles="$articles"/>
    @push('scripts')
        <link href="/assets/css/main_page_template_styles.css" rel="stylesheet">
    @endpush
</x-layouts.app>
