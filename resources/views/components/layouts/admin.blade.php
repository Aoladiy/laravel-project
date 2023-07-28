{{--@extends('components.layouts.app')--}}
{{--@section('userMenu')--}}
{{--    @include('panels.user_authorized_menu')--}}
{{--@endsection--}}
{{--@section('navigationMenu')--}}
{{--    @include('panels.admin_menu')--}}
{{--@endsection--}}
{{--@section('template-content')--}}
<x-layouts.app
    page-title="{{ $pageTitle ?? '' }}">
    <x-slot:userMenu>
{{--        @include('components.panels.user_authorized_menu')--}}
        <x-panels.user_authorized_menu />
    </x-slot:userMenu>
    <x-slot:navigationMenu>
{{--        @include('components.panels.admin_menu')--}}
        <x-panels.admin_menu />
    </x-slot:navigationMenu>
    <div class="p-4">
        {{--        <h1 class="text-black text-3xl font-bold mb-4">@yield('title')</h1>--}}
        <h1 class="text-black text-3xl font-bold mb-4">{{ $title }}</h1>
        {{--        @yield('content')--}}
        {{ $slot }}
    </div>
    {{--@endsection--}}
</x-layouts.app>
