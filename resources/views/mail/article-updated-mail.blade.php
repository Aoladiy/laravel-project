@component('mail::message')
# Новость
{{ $article->title }}
# была изменена
@component('mail::button', ['url' => route('article', ['slug' => $article->slug])])
Перейти
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent
