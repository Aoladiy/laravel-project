{{--@extends('layouts.app')--}}
{{--@section('page-title', 'Главная страница')--}}
{{--@section('userMenu')--}}
{{--    @include('panels.user_not_authorized_menu')--}}
{{--@endsection--}}
{{--@section('navigationMenu')--}}
{{--    @include('panels.category_menu')--}}
{{--@endsection--}}
{{--@section('footerInfo')--}}
{{--    @include('panels.footer_information')--}}
{{--@endsection--}}
<x-layouts.app page-title="Главная страница">
    <x-slot:userMenu>
{{--        @include('components.panels.user_not_authorized_menu')--}}
        <x-panels.user_not_authorized_menu />
    </x-slot:userMenu>
    <x-slot:navigationMenu>
{{--        @include('components.panels.category_menu')--}}
        <x-category_menu />
    </x-slot:navigationMenu>
    <x-slot:footerInfo>
{{--        @include('panels.footer_information')--}}
        <x-information-menu template="footer" />
    </x-slot:footerInfo>
    <x-slot:headerLogo>
        <span class="inline-block sm:inline">
<img src="/assets/images/logo.png" width="222" height="30" alt="">
        </span>
    </x-slot:headerLogo>
    {{--@section('template-content')--}}
    <x-panels.banners.banners :banners="$banners" />
    @if($models)
        <section class="pb-4 px-4">
            <p class="inline-block text-3xl text-black font-bold mb-4">Модели недели</p>
{{--            @include('panels.catalog.cars', ['$models' => $models])--}}
            <x-catalog.cars :models="$models" />
        </section>
    @endif
{{--    @include('panels.articles.article', ['articles' => $articles])--}}
    <x-panels.articles.article :articles="$articles" />
    {{--@endsection--}}
    @push('scripts')
        <link href="/assets/css/main_page_template_styles.css" rel="stylesheet">
    @endpush
    {{--@section('header-logo')--}}
    {{--    <span class="inline-block sm:inline">--}}
    {{--<img src="/assets/images/logo.png" width="222" height="30" alt="">--}}
    {{--        </span>--}}
    {{--@endsection--}}
</x-layouts.app>
