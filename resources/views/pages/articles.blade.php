{{--@extends('layouts.inner_two_columns')--}}
{{--@section('page-title', 'Все новости')--}}
{{--@section('title', 'Все новости')--}}
{{--@section('content')--}}
@props(['articles'])
<x-layouts.inner_two_columns
    page-title="Все новости"
    title="Все новости"
>
    <div class="space-y-4">
        @foreach($articles as $article)
{{--            @include('panels.articles.article_item_for_all_articles_page', ['articles' => $article])--}}
            <x-panels.articles.article_item_for_all_articles_page :article="$article" />
        @endforeach
        <div>
{{--            @include('components.panels.pagination_menu')--}}
            <x-panels.pagination_menu />
        </div>
    </div>
{{--@endsection--}}
</x-layouts.inner_two_columns>
