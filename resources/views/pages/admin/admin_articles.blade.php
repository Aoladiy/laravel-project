{{--@extends('layouts.admin')--}}
{{--@section('page-title', 'Управление новостями')--}}
{{--@section('title', 'Управление новостями')--}}
{{--@section('content')--}}
<x-layouts.admin
        page-title="Управление новостями"
        title="Управление новостями"
>
    <section class="pb-4">
        <div class="my-6">
            <a href="{{route('articleCreate')}}"
               class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded"
               title="Добавить новость">
                    <span class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>Добавить новость</span>
                    </span>
            </a>
        </div>

{{--        @include('panels.articles.article_table', ['articles' => $articles])--}}
        <x-panels.articles.article_table :articles="$articles" />

        <div class="text-center mt-4">
{{--            @include('components.panels.pagination_menu')--}}
            <x-panels.pagination_menu />
        </div>
    </section>
    {{--@endsection--}}
</x-layouts.admin>
