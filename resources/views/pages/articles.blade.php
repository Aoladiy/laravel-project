@extends('layouts.inner_two_columns')
@section('page-title', 'Все новости')
@section('title', 'Все новости')
@section('content')
    <div class="space-y-4">
        @foreach($articles as $article)
            @include('panels.articles.article_item_for_all_articles_page', ['articles' => $article])
        @endforeach
        <div>
            @include('panels.pagination_menu')
        </div>
    </div>
@endsection
