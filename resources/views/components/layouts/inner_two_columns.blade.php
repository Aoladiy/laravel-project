{{--@extends('layouts.app')--}}
{{--@section('userMenu')--}}
{{--    @include('panels.user_not_authorized_menu')--}}
{{--@endsection--}}
{{--@section('navigationMenu')--}}
{{--    @include('panels.category_menu')--}}
{{--@endsection--}}
{{--@section('footerInfo')--}}
{{--    @include('panels.footer_information')--}}
{{--@endsection--}}
<x-layouts.app page-title="{{ $pageTitle ?? null }}">
    <x-slot:userMenu>
        {{--        @include('components.panels.user_not_authorized_menu')--}}
        <x-panels.user_not_authorized_menu/>
    </x-slot:userMenu>
    <x-slot:navigationMenu>
        {{--        @include('components.panels.category_menu')--}}
        <x-panels.category_menu/>
    </x-slot:navigationMenu>
    <x-slot:footerInfo>
{{--        @include('panels.footer_information')--}}
        <x-panels.information-menu.footer template="footer" />
    </x-slot:footerInfo>
    {{--@section('breadcrumbs')--}}
    <x-slot:breadcrumbs>
        <nav class="container mx-auto bg-gray-100 py-1 px-4 text-sm flex items-center
space-x-2">
            <a class="hover:text-orange" href="/">Главная</a>
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-3 w-3 mx-1"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                      d="M9 5l7 7-7 7"/>
            </svg>
            <a class="hover:text-orange" href="/catalog">Каталог</a>
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-3 w-3 mx-1"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                      d="M9 5l7 7-7 7"/>
            </svg>
            <a class="hover:text-orange" href="catalog.html">Легковые</a>
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-3 w-3 mx-1"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                      d="M9 5l7 7-7 7"/>
            </svg>
            <span>Седан</span>
        </nav>
    </x-slot:breadcrumbs>
    {{--@endsection--}}
    {{--@section('template-content')--}}
    <div class="flex-1 grid grid-cols-4 lg:grid-cols-5 border-b">
        <aside class="hidden sm:block col-span-1 border-r p-4">
{{--            @include('components.panels.footer-informationleft')--}}
            <x-panels.footer-information template="left" />
        </aside>
        <div class="col-span-4 sm:col-span-3 lg:col-span-4 p-4">
            {{--            <h1 class="text-black text-3xl font-bold mb-4">@yield('title')</h1>--}}
            <h1 class="text-black text-3xl font-bold mb-4">{{ $title }}</h1>
            {{--            @yield('content')--}}
            {{ $slot }}
        </div>
    </div>
    {{--@endsection--}}

</x-layouts.app>
