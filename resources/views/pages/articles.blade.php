@props(['articles'])
<x-layouts.inner_two_columns
    page-title="Все новости"
    title="Все новости"
>
    <div class="space-y-4">
        @foreach($articles as $article)
            <x-panels.articles.article_item_for_all_articles_page :article="$article"/>
        @endforeach
        <div>
            <x-panels.pagination :paginator="$articles"/>
        </div>
    </div>
</x-layouts.inner_two_columns>
