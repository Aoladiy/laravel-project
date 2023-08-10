<x-layouts.app page-title="{{ $pageTitle ?? null }}">
    <x-slot:userMenu>
        <x-panels.user_not_authorized_menu/>
    </x-slot:userMenu>
    <x-slot:navigationMenu>
        <x-category_menu/>
    </x-slot:navigationMenu>
    <x-slot:footerInfo>
        <x-information-menu template="footer" />
    </x-slot:footerInfo>
    <x-slot:breadcrumbs>
        <x-panels.breadcrumbs name="{{$breadcrumbsName ?? null}}" parameter="{{$breadcrumbsParameter ?? null}}" />
    </x-slot:breadcrumbs>
    <div class="flex-1 grid grid-cols-4 lg:grid-cols-5 border-b">
            <x-information-menu template="left" />
        <div class="col-span-4 sm:col-span-3 lg:col-span-4 p-4">
            <h1 class="text-black text-3xl font-bold mb-4">{{ $title }}</h1>
            {{ $slot }}
        </div>
    </div>
</x-layouts.app>
