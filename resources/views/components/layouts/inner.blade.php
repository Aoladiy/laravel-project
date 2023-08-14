<x-layouts.app page-title="{!! $pageTitle ?? null !!}">
    <x-slot:navigationMenu>
        <x-category_menu />
    </x-slot:navigationMenu>
    <x-slot:footerInfo>
        <x-information-menu template="footer" />
    </x-slot:footerInfo>
    <x-slot:breadcrumbs>
        <x-panels.breadcrumbs name="{{$breadcrumbsName ?? null}}" parameter="{{$breadcrumbsParameter ?? null}}" />
    </x-slot:breadcrumbs>
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">{{ $title }}</h1>
        {{ $slot }}
    </div>
    @push('styles')
        <link href="/assets/css/inner_page_template_styles.css" rel="stylesheet">
    @endpush
</x-layouts.app>
