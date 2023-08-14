@component('mail::message')
# Была создана новая новость
{{ $article->title }}
@component('mail::button', ['url' => route('article', ['slug' => $article->slug])])
Перейти
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent
